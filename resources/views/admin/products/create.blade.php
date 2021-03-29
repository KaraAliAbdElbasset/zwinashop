@extends('admin.layouts.app')

@section('title','Product Create')

@push('css')


@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Products</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">tableau de bord</a></li>
                <li class="breadcrumb-item "><a href="{{route('admin.products.index')}}">produits</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <section>
        <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informations General </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">nom</label>
                                <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="excerpt">description breve</label>
                                <textarea name="excerpt" placeholder="..." id="excerpt" class="form-control @error('excerpt') is-invalid @enderror">{{old('excerpt')}}</textarea>
                                @error('excerpt')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="qte">Quantité</label>
                                <input type="number" id="qte" name="qte" value="{{old('qte')}}" class="form-control @error('qte') is-invalid @enderror" required>
                                @error('qte')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Prix</label>
                                <input type="number" id="price" name="price" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror" required>
                                @error('price')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for="fournisseur">Fournisseur du produit</label>
                            <input type="text" id="fournisseur" name="fournisseur" value="{{old('fournisseur')}}" class="form-control @error('fournisseur') is-invalid @enderror" required>
                            @error('fournisseur')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" placeholder="..." id="description" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informations General </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="categories">Categories</label>
                                <select multiple name="categories[]" id="categories" class="form-control select2 @error('categories') is-invalid @enderror">
                                    @foreach($categories as $c)
                                        <option value="{{$c->id}}" {{in_array($c->id, old('categories') ?? [], true) ? 'selected' : ''}}>{{$c->name}}</option>
                                    @endforeach
                                </select>
                                @error('categories')
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
                                         src="{{asset('assets/admin/dist/img/default-150x150.png')}}" width="150px" height="150px"
                                         alt="Brand picture">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="featured">en vedette ? </label>
                                <input type="checkbox" name="featured" id="featured" {{old('featured') ? 'checked' : ''}} value="on"  data-bootstrap-switch>
                                @error('featured')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inspired">inspiré ? </label>
                                <input type="checkbox" name="inspired" id="inspired" {{old('inspired') ? 'checked' : ''}} value="on"  data-bootstrap-switch>
                                @error('inspired')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="is_active">etat </label>
                                <input type="checkbox" name="is_active" id="is_active" {{old('featured') ? 'checked' : ''}} value="on"  data-bootstrap-switch>
                                @error('is_active')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('admin.products.index')}}" class="btn btn-secondary">annuler</a>
                                    <input type="submit" value="Create" class="btn btn-success float-right">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </section>
@endsection

@push('js')
    <!-- Bootstrap Switch -->
    <script src="{{asset('assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

        $("document").ready(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

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
