@extends('admin.layouts.app')

@section('title','Carousel')

@push('css')

@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Image</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
                <li class="breadcrumb-item "><a href="{{route('admin.carousel.index')}}">carousel</a></li>
                <li class="breadcrumb-item active">Ajouter</li>

            </ol>
        </div>
    </div>
@endsection

@section('content')
    <section>
        <form action="{{route('admin.carousel.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.images.form')
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

