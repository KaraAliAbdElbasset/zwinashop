@extends('admin.layouts.app')

@section('title','dashboard')

@push('css')

@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>attributes</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
                <li class="breadcrumb-item "><a href="{{route('admin.attributes.index')}}">attributes</a></li>
                <li class="breadcrumb-item active">modifier</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <section>
        <form action="{{route('admin.attributes.update',$attribute->id)}}" method="post">
            @csrf
            @method('put')
            @include('admin.attributes.form')

        </form>
    </section>
@endsection

@push('js')

@endpush

