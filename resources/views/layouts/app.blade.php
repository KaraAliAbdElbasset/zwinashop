<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{asset('assets/site/img/fav.png')}}" type="image/png" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{config('settings.site_name')}}</title>

{{--    style--}}
    <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/site/vendors/linericon/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/site/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/site/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/site/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/site/vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/site/vendors/lightbox/simpleLightbox.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/site/vendors/nice-select/css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/site/vendors/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/site/vendors/jquery-ui/jquery-ui.css')}}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/site/css/responsive.css')}}" />
</head>
<body style=" padding-top: 160px; ">
     @if(session()->has('product'))
      <div class="modal fade" id="popupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>
                <div class="modal-body p-0 row">
                <div class="col-12 col-lg-5 ad p-0"> <img src="{{session()->get('product')->image_url}}" width="100%" height="100%" />
                    
                </img>
                </div>
                    <div class="details col-12 col-lg-7">
                        <h2>votre commande: </h2>

                        <h2>{{session()->get('product')->name}}</h2>
                        <p><small class="para">{!! session()->get('product')->excerpt !!}</small></p>
                         @if(session()->get('product')->old_price)
                         <p><small class="para"> <del class="text-dark">{{session()->get('product')->old_price}} {{config('settings.currency_code')}}</del></small></p>
                         @endif
                        <p><small class="para"> {{session()->get('product')->price}} {{config('settings.currency_code')}}</small></p>

                        
                     <a class="  text-center btn-block mx-2 col-11" type="button" class="close" data-dismiss="modal" aria-label="Close">Continuer mes achats</a>
                     <a class="main_btn  text-center btn-block mx-2 mb-2 col-11" href="{{route('cart.checkout')}}">Valider ma commande</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    @endif
    @include('layouts.partials.headernav')
        @yield('banner_area')
        @yield('content')
    @include('layouts.partials.footer')
    <script src="{{asset('assets/site/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/site/js/popper.js')}}"></script>
    <script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/site/js/stellar.js')}}"></script>
    <script src="{{asset('assets/site/vendors/lightbox/simpleLightbox.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/isotope/isotope-min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/site/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/counter-up/jquery.counterup.js')}}"></script>
    <script src="{{asset('assets/site/js/mail-script.js')}}"></script>
    <script src="{{asset('assets/site/js/theme.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    
    <script>
    $(document).ready(function(){
        $('.customer-logos').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: false,
            dots: false,
            pauseOnHover: true,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
     $(document).ready(function(){
        $('.brands').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: false,
            dots: false,
            pauseOnHover: true,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 4
                }
            }]
        });
    });
     $(document).ready(function(){
        $('.categories').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: false,
            dots: false,
            pauseOnHover: true,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    centerPadding: '40px'
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3,
                    centerPadding: '40px'

                }
            }]
        });
    });

</script>

    <!-- SweetAlert2 -->
    <script src="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script>
        const Toast = Swal.mixin({
            customClass: {
            confirmButton: 'btn btn-success mx-auto',
            cancelButton: 'btn btn-warning mx-auto' 
                 },
            buttonsStyling: false,
            position: 'center',
            width: 600,
            height:400,

            
        });
        @if(session()->has('error'))
        Toast.fire({
            icon: 'error',
            title: '{{session('error')}}'
        })
        @endif

        @error('email')
        Toast.fire({
            icon: 'error',
            title: '{{$message}}'
        })
        @enderror

       
        
    @if(session()->has('product'))
   
        $(document).ready(function() {
            $('#popupmodal').modal();
        });
        
    @endif
        @if(session()->has('success panier'))
        Toast.fire({
            icon: 'success',
            title: 'Votre Produit a été suprimé du panier',
             showConfirmButton: false,
             timer :2000
        } ); 
        @endif    
    </script>
   
  <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '236702744741869');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=236702744741869&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!-- 
<!-- Load Facebook SDK for JavaScript
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/fr_FR/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

     
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="530829661198364">
      </div> -->
@stack('js')
</body>
</html>
