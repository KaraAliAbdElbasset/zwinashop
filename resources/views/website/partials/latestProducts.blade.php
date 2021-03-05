
<section class="new_product_area section_gap_top section_gap_bottom_custom mt-0">
    <div class="container">
       
<div class="container ">
        <div class="container ">
             @foreach($latestProducts as $lp)
              @if($lp->products->count()>0)
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <a  class=" text-dark mx-auto" href="{{route('shop',[
                                                                        'category' => $lp->id,
                                                                        'brand' => request('brand'),
                                                                        'sort' => request('sort'),
                                                                        'per_page' => request('per_page'),
                                                                        ])}}">
                         <h2><span>{{$lp->name}}</span></h2>
                         
                        <div class="row justify-content-center">
          
                            <div class="col" style="padding-left: 0px;  padding-right: 0px;">
                                <img src="{{$lp->getImageUrlAttribute()}}" class="img-fluid">
                            </div>
                        </div>
                         
                    </a>
                </div>
            </div>
           
        </div>
         
             
                        <div class="row">
                      @foreach($lp->products->sortByDesc('created_at')->slice(0, 4) as $l_prod)
                        <div class="col-6 col-lg-3 col-md-3 mx-auto my-2">
                           @include('layouts.partials.product_card',['p' => $l_prod])
                        </div>
                      @endforeach 
                       </div>
                       <div class="text-center mb-2">
                        <a  class=" text-dark mx-auto  btn btn-warning mb-4"  href="{{route('shop',[
                                                                        'category' => $lp->id,
                                                                        'brand' => request('brand'),
                                                                        'sort' => request('sort'),
                                                                        'per_page' => request('per_page'),
                                                                        ])}}">voir tout <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
            </div>
                 @endif    
             @endforeach
               

               
             
        </div>
    </div>
</section>
