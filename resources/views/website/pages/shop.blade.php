@extends('layouts.app')


@section('content')
      <!--================Home Banner Area =================-->


                    <div class="h2 text-center mb-0" style="  background: #f6f6f6;
    z-index: 1;">

                        <a href="{{route('shop')}}" class="text-dark">Boutique</a>
                    </div>


    <!--================End Home Banner Area =================-->
    <section class="cat_product_area section_gap">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <form action="{{route('shop')}}" id="formFilter">
                        <input type="hidden" name="category" value="{{request('category')}}">
                        <input type="hidden" name="brand" value="{{request('brand')}}">
                        <div class="product_top_bar">
                            <div class="left_dorp">
                                <select class="sorting filter" name="sort" onchange="document.getElementById('formFilter').submit()">
                                    <option disabled  >Trier par ...</option>
                                     <option  selected value="created_at" {{request('sort') === 'created_at' ? 'selected' :''}} >Nouveautés</option>
                                    <option value="name" {{request('sort') === 'name' ? 'selected' :''}} >Trier par nom</option>
                                    <option value="price" {{request('sort') === 'price' ? 'selected' :''}}>Trier par prix</option>
                                    <option value="qte" {{request('sort') === 'qte' ? 'selected' :''}}>Trier par quantité</option>
                                    <option value="popularity" {{request('sort') === 'popularity' ? 'selected' :''}}>Trier par popolarité</option>
                                </select>

                                <input type="text" name="search" placeholder="nom du produit" value="{{request('search')}}" class="show filter mx-auto ">
                                <button type="submit" class="search btn mx-auto"><i class="fa fa-search"></i></button>
                            </div>


                        </div>
                    </form>
                    <div class="latest_product_inner">
                        <div class="row">

                            @foreach($products as $p)
                            <div class="col-6 col-lg-3 col-md-3 mx-auto ">
                                @include('layouts.partials.product_card',compact('p'))
                            </div>
                            @endforeach

                        </div>
                    </div>

                     <div  class="container mx-auto mt-2">{{$products->onEachSide(2)->links()}}</div>
                </div>
                 <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Categories</h3>
                                <a href="{{route('shop')}}" class="text-dark">voir tout</a>
                            </div>
                            <div class="widgets_inner">
                                <ul class="">
                                    @foreach($categories as $c)
                                    @if($c->children->count()>0)
                                        <li @if($c->id == request('category')) class="active" @endif >
                                         <span  class="text-body"  data-toggle="collapse" data-target="#cc" > <i class="fa fa-chevron-circle-right text-primary"></i> {{$c->name}} </span>
                                                                         <ul  id='cc'>
                                                                         <li ><a href="{{route('shop',[
                                                                        'category' => $c->id,
                                                                        'brand' => request('brand'),
                                                                        'sort' => request('sort'),
                                                                        'per_page' => request('per_page'),
                                                                        ])}}" style="
                                                                        display: inline-block;
                                                                        text-align: left;" class="ml-3 text-body"><i class="fa fa-circle  text-primary"></i> Toutes</a></li>


                                                                            @foreach($c->children as $cc)

                                                                            <li> <a href="{{route('shop',[
                                                                        'category' => $cc->id,
                                                                        'brand' => request('brand'),
                                                                        'sort' => request('sort'),
                                                                        'per_page' => request('per_page'),
                                                                        ])}}" style="
                                                                        display: inline-block;
                                                                        text-align: left;" class="ml-3 text-body"> <i class="fa fa-circle  text-warning"></i> {{$cc->name}}</a></li>
                                                                            @endforeach
                                                                        </ul>
                                        </li>
                                     @else
                                      <li @if($c->id == request('category')) class="active" @endif >
                                      <a  class="text-body"



                                                                        href="{{route('shop',[
                                                                        'category' => $c->id,
                                                                        'brand' => request('brand'),
                                                                        'sort' => request('sort'),
                                                                        'per_page' => request('per_page'),
                                                                        ])}}"><i class="fa fa-chevron-circle-right text-primary"></i> {{$c->name}}</a>
                                        </li>

                                     @endif


                                    @endforeach
                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Marques</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach($brands as $b)
                                    <li @if($b->id == request('brand')) class="active" @endif>
                                        <a href="{{route('shop',[
                                                                      'category' => request('category'),
                                                                        'brand' => $b->id,
                                                                        'order' => request('sort'),
                                                                        'per_page' => request('per_page'),
                                                                        ])}}">{{$b->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>



                    </div>
                </div>


            </div>
        </div>
    </section>

@endsection

@push('js')

    <script src="{{asset('assets/site/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/counter-up/jquery.counterup.js')}}"></script>

@endpush
