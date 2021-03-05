@extends('layouts.app')

@section('banner_area')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>Confirmez votre commande</h2>
                        <p>Formulaire de confirmation de Commande</p>
                    </div>
                    <div class="page_link">
                        <a href="{{url('/')}}">Home</a>
                        <a href="{{route('cart.checkout')}}">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

@endsection

@section('content')

    <div class="container my-4">


        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                @if(session()->has('cart'))
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Votre Panier</span>
                    <span class="badge badge-secondary badge-pill">{{session('cart')->getTotalQty()}}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach(session('cart')->getItems() as $i)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{$i['name']}}</h6>
                            <small class="text-muted">@price($i['price']) {{config('settings.currency_code')}} x {{$i['qty']}}</small>
                        </div>
                        <span class="text-muted"> @price($i['price'] * $i['qty']) {{config('settings.currency_code')}}</span>
                    </li>
                    @endforeach


                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total ({{config('settings.currency_code')}})</span>
                        <strong>@price(session('cart')->getTotalPrice()) {{config('settings.currency_code')}}</strong>
                    </li>
                </ul>
                @endif

            </div>
            <div class="col-md-8 order-md-1" id="app">
                <checkout :errors="{{$errors}}"
                          :cities="{{$cities_json}}"
                          route="{{route('cart.order')}}" token="{{csrf_token()}}"></checkout>
            </div>
        </div>


    </div>
@endsection

@push('js')

    <script src="{{asset('js/app.js')}}"> </script>
{{--    <script>--}}
{{--            const citiesSelect = document.querySelector('#cities');--}}
{{--            const provincesSelect = document.querySelector('#provinces');--}}
{{--            let cities = {!! $cities_json !!};--}}
{{--            citiesSelect.onchange = (event) => {--}}
{{--                let cityCode = event.target.value;--}}
{{--                let provinces = cities[parseInt(cityCode)].dairas;--}}
{{--                provincesSelect.innerHTML = "";--}}

{{--                provinces.forEach(v =>{--}}
{{--                    let node = document.createElement(`option`)--}}
{{--                    node.value = v.name--}}
{{--                    node.append(document.createTextNode(`${v.name} (${v.name_ar})`))--}}
{{--                    provincesSelect.append(node)--}}
{{--                    console.log(provincesSelect)--}}
{{--                } )--}}

{{--            }--}}

{{--    </script>--}}

@endpush
