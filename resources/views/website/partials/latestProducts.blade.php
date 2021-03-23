<!-- Product -->
<section class="bg0 p-t-23 p-b-130">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Nos Produits
            </h3>
        </div>


        <div class="row isotope-grid mt-4">
            @foreach($latestProducts as $product)

                @include('website.partials.productCard',['product' => $product])

            @endforeach
        </div>

{{--        <!-- Pagination -->--}}
{{--        <div class="flex-c-m flex-w w-full p-t-38">--}}
{{--            <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">--}}
{{--                1--}}
{{--            </a>--}}

{{--            <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">--}}
{{--                2--}}
{{--            </a>--}}
{{--        </div>--}}
    </div>

</section>

