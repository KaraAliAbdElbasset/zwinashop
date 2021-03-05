@extends('admin.layouts.app')

@section('title','Orders Show')

@push('css')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Order</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Tableau de bord</a></li>
                <li class="breadcrumb-item "><a href="{{route('admin.orders.index')}}">Accueil commandes</a></li>
                <li class="breadcrumb-item active">Detail Commandes</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if(session()->has('success'))
                        <div class="callout callout-success">
                            <h5><i class="fas fa-info"></i> Success:</h5>
                            {{session("success")}}
                        </div>
                    @endif

                    @if(session()->has('error'))
                        <div class="callout callout-danger">
                            <h5><i class="fas fa-info"></i> Error:</h5>
                            {{session("error")}}
                        </div>
                    @endif

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                       
                        <!-- title row -->
                        <div class="row">
                            
                            <div class="col-12">
                               <img src="{{asset('assets/site/img/logob.png')}}"  height="75px" width="150px"/>
                               <h6>
                                <small> vente en Gros et detail de produits En Ligne</small>
                                </h6>
                                <h4>
                                    <small class="float-right">Date: {{$o->created_at->format('d/m/Y')}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                De:
                                <address>
                                    <strong>{{config('settings.site_name')}}.</strong><br>
                                    {{config('settings.address')}},<br>
                                    {{config('settings.zip_code')}}, {{config('settings.city')}} , {{config('settings.country')}} ,<br>
                                    telehone: {{config('settings.phone_1')}},<br>
                                    E-mail: {{config('settings.default_email_address')}}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                à:
                                <address>
                                    <strong>{{$o->name}}</strong><br>
                                    {{$o->address}}<br>
                                    telephone: {{$o->phone}}<br>
                                    @if($o->email)
                                        E-mail: {{$o->email}}
                                    @endif
                                    <br>
                                    {{$o->province}},{{$o->city}}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Commande No #00{{$o->id}}</b><br>
                                <br>
                                <b>Etat:</b> {{$o->state}}<br>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Quantité</th>
                                        <th>Produit</th>
                                        <th>Prix</th>
                                        <th>Description</th>
                                        <th>total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($o->products as $p)
                                    <tr>
                                        <td>{{$p->pivot->qty}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->pivot->price}} {{config('settings.currency_code')}}</td>
                                        <td>{{$p->excerpt}}</td>
                                        <td>@price($p->pivot->total) {{config('settings.currency_code')}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">

                            </div>
                            <!-- /.col -->
                            <div class="col-6">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Total:</th>
                                            <td>@price($o->total_price) {{config('settings.currency_code')}}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12 my-2">
                                <form action="{{route('admin.orders.update',$o->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <label for="state"> Order State </label>
                                    <select name="state" id="state" class="form-control @error('state') is-invalid @enderror">
                                        <option value="pending" disabled selected>En attente</option>
                                        <option value="validated" {{$o->state === 'validated' ? 'selected' : ''}}>Validé</option>
                                        <option value="canceled" {{$o->state === 'canceled' ? 'selected' : ''}} >Annulé</option>
                                    </select>
                                    @error('state')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    <button type="submit" class="btn btn-success my-2"> Update </button>
                                </form>
                            </div>
                            <div class="col-12">
                                <a href="#" target="_blank" onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Imprimer</a>

                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection

@push('js')
{{--    <script src="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>--}}

{{--    <script>--}}
{{--        const Toast = Swal.mixin({--}}
{{--            toast: true,--}}
{{--            position: 'top-end',--}}
{{--            showConfirmButton: false,--}}
{{--            timer: 3000--}}
{{--        });--}}
{{--        @if(session()->has('error'))--}}
{{--        Toast.fire({--}}
{{--            icon: 'error',--}}
{{--            title: '{{session('error')}}'--}}
{{--        })--}}
{{--        @endif--}}

{{--        @if(session()->has('success'))--}}
{{--        Toast.fire({--}}
{{--            icon: 'success',--}}
{{--            title: '{{session('success')}}'--}}
{{--        })--}}
{{--        @endif--}}
{{--    </script>--}}
@endpush

