@extends('admin.layouts.app')

@section('title','dashboard')

@push('css')

@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Users</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{route('admin.users.index')}}">Accounts Index</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <section>
        <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create New Account</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" id="pic_preview"
                                         src="{{asset('assets/admin/dist/img/default-150x150.png')}}"
                                         alt="User profile picture">
                                </div>

                                <div class="text-center">
                                    <input type="file" name="pic" class="form-control @error('pic') is-invalid @enderror" id="pic" accept="image/*">
                                    @error('pic')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">First Name</label>
                                <input type="text" id="inputName" name="first_name" value="{{old('first_name')}}" class="form-control @error('first_name') is-invalid @enderror">
                                @error('first_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" value="{{old('last_name')}}" class="form-control @error('last_name') is-invalid @enderror">
                                @error('last_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Password confirmation</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('admin.users.index')}}" class="btn btn-secondary">Cancel</a>
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
