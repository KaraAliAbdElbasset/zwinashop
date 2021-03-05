@extends('admin.layouts.auth_app')

@section('title','Log In')

@section('content')

    <p class="login-box-msg">Connectez vous</p>
    @if(session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif
    <form action="{{route('admin.login.attempt')}}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" placeholder="Email" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                <p class="mb-1">
                    <a href="{{route('admin.password.forgot')}}">mot de passe oublié</a>
                </p>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">se connecter</button>
            </div>
            <!-- /.col -->
        </div>
    </form>



@endsection
