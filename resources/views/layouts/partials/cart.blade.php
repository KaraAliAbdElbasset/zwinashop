<div class="wrap-header-cart js-panel-cart " id="showHeaderCart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					{{trans('front.cart')}}
				</span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                @if(session()->has('cart'))
                    @foreach( session('cart')->getItems() as $key => $item)
                        <li class="header-cart-item flex-w flex-t m-b-12">
                            <div class="header-cart-item-img" onclick="deleteForm({{$key}})" >
                                <img src="{{$item['img']}}" alt="IMG" >
                            </div>
                            <div class="header-cart-item-txt p-t-8">
                                <a href="{{$item['path']}}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    {{$item['name']}}
                                </a>

                                <span class="header-cart-item-info">
								{{$item['qty']}} x DZD @price($item['price'])
							    </span>
                                <span>

                                </span>
                            </div>
                        </li>
                @endforeach
                @else
                    <li class="header-cart-item flex-w flex-t m-b-12">

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                {{trans('front.empty_product')}}
                            </a>

                            <span class="header-cart-item-info">
							</span>
                        </div>
                    </li>
                @endif
            </ul>

            <div class="w-full">
                @if(session()->has('cart'))
                <div class="header-cart-total w-full p-tb-40">
                    {{trans('front.total')}}: DZD @price(session('cart')->getTotalPrice())
                </div>
                @endif

                <div class="header-cart-buttons flex-w w-full">
                    <a href="{{route('cart.index')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        {{trans('front.cart_title')}}
                    </a>

                    <a href="{{route('cart.index')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        {{trans('front.checkout')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
