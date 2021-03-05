<section class="inspired_product_area section_gap_bottom_custom" style="border: 5px solid transparent;
">
        <div class="row justify-content-center">
            <div class="col-lg-12">
              
                
                <div class="main_title">
                    <h2><span>Produits Inspirés</span></h2>
                    <p>nos Inspirations du moment</p>
                </div>
            
            </div>
        </div>


        <div class="customer-logos rounded px-2">
            @foreach($inspiredProducts as $l_prod)
            <div class="col ">
                    @include('layouts.partials.product_card',['p' => $l_prod])
            </div>        
            @endforeach
        </div>
</section>
