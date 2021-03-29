<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title',config('app.name'))</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('assets/site/images/icons/favicon.png')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/slick/slick.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/MagnificPopup/magnific-popup.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/site/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

    <!--===============================================================================================-->
    @stack('css')
</head>
<body class="animsition">

@include('layouts.partials.headernav')

<!-- Sidebar -->
@include('layouts.partials.sideBar')

<!-- Cart -->
@include('layouts.partials.cart')



@yield('content')

<!-- Footer -->
@include('layouts.partials.footer')



<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>


<!--===============================================================================================-->
<script src="{{asset('assets/site/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/site/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/site/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('assets/site/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/site/vendor/select2/select2.min.js')}}"></script>
<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="{{asset('assets/site/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('assets/site/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/site/vendor/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/site/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/site/vendor/parallax100/parallax100.js')}}"></script>
<script>
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="{{asset('assets/site/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
<!--===============================================================================================-->
<script src="{{asset('assets/site/vendor/isotope/isotope.pkgd.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/site/vendor/sweetalert/sweetalert.min.js')}}"></script>
<script>
    $('.js-addwish-b2').on('click', function(e){
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to cart !", "success");
        });
    });
</script>
<!--===============================================================================================-->
<script src="{{asset('assets/site/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
    $('.js-pscroll').each(function(){
        $(this).css('position','relative');
        $(this).css('overflow','hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function(){
            ps.update();
        })
    });

    const deleteForm = id => {
        let cart = document.getElementById('showHeaderCart').classList.remove('show-header-cart')
        swal.fire({
            title: 'supprimer?',
            text: "supprimer vos achats!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'oui,supprimer!',
            cancelButtonText:'non revenir au panier'
        }).then((result) => {

            if (result.value) {
                createForm(id).submit();
            }
        });
    }

    const createForm = id => {
        let f = document.createElement("form");
        f.setAttribute('method',"post");
        f.setAttribute('action',`/cart/removeItem/${id}`);

        let i1 = document.createElement("input"); //input element, text
        i1.setAttribute('type',"hidden");
        i1.setAttribute('name','_token');
        i1.setAttribute('value','{{csrf_token()}}');

        let i2 = document.createElement("input"); //input element, text
        i2.setAttribute('type',"hidden");
        i2.setAttribute('name','_method');
        i2.setAttribute('value','DELETE');

        f.appendChild(i1);
        f.appendChild(i2);
        document.body.appendChild(f);
        return f;
    }
</script>
<!--===============================================================================================-->
<script src="{{asset('assets/site/js/main.js')}}"></script>

@stack('js')
</body>
</html>
