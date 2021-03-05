@extends('admin.layouts.auth_app')

@section('title','Forgot Password')

@section('content')

    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
    @if(session()->has('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif
    <form action="{{route('admin.password.email.send')}}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Email" name="email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <p class="mt-3 mb-1">
        <a href="{{route('admin.login')}}">Login</a>
    </p>

@endsection
