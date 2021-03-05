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
                <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{route('admin.categories.index')}}">Categories Index</a></li>
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
                            <h3 class="card-title">Category Details</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="text-center">
                                    <img class="img-thumbnail img-fluid " width="150px" height="150px" id="pic_preview"
                                         src="{{$c->image_url}}"
                                         alt="brand picture">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Name">Category Name</label>
                                <p>{{$c->name}}</p>
                            </div>
                            <div class="form-group">
                                <label for="Slug">Category Slug</label>
                                <p>{{$c->slug}}</p>
                            </div>
                            <div class="form-group">
                                <label for="parent">Category Parent</label>
                                @if($c->category_id === null)
                                <p> <span class="badge badge-secondary">{{$c->parent->name}}</span></p>
                                @else
                                    <p> <span class="badge badge-info"><a class="not-active" href="{{route('admin.categories.show',$c->category_id)}}">{{$c->parent->name}}</a></span></p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="parent">Category Parent</label>
                                <p>
                                    @forelse($c->children as $child)
                                        <span class="badge badge-info "><a class="not-active" href="{{route('admin.categories.show',$child->id)}}">{{$child->name}}</a></span>
                                    @empty
                                        <span class="badge badge-secondary">None</span>
                                    @endforelse
                                </p>

                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <p>{{$c->description}}</p>
                            </div>
                            <div class="form-group">
                                <label for="email">Created at</label>
                                <p>{{$c->created_at->format('d-m-Y')}}</p>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('admin.categories.index')}}" class="btn btn-secondary">back to categories index</a>
                                    <a href="{{route('admin.categories.edit',$c->id)}}" class="btn btn-success float-right">Edit</a>

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
