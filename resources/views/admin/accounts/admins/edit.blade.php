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
                <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
                <li class="breadcrumb-item "><a href="{{route('admin.admins.index')}}">comptes</a></li>
                <li class="breadcrumb-item active">modifier</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <section>
        <form action="{{route('admin.admins.update',$a->id)}}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">modifier le compte</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Nom</label>
                                <input type="text" id="inputName" name="name" value="{{$a->name}}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" name="email" value="{{$a->email}}" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('admin.admins.index')}}" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Update" class="btn btn-success float-right">
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

@endpush

