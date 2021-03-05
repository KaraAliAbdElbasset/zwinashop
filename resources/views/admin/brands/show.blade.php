@extends('admin.layouts.app')

@section('title','dashboard')

@push('css')

@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Admins</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">tabeau de bord</a></li>
                <li class="breadcrumb-item "><a href="{{route('admin.brands.index')}}">marques</a></li>
                <li class="breadcrumb-item active">afficher</li>
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
                            <h3 class="card-title">Details</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="text-center">
                                    <img class="img-thumbnail img-fluid " width="150px" height="150px" id="pic_preview"
                                         src="{{$b->image_url}}"
                                         alt="brand picture">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Name">nom</label>
                                <p>{{$b->name}}</p>
                            </div>
                            <div class="form-group">
                                <label for="Slug">marque</label>
                                <p>{{$b->slug}}</p>
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <p>{{$b->description}}</p>
                            </div>
                            <div class="form-group">
                                <label for="email">date de creation</label>
                                <p>{{$b->created_at->format('d-m-Y')}}</p>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('admin.brands.index')}}" class="btn btn-secondary">retour</a>
                                    <a href="{{route('admin.brands.edit',$b->id)}}" class="btn btn-success float-right">Edit</a>

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

@endpush
