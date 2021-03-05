@extends('layouts.app')

@section('banner_area')
 <meta property="og:title" content="{!! $p->name !!}">
    <meta property="og:description" content="{!! $p->description !!}">
    <meta property="og:url" content="{!! $p->path() !!}">
    <meta property="og:image" content="{!! $p->image_url !!}">
    <meta property="product:brand" content="{!! $p->brand->name !!}">
    <meta property="product:availability" content="in stock">
    <meta property="product:condition" content="new">
    <meta property="product:price:amount" content="@price($p->price)">
    <meta property="product:price:currency" content="{{config('settings.currency_code')}}">
    <meta property="product:retailer_item_id" content="{!! $p->id !!}">
    <meta property="product:item_group_id" content="{!! $p->id !!}">
    <!--================Home Banner Area =================-->

                    </div>
                    <div class="text-center">
                     <h2>Details du Produit</h5>
                    </div>
 
    <!--================End Home Banner Area =================-->

@endsection

@section('content')
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_product_img">
                        <div
                            id="carouselExampleIndicators"
                            class="carousel slide"
                            data-ride="carousel"
                        >
                            <ol class="carousel-indicators">
                                @foreach($images as $key => $img)
                                    <li
                                    data-target="#carouselExampleIndicators"
                                    data-slide-to="{{$key}}"
                                    @if($loop->first) class="active" @endif
                                >
                                    <img width="60px" height="60px" style="object-fit: cover; "
                                        src="{{$img}}"
                                        alt=""
                                    />
                                </li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($images as $img)
                                    <div class="carousel-item @if($loop->first) active @endif">
                                        <img
                                            class="d-block w-100"
                                            src="{{$img}}"
                                            alt="First slide"
                                        />
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{$p->name}}</h3>
                        <h2>@price($p->price) {{config('settings.currency_code')}}</h2>
                        <ul class="list">
                            <li>

                                <span>Categorie</span> : @foreach($p->categories as $c)
                                    <a class="active" href="#">
                                        {{$c->name}}</a>
                                        @if(!$loop->last) , @endif
                                @endforeach
                            </li>
                            <li>
                                <a href="#"> <span>Disponibilité</span> : {{$p->qte > 0 ? 'En Stock' : 'Non Disponible'}}</a>
                            </li>
                        </ul>
                        <p>
                            {{$p->excerpt}}
                        </p>
                        <form action="{{route('cart.store',$p->id)}}" method="post">
                            @csrf
                        <div class="product_count">
                            <label for="qty">Quantité:</label>
                            <input
                                type="text"
                                name="qty"
                                id="sst"
                                maxlength="12"
                                value="1"
                                title="Quantity:"
                                class="input-text qty"
                            />
                            <button
                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                class="increase items-count"
                                type="button"
                            >
                                <i class="lnr lnr-chevron-up"></i>
                            </button>
                            <button
                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                class="reduced items-count"
                                type="button"
                            >
                                <i class="lnr lnr-chevron-down"></i>
                            </button>
                        </div>
                        <div class="card_area">
                            <button class="main_btn" type="submit">Acheter</button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->


    <!--================Product Description Area =================-->
    @if($p->description)
    <section class="product_description_area">
        <div class="container text-center">
            <h4 ><span class="border border-warning p-2">Description</span></h4>
        </div>       
                
        
        <div class="container text-center mt-4 border border-warning">
                 <p><span class=" p-1 mt-4"> {!! $p->description !!}</span></p>
        </div>
        
    </section>
    
    
   
</div>
    @endif
        @if($product->count() > 0)

    <div class="h4 text-center"> Porduits Similaires</div>
    <div class="container">
    <div class="row">

    @foreach($product as $b_prod)
        <div class="col-3">
    @include('layouts.partials.product_card',['p' => $b_prod])
        </div>
    @endforeach

    </div>
    </div>
    @endif
@endsection
