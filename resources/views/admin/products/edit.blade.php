@extends('admin.layouts.app')

@section('title','Product Create')

@push('css')

    <!-- summernote -->

    <link rel="stylesheet" href="{{asset("assets/admin/plugins/summernote/summernote-bs4.css")}}">
    <link rel="stylesheet" href="{{asset("assets/admin/plugins/DropZone/dropzone.min.css")}}">

    <script src="{{asset("assets/admin/plugins/DropZone/dropzone.js")}}"></script>
@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Produits</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">tableau de bord</a></li>
                <li class="breadcrumb-item "><a href="{{route('admin.products.index')}}">produits :</a></li>
                <li class="breadcrumb-item active">modifier</li>
            </ol>
        </div>
    </div>
@endsection


@section("content")
    {{--    <!-- Main content -->--}}

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-edit"></i>
                Modifier le produit
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-5 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="vert-tabs-general-tab" data-toggle="pill" href="#vert-tabs-general" role="tab" aria-controls="vert-tabs-general" aria-selected="true">General</a>
                        <a class="nav-link" id="vert-tabs-details-tab" data-toggle="pill" href="#vert-tabs-details" role="tab" aria-controls="vert-tabs-details" >Details</a>
                        <a class="nav-link" id="vert-tabs-description-tab" data-toggle="pill" href="#vert-tabs-description" role="tab" aria-controls="vert-tabs-description">Description</a>
                        <a class="nav-link " id="vert-tabs-images-tab" data-toggle="pill" href="#vert-tabs-images" role="tab" aria-controls="vert-tabs-images" >Images</a>

                    </div>
                </div>
                <div class="col-7 col-sm-9" id="app">
                    <form action="{{ route('admin.products.update',$p->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="tab-content" id="vert-tabs-tabContent">

                            {{-- ************************************************************ General ********************************************************* --}}
                            <div class="tab-pane text-left fade show active" id="vert-tabs-general" role="tabpanel" aria-labelledby="vert-tabs-general-tab">
                                <div class="tile">

                                    <h3 class="tile-title">Product Information</h3>
                                    <hr>
                                    <div class="tile-body">
                                        {{--                                    Product title input--}}
                                        <div class="form-group">
                                            <label class="control-label" for="name">Nom du produit</label>
                                            <input
                                                class="form-control @error("name") is-invalid @enderror"
                                                type="text"
                                                placeholder="nom du produit"
                                                id="name"
                                                name="name"
                                                value="{{ $p->name }}"
                                            />
                                            @error("title")
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        {{--                                    product price,quantity and sku--}}
                                        <div class="row">
                                            {{--                                        product price--}}
                                            <div class="form-group col">
                                                <label for="price">Prix du produit</label>
                                                <input type="text"
                                                       class="form-control is_decimal @error('price') is-invalid @enderror"
                                                       name="price"
                                                       value="{{old("price",$p->price)}}"
                                                       id="price">
                                                @error("price")
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>

                                            {{--                                        product Quantity--}}
                                            <div class="form-group">
                                                <label for="qte">Quantité</label>
                                                <input type="number" id="qte" name="qte" value="{{$p->qte}}" class="form-control @error('qte') is-invalid @enderror" required>
                                                @error('qte')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            {{--                                        product fournisseur--}}
                                            <div class="form-group">
                                                <label for="fournisseur">Fournisseur</label>
                                                <input type="text" id="fournisseur" name="fournisseur" value="{{$p->fournisseur}}" class="form-control @error('fournisseur') is-invalid @enderror" required>
                                                @error('fournisseur')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>

                                        </div>

                                        {{--                                promo--}}
                                        <div class="row">
                                            <div class="form-group col">
                                                <label for="sale_price">ancien prix</label>
                                                <input type="text"
                                                       id="sale_price"
                                                       class="form-control is_decimal @error('old_price') is-invalid @enderror"
                                                       name="old_price" placeholder="Ancien prix" value="{{old("old_price",$p->old_price)}}">
                                                @error("old_price")
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="excerpt">Description brève</label>
                                            <textarea name="excerpt" id="excerpt" rows="7"
                                                      cols="30" placeholder="Description Brève"
                                                      class="form-control @error('excerpt') is-invalid @enderror">{{old("excerpt",$p->excerpt)}}</textarea>
                                            @error("excerpt")
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="custom-control custom-checkbox col">
                                            <input class="custom-control-input"
                                                   type="checkbox"
                                                   id="featured"
                                                   name="featured"
                                                   {{old("featured",$p->featured) === true ? 'checked' : ''}}
                                                   value="on">
                                            <label for="featured" class="custom-control-label">En vedette ?</label>
                                            @error("featured")
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="custom-control custom-checkbox col">
                                            <input class="custom-control-input"
                                                   type="checkbox"
                                                   id="inspired"
                                                   name="inspired"
                                                   {{old("inspired",$p->inspired) === true ? 'checked' : ''}}
                                                   value="on">
                                            <label for="inspired" class="custom-control-label">inspiré?</label>
                                            @error("inspired")
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="custom-control custom-checkbox col">
                                            <input class="custom-control-input @error("is_active") is-invalid @enderror"
                                                   type="checkbox"
                                                   id="is_active"
                                                   name="is_active"
                                                   {{$p->is_active === true ? "checked" : ""}}
                                                   value="on">
                                            <label for="is_active" class="custom-control-label">Active?</label>
                                            @error("is_active")
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="tile-footer">
                                        <div class="row d-print-none mt-2">
                                            <div class="col-12 text-right">
                                                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Product</button>
                                                <a class="btn btn-danger" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- ************************************************************ End General ********************************************************* --}}
                            {{-- ************************************************************ Details ********************************************************* --}}
                            <div class="tab-pane text-left fade show " id="vert-tabs-details" role="tabpanel" aria-labelledby="vert-tabs-details-tab">
                                <div class="tile">

                                    <h3 class="tile-title">Product Details</h3>
                                    <hr>
                                    <div class="tile-body">
                                        {{--                                Categories inputs--}}
                                        <div class="form-group">
                                            <div>
                                                <label for="pic">Image du produit</label>
                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="pic" accept="image/*">
                                                @error('image')
                                                <div class="invalid-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="text-center my-2">
                                                <img class="img-thumbnail img-fluid" id="pic_preview"
                                                     src="{{$p->image_url}}" width="150px" height="150px"
                                                     alt="Product picture">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="categories">Categories du produit</label>
                                            <select class="form-control select2 @error("categories") is-invalid @enderror"
                                                    multiple="multiple"
                                                    data-placeholder="Etat du produit"
                                                    name="categories[]"
                                                    id="categories"
                                                    style="width: 100%;">

                                                @forelse($categories as $category)
                                                    @php
                                                        //$check = in_array($category->id, $p->categories->pluck('id')->toArray()) ? 'selected' : ''
                                                        if (isset($category, $p)){
                                                            $check = in_array($category->id, $p->categories->pluck("id")->toArray(), true) ? 'selected' : '';
                                                        }else{
                                                            $check = "";
                                                        }
                                                    @endphp
                                                    <option value="{{$category->id}}"  {{$check}}>
                                                        {{$category->name}}
                                                    </option>
                                                @empty
                                                    <option disabled>
                                                        No categories fount
                                                    </option>
                                                @endforelse
                                            </select>
                                            @error("categories")
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        {{--                                brand input--}}
                                        <div class="form-group">
                                            <label for="brand">Marque du produit</label>
                                            <select id="brand"
                                                    class="form-control select2 @error("brand_id") is-invalid @enderror" name="brand_id"
                                                    style="width: 100%;">
                                                @php
                                                    if (isset($p))
                                                        $brand_id = isset($p->brand) ? $p->brand->id : null
                                                @endphp
                                                @forelse($brands as $brand)
                                                    <option value="{{$brand->id}}"
                                                        {{$brand->id === $brand_id ? "selected" : ""}}>
                                                        {{$brand->name}}
                                                    </option>
                                                @empty
                                                    <option value="" disabled>
                                                        No brand found
                                                    </option>
                                                @endforelse
                                            </select>
                                            @error("brand_id")
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="tile-footer">
                                        <div class="row d-print-none mt-2">
                                            <div class="col-12 text-right">
                                                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Product</button>
                                                <a class="btn btn-danger" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ************************************************************ end Details ********************************************************* --}}
                            {{-- ************************************************************ description ********************************************************* --}}
                            <div class="tab-pane text-left fade show " id="vert-tabs-description" role="tabpanel" aria-labelledby="vert-tabs-description-tab">
                                <div class="tile">
                                    <h3 class="tile-title">Description du produit</h3>
                                    <hr>
                                    <div class="tile-body">
                                        {{--                                description wysiwyg--}}
                                        <div class="col-md-12">
                                            <div class="card card-outline card-info">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        Description
                                                    </h3>
                                                    <!-- tools box -->
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                                                title="Collapse">
                                                            <i class="fas fa-minus"></i></button>
                                                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                                                title="Remove">
                                                            <i class="fas fa-times"></i></button>
                                                    </div>
                                                    <!-- /. tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body pad">
                                                    <div class="mb-3">
                                <textarea class="textarea" placeholder="Description Longue" name="description"
                                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$p->description}}</textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col-->
                                    </div>
                                    <div class="tile-footer">
                                        <div class="row d-print-none mt-2">
                                            <div class="col-12 text-right">
                                                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Modifier le produit</button>
                                                <a class="btn btn-danger" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- ************************************************************ end description ********************************************************* --}}

                            {{-- ************************************************************ Images ********************************************************* --}}
                            <div class="tab-pane text-left fade show " id="vert-tabs-images" role="tabpanel" aria-labelledby="vert-tabs-images-tab">
                                <div class="tab-pane" id="images">
                                    <div class="tile">
                                        <h3 class="tile-title">Ajouter des images</h3>
                                        <hr>
                                        <div class="tile-body">
                                            <div class="row">
                                                {{--                                        style="border: 2px dashed rgba(0,0,0,0.3)"--}}
                                                <div class="col-md-12">
                                                    <div class="dropzone" id="productImagesDropZone" >
                                                        <input type="hidden" name="product_id" value="{{ $p->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-print-none mt-2">
                                                <div class="col-12 text-right">
                                                    <button class="btn btn-success" type="button" id="uploadButton">
                                                        <i class="fa fa-fw fa-lg fa-upload"></i>Ajouter
                                                    </button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                @forelse($p->images as $image)
                                                    <div class="col-md-3">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <img src="{{ asset('storage/'.$image->path) }}"
                                                                     id="brandLogo"
                                                                     class="img-thumbnail"

                                                                     alt="img">
                                                                <a class="card-link float-right text-danger" href="{{ route('admin.products.images.delete', $image) }}">
                                                                    <i class="fa fa-fw fa-lg fa-trash"></i>
                                                                </a>
{{--                                                                <input type="checkbox" name="images[]" value="{{$image->id}}">--}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                @empty
                                                    <div class="col d-flex justify-content-center">
                                                        <div class="alert  alert-default-info">
                                                           Aucune image pour ce produit
                                                        </div>
                                                    </div>

                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <!-- Summernote -->
    <script src="{{asset("assets/admin/plugins/summernote/summernote-bs4.min.js")}}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

        $('document').ready(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            Dropzone.autoDiscover = false;
            myDropzone.on("queuecomplete", function (file) {
                window.location.reload();
                Toast.fire({
                    type: 'success',
                    title: 'All product images uploaded'
                });

            });
            $('#uploadButton').click(function(){
                if (myDropzone.files.length === 0) {
                    Toast.fire({
                        type: 'error',
                        title: 'Please select files to upload'
                    });
                } else {
                    myDropzone.processQueue();
                }
            });

            // Summernote
            $('.textarea').summernote({
                height:200,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });

            $("#pic").change(function() {
                readURL(this,'pic_preview');
            });
            $("#name").keyup(e=>{
                $('#slug').val(string_to_slug(e.target.value))
            });
        });
        let myDropzone = new Dropzone("#productImagesDropZone", {
            paramName: "image",
            addRemoveLinks: false,
            maxFilesize: 4,
            parallelUploads: 10,
            uploadMultiple: false,
            url: "{{ route('admin.products.images.upload') }}",
            autoProcessQueue: false,
            sending: function(file, xhr, formData) {
                formData.append("_token", $('[name=_token]').val());
                formData.append("product_id", {{$p->id}}); // Laravel expect the token post value to be named _token by default
            },
        });
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
