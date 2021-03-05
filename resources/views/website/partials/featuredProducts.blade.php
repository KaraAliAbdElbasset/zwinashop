<section class="feature_product_area section_gap_bottom_custom ">
    <div class="container">
        <div class="row justify-content-center">
          
                <div class="col" style="padding-left: 0px;  padding-right: 0px;">
                    <img src="{{asset('assets/site/img/new.webp')}}" class="img-fluid">
                   
                </div>
        </div>
 
        <div class="row mb-0 customer-logos rounded ">
            @foreach($featuredProducts as $f_prod)
                <div class="col mt-2">
                @include('layouts.partials.product_card',['p' => $f_prod])
                </div>
            @endforeach
        </div>
</section>
