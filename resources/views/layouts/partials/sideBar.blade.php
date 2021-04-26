<aside class="wrap-sidebar js-sidebar">
    <div class="s-full js-hide-sidebar"></div>

    <div class="sidebar flex-col-l p-t-22 p-b-25">
        <div class="flex-r w-full p-b-30 p-r-27">
            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
            <ul class="sidebar-link w-full">
                <li class="p-b-13">
                    <a href="{{route('welcome')}}" class="stext-102 cl2 hov-cl1 trans-04">
                        {{trans('front.cart')}}
                    </a>
                </li>

            </ul>

            <div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
                        {{trans('front.follow')}}
                        INSTAGRAM <br>
						@ ZWINA.BOUTIQUE
					</span>
                <br>
                <span class="mtext-101 cl5">
                        {{trans('front.follow')}}
                        FACEBOOK <br>
						@ ZWINA
					</span>
            </div>

            <div class="sidebar-gallery w-full">
					<span class="mtext-101 cl5">
						{{trans('front.about')}}
					</span>


            </div>
        </div>
    </div>
</aside>
