@extends('layouts.app')

@push('css')

    <link rel="stylesheet" href="{{asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

@endpush

@section('content')

    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{route('welcome')}}" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
				Shoping Cart
			</span>
        </div>
    </div>


    <!-- Shoping Cart -->
    <div class="bg0 p-t-75 p-b-85" >
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <form action="{{route('cart.update')}}" method="post" id="formUpdate">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <tr class="table_head">
                                        <th class="column-1">Product</th>
                                        <th class="column-2">Image</th>
                                        <th class="column-3">Price</th>
                                        <th class="column-4">Quantity</th>
                                        <th class="column-5">Total</th>
                                    </tr>
                                    @if(session('cart'))
                                        @csrf
                                        @method('PUT')
                                        @foreach(session('cart')->getItems() as $key => $i)
                                            <tr class="table_row">
                                                <td class="column-1">
                                                    <div class="how-itemcart1" onclick="deleteForm('{{$key}}')">
                                                        <img src="{{$i['img']}}" alt="IMG">
                                                    </div>
                                                </td>
                                                <td class="column-2">{{$i['name']}}</td>
                                                <td class="column-3">DZD @price($i['price'])</td>
                                                <td class="column-4">
                                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                        </div>

                                                        <input class="mtext-104 cl3 txt-center num-product" type="number" min="1" name="items[{{$key}}]" value="{{$i['qty']}}">

                                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="column-5">DZD @price($i['qty'] * $i['price'])</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="table-row">
                                            <td class="column-1 text-center" colspan="5">No Product In Your Cart</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        @if(session()->has('cart'))
                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">

                            <div  class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                <span onclick='document.querySelector("#formUpdate").submit()'>Update Cart</span>
                            </div>
                        </div>
                        @endif
                    </div>
                    </form>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
                            </div>

                            <div class="size-209">
								<span class="mtext-110 cl2">
									DZD @if(session('cart')) @price(session('cart')->getTotalPrice()) @else 0 @endif
								</span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
								Commande :
								</span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <form action="{{route('cart.order')}}" method="post" id="order-form">
                                    @csrf
                                <div class="p-t-15">
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" required min="2"  type="text" name="last_name" placeholder="Nom">
                                    </div>
                                    @error('last_name')
                                    <div class="text-danger"> {{$message}}</div>
                                    @enderror

                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="first_name" placeholder="Prenom">
                                    </div>
                                    @error('first_name')
                                    <div class="text-danger"> {{$message}}</div>
                                    @enderror

                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Telephone">
                                    </div>
                                    @error('phone')
                                    <div class="text-danger"> {{$message}}</div>
                                    @enderror

                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Adresse">
                                    </div>
                                    @error('address')
                                    <div class="text-danger"> {{$message}}</div>
                                    @enderror

                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="wilaya" placeholder="Wilaya">
                                    </div>
                                    @error('wilaya')
                                    <div class="text-danger"> {{$message}}</div>
                                    @enderror

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="commune" placeholder="Commune">
                                    </div>
                                    @error('commune')
                                    <div class="text-danger"> {{$message}}</div>
                                    @enderror


                                </div>
                                </form>
                            </div>
                        </div>
                        @if(session('cart'))
                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
                            </div>

                            <div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									DZD @if(session('cart')) @price(session('cart')->getTotalPrice()) @else 0 @endif
								</span>
                            </div>
                        </div>

                        <button onclick="document.getElementById('order-form').submit()" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Commander Maintenant
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
    <!-- SweetAlert2 -->
    <script src="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script>

        @if(session()->has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text:  '{{session('success')}}',
        })
        @endif

        @if(session()->has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  '{{session('error')}}',
        })
        @endif
        const deleteForm = id => {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
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

@endpush
