@extends('layouts.app')

@section('content')
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{route('welcome')}}" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="{{route('shop')}}" class="stext-109 cl8 hov-cl1 trans-04">
                Guendoura
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
				{{$p->name}}
			</span>
        </div>
    </div>


    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                @foreach($images as $img)
                                <div class="item-slick3" data-thumb="{{$img['image']}}" data-attribute="{{$img['attribute']}}" id="slick-{{$img['attribute']}}">
                                    <div class="wrap-pic-w pos-relative" >
                                        <img src="{{$img['image']}}" alt="IMG-PRODUCT" id="img-{{$img['attribute']}}">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" id="link-{{$img['attribute']}}" href="{{$img['image']}}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{$p->name}}
                        </h4>

                        <span class="mtext-106 cl2" id="display-price">
							DZD @price($p->price)
						</span>

                        <p class="stext-102 cl3 p-t-23">
                            {{$p->excerpt}}
                        </p>
                        <form action="{{route('cart.store',$p->id)}}" method="post" id="addForm">
                            @csrf
                            <div class="p-t-33">
                                @if($attributes->has('size'))
                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-203 flex-c-m respon6">
                                            Size
                                        </div>

                                        <div class="size-204 respon6-next">
                                            <div class="rs1-select2 bor8 bg0">
                                                <select name="attributes[size]" id="size" class="js-select2" name="size">
                                                    <option disabled selected>Choose an option</option>
                                                    @foreach($attributes['size'] as $s)
                                                        <option value="{{$s->id}}" data-price="{{$s->price}}">Size {{$s->value}} (+DZD @price($s->price))</option>
                                                    @endforeach

                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($attributes->has('color'))
                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-203 flex-c-m respon6">
                                            Color
                                        </div>

                                        <div class="size-204 respon6-next">
                                            <div class="rs1-select2 bor8 bg0">
                                                <select id="color" name="attributes[color]" class="js-select2">
                                                    <option disabled selected>Choose an option</option>
                                                    @foreach($attributes['color'] as $key => $s)
                                                        <option value="{{$s->id}}" data-price="{{$s->price}}">{{$s->value}} (+DZD @price($s->price))</option>
                                                    @endforeach
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" min="1" type="number" name="qty" value="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                        <div class="align-content-center">
                                        <button type="submit" class="flex-c-m  mx-auto stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            {{trans('front.add_to_cart')}}
                                        </button>
                                        <button onclick="buy()" class=" mt-2 mx-auto flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            {{trans('front.buy_now')}}
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <!--  -->


                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">{{trans('front.product_detail')}}</a>
                        </li>




                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6">
                                    {!! $p->description !!}
                                </p>
                            </div>
                        </div>

                        <!-- - -->


                    </div>
                </div>
            </div>
        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				Name: {{$p->name}}
			</span>

            <span class="stext-107 cl6 p-lr-25">
				Categories: Jacket, Men @foreach($p->categories as $c) {{!$loop->last ?$c->name.' ,' : $c->name}} @endforeach
			</span>
        </div>
    </section>
@endsection


@push('js')
    <script>
        let basePrice = {{$p->price}};
        let colorPrice = 0;
        let sizePrice = 0;
        $('#color').change(function(e) {
            // var slideno = $('options').data('slide');
            colorPrice = $(this).find(':selected').data('price');
            //.toFixed(2) .00
            let total = parseInt(basePrice) + parseInt(colorPrice) +parseInt(sizePrice);
            $('#display-price').html(`DZD ${total.format(0,3)}`)
            // $('.slider-nav').slick('slickGoTo', slideno - 1);
        });

        $('#size').change(function(e) {
            // var slideno = $('options').data('slide');
            sizePrice = $(this).find(':selected').data('price');
            //.toFixed(2) .00
            let total = parseInt(basePrice) + parseInt(colorPrice) +parseInt(sizePrice);
            $('#display-price').html(`DZD ${total.format(0,3)}`)
            // $('.slider-nav').slick('slickGoTo', slideno - 1);
        });

        const buy = ()=>{
            let form = document.getElementById('addForm');
            let input = document.createElement('input');
            input.name = 'buy';
            input.value = 'on'
            input.type='hidden';
            form.append(input);
            form.submit();
        }

        @if($errors->has('attribute') > 0)
            swal('Error', "Please Select attribute", "Error");
        @endif

        @if(session()->has('success'))
        swal("Success", '{{session('success')}}');
        @endif

    </script>
@endpush
