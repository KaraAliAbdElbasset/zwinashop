@extends('admin.layouts.app')

@section('title','dashboard')

@push('css')

@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>tableau de bord</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">tableau de bord</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <!-- Small Box (Stat card) -->
    <h5 class="mb-2 mt-4">statistiques de ventes</h5>
    <div class="row">

        <!-- ./col -->
        <div class="col-lg-6 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$p_count}}</h3>

                    <p>Produits</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <a href="{{route('admin.products.index')}}" class="small-box-footer">
                    info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$c_count}}</h3>

                    <p>Categories</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="{{route('admin.categories.index')}}" class="small-box-footer">
                    info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- Small Box (Stat card) -->
    <h5 class="mb-2 mt-4">commandes</h5>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">en attente</span>
                    <span class="info-box-number">{{$o_pending}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Validés</span>
                    <span class="info-box-number">{{$o_validated}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">annulé</span>
                    <span class="info-box-number">{{$o_canceled}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

    </div>
    <!-- /.row -->

@endsection

@push('js')

@endpush
