@extends('admin.layouts.app')

@section('title','Product Detail')

@push('css')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Produits</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{route('admin.products.index')}}">Product Index</a></li>
                <li class="breadcrumb-item active">Show</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <section>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Details du produit</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="text-center">
                                    <img class="img-thumbnail img-fluid " width="150px" height="150px" id="pic_preview"
                                         src="{{$p->image_url}}"
                                         alt="brand picture">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Name">Nom</label>
                                <p>{{$p->name}}</p>
                            </div>
                            <div class="form-group">
                                <label for="fournisseur">Fournisseur</label>
                                <p>{{$p->fournisseur}}</p>
                            </div>
                            <div class="form-group">
                                <label for="Price">Prix</label>
                                <p>{{$p->price}}</p>
                            </div>
                            @if($p->old_price)
                            <div class="form-group">
                                <label for="old_price">Ancien prix</label>
                                <p>{{$p->old_price}}</p>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="Qte">quantité</label>
                                <p>{{$p->qte}}</p>
                            </div>
                            <div class="form-group">
                                <label for="Brand">marque</label>
                                <p><a href="{{route('admin.brands.show',$p->brand_id)}}">{{$p->brand->name}}</a></p>
                            </div>
                            <div class="form-group">
                                <label for="categories">Categories</label>
                                <p>
                                    @foreach($p->categories as $c)
                                        <span class="badge badge-info"><a class="not-active" href="{{route('admin.categories.show',$c->id)}}">{{$c->name}}</a></span>
                                    @endforeach
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="Created">date d'ajout</label>
                                <p>{{$p->created_at->format('d-m-Y')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <div>
                                    {!! $p->description !!}
                                </div>
                            </div>
                            @if($p->images->count()>0)
                                <div class="form-group">
                                    <label for="Images">Images</label>
                                    <div class="row">
                                        @foreach($p->images as $i)
                                            <div class="col-3">
                                                <img src="{{ asset('storage/'.$i->path) }}"
                                                     id="brandLogo"
                                                     class="img-thumbnail"
                                                     alt="img">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('admin.products.index')}}" class="btn btn-secondary">retour aux produits</a>
                                    <a href="{{route('admin.products.edit',$p->id)}}" class="btn btn-success float-right">modifier</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

    </section>
@endsection

@push('js')
    <!-- SweetAlert2 -->
    <script src="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        @if(session()->has('error'))
        Toast.fire({
            icon: 'error',
            title: '{{session('error')}}'
        })
        @endif

        @if(session()->has('success'))
        Toast.fire({
            icon: 'success',
            title: '{{session('success')}}'
        })
        @endif
    </script>

@endpush
