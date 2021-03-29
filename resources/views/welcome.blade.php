@extends('layouts.app')

@push('css')

@endpush


@section('content')
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1 rs2-slick1">
            <div class="slick1">
                @foreach($images as $i)
                    <div class="item-slick1 bg-overlay1" style="background-image: url({{$i->image_url}});" data-thumb="{{$i->image_url}}" data-caption="Zwina Store">
                        <div class="container h-full">
                            <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
                                   {{trans('product.Collection_de_la_semaine')}}
                                </span>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                    <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                        {{trans('front.new_collection')}}
                                    </h2>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                    <a href="{{route('shop')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                        {{trans('front.shop')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
{{--                <div class="item-slick1 bg-overlay1" style="background-image: url({{asset('assets/site/images/slide-05.jpg')}});" data-thumb="{{asset('assets/site/images/thumb-01.jpg')}}" data-caption="Zwina Store">--}}
{{--                    <div class="container h-full">--}}
{{--                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">--}}
{{--                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">--}}
{{--								<span class="ltext-202 txt-center cl0 respon2">--}}
{{--                                   {{trans('product.Collection_de_la_semaine')}}--}}
{{--                                </span>--}}
{{--                            </div>--}}

{{--                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">--}}
{{--                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">--}}
{{--                                    {{trans('product.new_collection')}}--}}
{{--                                </h2>--}}
{{--                            </div>--}}

{{--                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">--}}
{{--                                <a href="{{route('shop')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">--}}
{{--                                    {{trans('front.shop')}}								</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="item-slick1 bg-overlay1" style="background-image: url({{asset('assets/site/images/slide-05.jpg')}});" data-thumb="{{asset('assets/site/images/thumb-01.jpg')}}" data-caption="Zwina Store">--}}
{{--                    <div class="container h-full">--}}
{{--                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">--}}
{{--                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">--}}
{{--								<span class="ltext-202 txt-center cl0 respon2">--}}
{{--                                   {{trans('product.Collection_de_la_semaine')}}--}}
{{--                                </span>--}}
{{--                            </div>--}}

{{--                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">--}}
{{--                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">--}}
{{--                                    {{trans('product.new_collection')}}--}}
{{--                                </h2>--}}
{{--                            </div>--}}

{{--                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">--}}
{{--                                <a href="{{route('shop')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">--}}
{{--                                    {{trans('front.shop')}}								</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>

            <div class="wrap-slick1-dots p-lr-10"></div>
        </div>
    </section>
    <!-- Banner -->
    <div class="sec-banner bg0 p-t-95 p-b-55">
        <div class="container">
            <div class="row">




            </div>
        </div>
    </div>

    @include('website.partials.latestProducts')

@endsection

@push('js')
    <script src="{{asset('js/front.js')}}"></script>
    <script>
        const showModal = id => {
            document.getElementById(`modal-${id}`).classList.add('show-modal1')
        }
    </script>

@endpush
