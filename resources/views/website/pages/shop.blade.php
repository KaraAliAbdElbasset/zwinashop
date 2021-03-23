@extends('layouts.app')

@push('css')


@endpush

@section('content')


    <!-- Product -->
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{!request('category') || request('category') === '' ? 'how-active1' :''}}" onclick="location='{{route('shop')}}'">
                        Tous les produits
                    </button>
                    @foreach($categories as $c)
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{request('category') === $c->slug ? 'how-active1' : ''}}" onclick="location='{{route('shop')}}?category={{$c->slug}}'">
                        {{$c->name}}
                    </button>
                    @endforeach
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Filter
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div>

                <!-- Search product -->
                    <div class="dis-none panel-search w-full p-t-10 p-b-15">
                        <div class="bor8 dis-flex p-l-15">
                            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                            <form action="">

                            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Search">
                            </form>

                        </div>
                    </div>


                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">


                        <div class="filter-col2 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Price
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="{{route('shop')}}" class="filter-link stext-106 trans-04 {{!request('price')  ? 'filter-link-active' : ''}} ">
                                        All
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{route('shop')}}?price=0.00,500.00" class="filter-link stext-106 trans-04 {{request('price') === '0.00,500.00' ? 'filter-link-active' : ''}} ">
                                        DZD0.00 - DZD500.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{route('shop')}}?price=500.00,1000.00" class="filter-link stext-106 trans-04 {{request('price') === '500.00,1000.00' ? 'filter-link-active' : ''}} ">
                                        DZD500.00 - DZD1000.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{route('shop')}}?price=1000.00,1500.00" class="filter-link stext-106 trans-04 {{request('price') === '1000.00,1500.00' ? 'filter-link-active' : ''}} ">
                                        DZD1000.00 - DZD1500.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{route('shop')}}?price=1500.00,5000.00" class="filter-link stext-106 trans-04 {{request('price') === '1500.00,5000.00' ? 'filter-link-active' : ''}} ">
                                        DZD1500.00 - DZD5000.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{route('shop')}}?price=5000+" class="filter-link stext-106 trans-04 {{request('price') === '5000+' ? 'filter-link-active' : ''}} price">
                                        DZD5000.00+
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col3 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Color
                            </div>

                            <ul>
                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="{{route('shop')}}?color=black" class="filter-link {{request('color') === 'black' ? 'filter-link-active' : ''}} stext-106 trans-04">
                                        Black
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="{{route('shop')}}?color=blue" class="filter-link stext-106 trans-04 {{request('color') === 'blue' ? 'filter-link-active' : ''}}">
                                        Blue
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="{{route('shop')}}?color=grey" class="filter-link {{request('color') === 'grey' ? 'filter-link-active' : ''}} stext-106 trans-04">
                                        Grey
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="{{route('shop')}}?color=green" class="filter-link {{request('color') === 'green' ? 'filter-link-active' : ''}} stext-106 trans-04">
                                        Green
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="{{route('shop')}}?color=red" class="filter-link {{request('color') === 'red' ? 'filter-link-active' : ''}} stext-106 trans-04">
                                        Red
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

                                    <a href="{{route('shop')}}?color=white" class="filter-link {{request('color') === 'white' ? 'filter-link-active' : ''}} stext-106 trans-04">
                                        White
                                    </a>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>

            <div class="row isotope-grid">
                @foreach($products as $product)
                    @include('website.partials.productCard',['product' => $product])
                @endforeach

            </div>

            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                {{$products->onEachSide(3)->links()}}
            </div>
        </div>
    </div>
@endsection

@push('js')


@endpush
