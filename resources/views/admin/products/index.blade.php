@extends('admin.layouts.app')

@section('title','Product Index')

@push('css')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Product</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item "><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Products Index</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Of products</h3>
                    <div class="card-tools">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" value="{{request('search')}}" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="d-flex justify-content-start">
                        <a href="{{route('admin.products.create')}}" title="Create New Brand" class="btn btn-info"><i class="fas fa-plus"></i></a>
                    </div>
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Fournisseur</th>
                            {{--                            <th>Product SKU</th>--}}
                            <th>Marque</th>
                            <th>Categories</th>
                            <th>En vedette?</th>
                            <th>Etat</th>
                            <th>Inspiré ?</th>
                            <th>date de creation</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key=>$p)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img src="{{$p->image_url}}" class=" img-fluid  img-thumbnail" width="80px" height="40px"  alt="{{$p->name }} picture"></td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->fournisseur}}</td>

                                {{--                                <td>{{$p->sku}}</td>--}}
                                <td>
                                    <span class="badge badge-success"><a class="not-active" href="{{route('admin.brands.show',$p->brand_id)}}">{{$p->brand->name}}</a></span>
                                </td>
                                <td>
                                    @foreach($p->categories as $c)
                                        <span class="badge badge-success"><a class="not-active" href="{{route('admin.categories.show',$c->id)}}">{{$c->name}}</a></span>
                                    @endforeach
                                </td>

                                <td><span class="badge @if($p->featured) badge-success @else badge-danger @endif">@if($p->featured) Featured @else No @endif</span></td>
                                <td><span class="badge @if($p->is_active) badge-success @else badge-danger @endif">@if($p->is_active) active @else inactive @endif</span></td>
                                <td><span class="badge @if($p->inspired) badge-success @else badge-danger @endif">@if($p->inspired) Inspired @else No @endif</span></td>
                                <td>{{$p->created_at->format('d-m-Y')}}</td>
                                <td>
                                    <a href="{{route('admin.products.edit',$p->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('admin.products.show',$p->id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="deleteForm({{$p->id}})"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="d-flex justify-content-center">
                            {{$products->links()}}
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
    </div>
@endsection

@push('js')
    <script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script>
        $('#table').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
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

        const deleteForm = id => {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                if (result.value) {
                    createForm(id).submit();
                }
            });
        }
        const createForm = id => {
            let f = document.createElement("form");
            f.setAttribute('method',"post");
            f.setAttribute('action',`/admin/products/${id}`);

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
