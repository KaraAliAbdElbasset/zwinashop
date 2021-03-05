@extends('layouts.app')

@section('banner_area')
    <section class="brands slider ">
        @foreach($brand as $b)
        <a href="{{route('shop',[
                                                                        'category' => request('category'),
                                                                        'brand' => $b->id,
                                                                        'order' => request('sort'),
                                                                        'per_page' => request('per_page'),
                                                                        ])}}"><img src="{{$b->getImageUrlAttribute()}}"></div></a>
        @endforeach

    </section>


    <section class="mb-20">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('assets/site/img/banner/7Clics Banner 7clics.jpg')}}" class="d-block w-100" alt="...">

                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/site/img/banner/7Clics Banner Farabi.jpg')}}" class="d-block w-100" alt="...">

                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/site/img/banner/7Clics Banners BK.jpg')}}" class="d-block w-100" alt="...">

                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/site/img/banner/7Clics Banners Dermostyle.jpg')}}" class="d-block w-100" alt="...">

                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/site/img/banner/7Clics Banners Luxury.jpg')}}" class="d-block w-100" alt="...">

                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    
    
         
 
@endsection
  
@section('content')


    <!-- Start feature Area -->

<div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                   
                         <h2><span>Categories</span></h2>
                         
                </div>
            </div>
           
        </div>
   
            <div class="row">
                      @foreach($categories as $c)
                     
                        <div class="col-3 col-lg-3 col-md-3 mx-auto my-2">

                         <a  class=" text-dark mx-auto" href="{{route('shop',[
                                                                        'category' => $c->id,
                                                                        'brand' => request('brand'),
                                                                        'sort' => request('sort'),
                                                                        'per_page' => request('per_page'),
                                                                        ])}}"><img src="{{$c->getImageUrlAttribute()}}" class="img-fluid"/></a><br>
                                                                        <span class="h6" style=" word-wrap: break-word;">{{$c->name}}</span>
                       </div>
                     @endforeach
            </div>
</div>
    <!-- End feature Area -->


    <!--================ Feature Product Area =================-->
    <div class="p-2">
    
    @include('website.partials.featuredProducts')
    <!--================ End Feature Product Area =================-->
</div>
 <!--================ New Product Area =================-->
        @include('website.partials.latestProducts')
    <!--================ End New Product Area =================-->
    <!--================ Offer Area =================-->
    {{--<section class="offer_area">
        <div class="container">
            <div class="row justify-content-center">

            </div>
        </div>
    </section>--}}
    <!--================ End Offer Area =================-->

   

    <!--================ Inspired Product Area =================-->
        @include('website.partials.inspiredProducts')
    
    <!--================ End Inspired Product Area =================-->
        <section class="feature-area section_gap_bottom_custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                    <div class="single-feature bshadow rounded">
                        <a href="#" class="title">
                            <i class="flaticon-money"></i>
                            <h3>Satisfait ou remboursé</h3>
                        </a>
                        <p>Retours accepté </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                    <div class="single-feature bshadow rounded">
                        <a href="#" class="title">
                            <i class="flaticon-truck"></i>
                            <h3>Livraison Gratuite</h3>
                        </a>
                        <p>a partir de 5 produits acheté</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                    <div class="single-feature bshadow rounded">
                        <a href="#" class="title">
                            <i class="flaticon-support"></i>
                            <h3>Service Client</h3>
                        </a>
                        <p>Appelez nous 7/7 24/24</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                    <div class="single-feature bshadow rounded">
                        <a href="#" class="title">
                            <i class="flaticon-blockchain"></i>
                            <h3>Payment a la Livraison</h3>
                        </a>
                        <p>Payez une fois votre produit livré</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
