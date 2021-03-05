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
                <li class="breadcrumb-item "><a href="{{route('admin.admins.index')}}">Accounts Index</a></li>
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
                            <h3 class="card-title">User Details</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" id="pic_preview"
                                         src="{{$u->pic_url}}"
                                         alt="User profile picture">
                                </div>
                                    <h3 class="profile-username text-center">{{ucfirst($u->first_name)}} {{ucfirst($u->last_name)}}</h3>
                            </div>
                            <div class="form-group">
                                <label for="email">First Name</label>
                                <p>{{$u->first_name}}</p>
                            </div>
                            <div class="form-group">
                                <label for="email">Last Name</label>
                                <p>{{$u->last_name}}</p>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <p>{{$u->email}}</p>
                            </div>
                            <div class="form-group">
                                <label for="email">Join us</label>
                                <p>{{$u->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('admin.users.index')}}" class="btn btn-secondary">back to brands index</a>
                                    <a href="{{route('admin.users.edit',$u->id)}}" class="btn btn-success float-right">Edit</a>

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
