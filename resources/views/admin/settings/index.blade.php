@extends("admin.layouts.app")

@section("title","App Settings")

@push("css")
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

{{--    <style>--}}
{{--        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {--}}
{{--            background-color: #24397a !important;--}}
{{--            color: white !important;--}}
{{--        }--}}
{{--    </style>--}}
@endpush

@section("header")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-info">Panneau d'administration</a></li>
                        <li class="breadcrumb-item">Reglages</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("content")
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline">
                        <div class="card-header bg-info text-white">
                            <h3 class="card-title">
                                <i class="fas fa-cog mr-2"></i>
                                Réglages
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="nav d-flex justify-content-between nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="horizontal">
                                        <a class="nav-link active text-info" id="vert-tabs-general-tab" data-toggle="pill" href="#vert-tabs-general" role="tab" aria-controls="vert-tabs-general" aria-selected="true">Informations génerales</a>
                                        <a class="nav-link text-info" id="vert-tabs-contact-tab" data-toggle="pill" href="#vert-tabs-contact" role="tab" aria-controls="vert-tabs-contact" aria-selected="true">Informations de contact</a>
{{--                                        <a class="nav-link text-info" id="vert-tabs-site-logo-tab" data-toggle="pill" href="#vert-tabs-site-logo" role="tab" aria-controls="vert-tabs-site-logo" aria-selected="false">Logo du site</a>--}}
{{--                                        <a class="nav-link text-info" id="vert-tabs-footer-seo-tab" data-toggle="pill" href="#vert-tabs-footer-seo" role="tab" aria-controls="vert-tabs-footer-seo" aria-selected="false">Footer et SEO</a>--}}
                                        <a class="nav-link text-info" id="vert-tabs-social-links-tab" data-toggle="pill" href="#vert-tabs-social-links" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Liens des Réseaux sociaux</a>
{{--                                        <a class="nav-link text-info" id="vert-tabs-analytics-tab" data-toggle="pill" href="#vert-tabs-analytics" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Analytiques</a>--}}
{{--                                        <a class="nav-link text-info" id="vert-tabs-payment-tab" data-toggle="pill" href="#vert-tabs-payment" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Informations de paiement</a>--}}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-general" role="tabpanel" aria-labelledby="vert-tabs-general-tab">
                                            @include("admin.settings.general")
                                        </div>
                                        <div class="tab-pane text-left fade " id="vert-tabs-contact" role="tabpanel" aria-labelledby="vert-tabs-contact-tab">
                                            @include("admin.settings.contact")
                                        </div>
{{--                                        <div class="tab-pane fade" id="vert-tabs-site-logo" role="tabpanel" aria-labelledby="vert-tabs-site-logo-tab">--}}
{{--                                            @include("settings.site_logo")--}}
{{--                                        </div>--}}
{{--                                        <div class="tab-pane fade" id="vert-tabs-footer-seo" role="tabpanel" aria-labelledby="vert-tabs-footer-seo-tab">--}}
{{--                                            @include("settings.footer_and_seo")--}}
{{--                                        </div>--}}
                                        <div class="tab-pane fade" id="vert-tabs-social-links" role="tabpanel" aria-labelledby="vert-tabs-social-links-tab">
                                            @include("admin.settings.social_links")
                                        </div>
{{--                                        <div class="tab-pane fade" id="vert-tabs-analytics" role="tabpanel" aria-labelledby="vert-tabs-analytics-tab">--}}
{{--                                            @include("settings.analytics")--}}
{{--                                        </div>--}}
{{--                                        <div class="tab-pane fade" id="vert-tabs-payment" role="tabpanel" aria-labelledby="vert-tabs-payment-tab">--}}
{{--                                            @include("admin.settings.payment")--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push("js")
    <script src="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        @if(session()->has('error'))
        Toast.fire({
            icon: 'error',
            title: '{{session('error')}}'
        })
        @endif

        @if(session()->has('success'))
        Toast.fire({
            icon: 'success',
            title: '{{session('success')}}'
        })
        @endif


        // $("document").ready(function () {
        //     bsCustomFileInput.init();
        //
        //     $("#logo").change(function() {
        //         readURL(this,"#logoImg");
        //     });
        //
        //     $("#favicon").change(function() {
        //         readURL(this,"#faviconImg");
        //     });
        // });
        //
        // // preview image function
        // const readURL = (input,output) =>{
        //     if (input.files && input.files[0]) {
        //         let reader = new FileReader();
        //
        //         reader.onload = function(e) {
        //             $(output).attr('src', e.target.result);
        //         };
        //
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }
    </script>
@endpush
