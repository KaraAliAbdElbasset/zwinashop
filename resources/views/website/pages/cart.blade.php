@extends('layouts.app')

@section('banner_area')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>Panier</h2>
                        <p>Vos Achats</p>
                    </div>
                    <div class="page_link">
                        <a href="{{url('/')}}">Accueil</a>
                        <a href="{{route('cart.index')}}">Panier</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('content')

    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                @if($errors->count()>0)
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                        @endforeach
                    </ul>
                @endif
                @if(session()->has('cart'))
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Produits</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Total</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form action="{{route('cart.update')}}" method="post" id="cart-update-form">
                            @csrf
                            @method('PUT')
                        @foreach(session('cart')->getItems() as $key =>  $i)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img width="60" height="60"
                                            src="{{$i['img']}}"
                                            alt="{{$i["name"]}}"
                                        />
                                    </div>
                                    <div class="media-body">
                                        <p>{{$i["name"]}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>@price($i["price"]) {{config('settings.currency_code')}}</h5>
                            </td>
                            <td>
                               
                                <div class="product_count">
                                    <input
                                        type="text"
                                        name="items[{{$key}}]"
                                        id="{{$key}}"
                                        maxlength="12"
                                        value="{{$i['qty']}}"
                                        title="Quantity:"
                                        class="input-text qty"
                                    />
                                    <button
                                        onclick="var result = document.getElementById('{{$key}}'); var sst = result.value; if( !isNaN( sst )) result.value++;document.getElementById('cart-update-form').submit();return false;"
                                        class="increase items-count"
                                        type="button"
                                    >
                                        <i class="lnr lnr-chevron-up"></i>
                                    </button>
                                    <button
                                        onclick="var result = document.getElementById('{{$key}}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;document.getElementById('cart-update-form').submit();return false;"
                                        class="reduced items-count"
                                        type="button"
                                    >
                                        <i class="lnr lnr-chevron-down"></i>
                                    </button>
                                </div>
                            </td>
                            <td>
                                <h5>@price($i["price"] * $i["qty"]) {{config('settings.currency_code')}}</h5>
                            </td>

                            <td>
                                <h5><a href="javascript:void(0)" onclick="deleteForm({{$key}})">x</a></h5>
                            </td>
                        </tr>
                        @endforeach
                        </form>

                       
                           
                                
                          

                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Sous-Total</h5>
                            </td>
                            <td>
                                <h5>@price(session('cart')->getTotalPrice()) {{config('settings.currency_code')}}</h5>
                            </td>
                        </tr>

                       
                        </tbody>
                    </table>
                </div>
                    @else
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Produits</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="text-center"> Votre panier est vide</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                @endif
            </div>
                <a class="gray_btn btn-block text-center" href="{{route('shop')}}">Continuer mes achats</a>
                                    <a class="main_btn  btn-block text-center" href="{{route('cart.checkout')}}">Valider ma commande</a>
        </div>
    </section>

@endsection

@push('js')

    <script>
        const deleteForm = id => {
            createForm(id).submit();
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

@endpush
