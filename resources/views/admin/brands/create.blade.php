@extends('admin.layouts.app')

@section('title','dashboard')

@push('css')

@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Brands</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">tableau de bord</a></li>
                <li class="breadcrumb-item "><a href="{{route('admin.brands.index')}}">Marques</a></li>
                <li class="breadcrumb-item active">Creer</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <section>
        <form action="{{route('admin.brands.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Creer une nouvelle marque</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">nom de la marque</label>
                                <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">marque</label>
                                <input type="text" id="slug" name="slug" disabled class="form-control " placeholder="this will be generated automatically">

                            </div>

                            <div class="form-group">
                                <div>
                                    <label for="pic">logo de l marque</label>
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
                                <label for="description"Brand Description</label>
                                <textarea name="description" placeholder="..." id="description" class="form-control">{{old('description')}}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('admin.brands.index')}}" class="btn btn-secondary">annuler</a>
                                    <input type="submit" value="Create" class="btn btn-success float-right">
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
    <script>

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
