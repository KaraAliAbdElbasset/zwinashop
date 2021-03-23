@extends('layouts.app')

@push('css')
    @livewireStyles
@endpush

@section('content')

    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('assets/site/images/bg-01.jpg')}}');">
        <h2 class="ltext-105 cl0 txt-center">
            Contact
        </h2>
    </section>


    <!-- Content page -->
    @livewire('contact-component')

    <!-- Map -->
    <div class="map">
        <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="{{asset('assets/site/images/icons/pin.png')}}" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
    </div>
@endsection

@push('js')

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
    <script src="{{asset('assets/site/js/map-custom.js')}}"></script>
    @livewireScripts
@endpush
