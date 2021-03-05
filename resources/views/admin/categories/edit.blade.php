@extends('admin.layouts.app')

@section('title','dashboard')

@push('css')

@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Categories</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
                <li class="breadcrumb-item "><a href="{{route('admin.categories.index')}}">Categories</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <section>
        <form action="{{route('admin.categories.update',$c->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Modifier la Categorie</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" id="name" name="name" value="{{$c->name}}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Categorie</label>
                                <input type="text" id="slug" name="slug" value="{{$c->slug}}" disabled class="form-control " placeholder="this will be generated automatically">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Niveau de la categorie</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="0" {{!isset($c->category_id) ? 'selected' : '' }}>Categorie Principale</option>
                                    <optgroup label="sous categorie de ">
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}" {{$cat->id === $c->category_id ? 'selected' : ''}} title="{{$cat->description}}">
                                                {{$cat->name}}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="pic">Image</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="pic" accept="image/*">
                                    @error('image')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="text-center my-2">
                                    <img class="img-thumbnail img-fluid" id="pic_preview"
                                         src="{{$c->image_url}}" width="150px" height="150px"
                                         alt="Brand picture">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" placeholder="..." id="description" class="form-control">{{$c->description}}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="featured">En vedette ? </label>
                                <input type="checkbox" name="featured" id="featured" {{$c->featured === true ? 'checked' : ''}} value="on"  data-bootstrap-switch>                                @error('description')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('admin.categories.index')}}" class="btn btn-secondary">Annuler</a>
                                    <input type="submit" value="Mettre a jour" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </form>
    </section>
@endsection

@push('js')
    <script src="{{asset('assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

    <script>
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
        $("document").ready(function () {
            $("#pic").change(function() {
                readURL(this,'pic_preview');
            });
            $("#name").keyup(e=>{
                $('#slug').val(string_to_slug(e.target.value))
            });
        });

        const string_to_slug = str => {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            let from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            let to   = "aaaaeeeeiiiioooouuuunc------";
            for (let i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;

        };
        // preview image function
        const readURL = (input,id) =>{
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#'+id).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
