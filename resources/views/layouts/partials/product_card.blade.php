 
 
  <a style="display: initial;border-radius:25px!important" href="{{$p->path()}}">
      
  <div class="single-product bshadow mt-0" style="border-radius:25px!important">
        
        
    <div class="product-img rounded-top">
        <img class="img-fluid w-100"  src="{{$p->image_url}}" alt="product image" style="border-radius:25px!important" >
               @if($p->old_price)
                       
                         <div class="corner-ribbon top-left  yellow shadow"> <del class="text-white">@price($p->old_price) {{config('settings.currency_code')}}</del></div>
                @endif
                </img>
        <div class="p_icon">
            
            <a  class="aav" href="{{$p->path()}}">
                <i class="ti-eye"></i>
            </a>
            <a class="aav" href="javascript:void(0)" onclick="document.getElementById('form-card-add-{{$p->id}}').submit()">
                <i class="ti-shopping-cart"></i>
            </a>
           
        </div>
    </div>
    
    <div class="product-btm " style="border-radius:25px!important">
        <a href="{{$p->path()}}" class="d-block">
            <h4 class="text-truncate mx-auto" style="max-width: 400px;font-size: 13px;" title="{{$p->name}}">{{$p->name}}</h4>
        </a>
        <div class="mt-2">
            <span class="mr-4" style="font-size: 15px;">@price($p->price) {{config('settings.currency_code')}}</span>

           
        </div>
        

    </div>
</div>
</a>
<form action="{{route('cart.store',$p->id)}}" method="post" id="form-card-add-{{$p->id}}"> @csrf
    <input type="hidden" name="qty" value="1">
</form>
