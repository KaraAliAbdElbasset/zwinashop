<style>
   

.trigger {
    background-color: green;
    color: #fff
}
.thumbnail:hover {
background-color: #f7c808;
}
.modal,
.fade,
.show {
    padding-left: 15px;
    padding-right: 15px
}



.modal-content {
    border: none;
    background: transparent;
    padding: 0 19px
}
.btn-outline-transparent {
    color: rgba(0, 0, 0, 0);
    background-color: transparent;
    background-image: none;
    border-color: #000000
}


.close {
    position: relative;
    top: 48px;
    left: 13px;
    z-index: 1;
    font-size: 30px;
    font-weight: bold;
    line-height: 1;
    color: black
}

.modal-header {
    border: none
}

.modal-header .close {
    padding: 0rem 1rem !important;
    margin: -1rem -1rem -1rem auto
}

.modal-body {
    border: none;
    background-color: white;
    padding-bottom: 5px
}

.close.focus,
.close:focus {
    outline: 0;
    box-shadow: none !important
}

.form-control {
    width: 80%;
    border: none;
    border-radius: 20px;
    box-shadow: 0px 0.5px 0px 0px #dae0e5 !important;
    color: #63686c;
    font-weight: bold;
    font-size: 12px
}
.form-control2 {
    width: 80%;
    border: none;
    border-radius: 20px;
    box-shadow: 0px 0.5px 0px 0px #dae0e5 !important;
    color: #63686c;
    font-weight: bold;
    font-size: 12px
}

.form-control.focus {
    border: none;
    border-color: #fff;
    border-bottom: 1px solid #000;
    outline: 0;
    box-shadow: 0 0 0 0 rgba(0, 123, 255, .25)
}

@media (min-width:599px) {
    .modal-dialog {
        max-width: 47rem
    }

    .details {
        padding: 60px 0 40px 50px
    }

    .text-muted a {
        color: #c0bfbf;
        font-weight: bold;
        text-decoration: underline
    }

    small.para {
        font-weight: bold;
        font-size: 14px;
        color: #63686c
    }
}


</style>


 <!--================Header Menu Area =================-->

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" >
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>

    </button>
    <a class="navbar-brand" href="{{url('/')}}"> <img src="{{asset('assets/site/img/logo.png')}}"  height="75px" width="150px"/></a>
     
   
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{request()->is('/') ? 'active' : ''}}">
                <a class="nav-link " href="{{url('/')}}">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{request()->is('shop*') ? 'active' : ''}}">
                <a class="nav-link " href="{{route('shop')}}">Boutique</a>
            </li>
           @if(request()->is('/') || request()->is('shop*'))
            <li class="dropdown">
        <a class="  nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
          Catégories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <ul class="mx-auto">
           @foreach($categories as $c)
                      @if(!$c->category_id)
                      <li class=" thumbnail mx-auto" >
                      <a  class=" text-dark mx-auto" href="{{route('shop',[
                                                                        'category' => $c->id,
                                                                        'brand' => request('brand'),
                                                                        'sort' => request('sort'),
                                                                        'per_page' => request('per_page'),
                                                                        ])}}">{{$c->name}}</a></li>
                      @endif
            @endforeach
            </ul>
        </div>
        </li>
        @endif
         <li class="nav-item {{request()->is('contact*') ? 'active' : ''}}">
                <a class="nav-link " href="{{route('contact')}}">Contact</a>
            </li>
        </ul>
     </div>
        <span><a href="{{route('cart.index')}}" class="icons">
                    <i class="fa " style="font-size:24px;color:#f7c808!important;">&#xf07a;</i>
                    
                    <span class='badge badge-warning' id='lblCartCount'> {{session()->has('cart') ? session('cart')->getTotalQty() : 0}} </span>
    </a>
       <button class="btn btn-outline-transparent my-2 my-sm-0 ml-2" data-toggle="modal" data-target="#exampleModal"> <i class="fa" style="font-size:24px;color:#f7c808!important;">&#xf007;</i></button>
        </span>
       
        <span class="navbar-text mx-auto" >
            
            <form class="form-inline col" action="{{route('shop')}}" method="get">
                <input type="text" name="search" placeholder="nom du produit" value="{{request('search')}}" class="form-control col-6" >
                <button type="submit" class="btn btn-outline-transparent"><i style="font-size:24px;color:#f7c808!important;" class="fa fa-search col-4"></i></button>
            </form>
        </span>

   
   
</nav>



 
 <!--================MODAL START =================-->
 
 
 
 
 
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>
                <div class="modal-body p-0 row">
                    <div class="col-12 col-lg-5 ad p-0"> <img src="{{asset('assets/site/img/banner/7Clics Banner 7clics.jpg')}}" width="100%" height="100%" /> </div>
                    <div class="details col-12 col-lg-7">
                        <h2>Restez Branché en un clic</h2>
                        <p><small class="para">Inscrivez vous pour<br> recevoir nos nouvautés</small></p>
                       
                            <form method="post" action="{{route('newsletter.store')}}">
                            @csrf                            
                            <input type="email" class="form-control" placeholder="email@exemple.com" name="email" required>  
                          <div class="form-group mt-3 pt-3 mb-5">
                       <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">S'inscrire</button>
                       </div>
                       </form>
                       </div> 
                      
                    </div>
                </div>
            </div>
        </div>
    </div>


  <!--================Header Menu Area =================-->

