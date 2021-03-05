<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('assets/admin/dist/img/AdminLTELogo.png')}}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">7 clics</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/admin/dist/img/AdminLTELogo.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{request()->is('admin/dashboard*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            tableau de bord
                        </p>
                    </a>
                </li>
                @if(auth()->user()->role === 'owner')

                <li class="nav-item has-treeview {{request()->is('admin/accounts*')? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{request()->is('admin/accounts*')? 'active' : ''}} ">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            gestion des comptes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                        <ul class="nav nav-treeview" style="display: {{request()->is('admin/accounts*')? 'block' : 'none'}} " >
                            <li class="nav-item ">
                                <a href="{{route('admin.admins.index')}}" class="nav-link {{request()->is('admin/accounts/admins*')? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Admins</p>
                                </a>
                            </li>
                            {{--                        <li class="nav-item">--}}
                            {{--                            <a href="{{route('admin.users.index')}}" class="nav-link {{request()->is('admin/accounts/users*')? 'active' : ''}}">--}}
                            {{--                                <i class="far fa-circle nav-icon"></i>--}}
                            {{--                                <p>Users</p>--}}
                            {{--                            </a>--}}
                            {{--                        </li>--}}
                        </ul>
                </li>
                @endif

                <li class="nav-item has-treeview {{request()->is(['admin/categories*','admin/brands*','admin/products*'])? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{request()->is(['admin/categories*','admin/brands*','admin/products*'])? 'active' : ''}} ">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Management des Produits
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: {{request()->is(['admin/categories*','admin/brands*','admin/products*'])? 'block' : 'none'}} ">
                        <li class="nav-item ">
                            <a href="{{route('admin.brands.index')}}" class="nav-link {{request()->is('admin/brands*')? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>marques </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.categories.index')}}" class="nav-link {{request()->is('admin/categories*')? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.products.index')}}" class="nav-link {{request()->is('admin/products*')? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>produits</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.orders.index')}}" class="nav-link {{request()->is('admin/orders*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            commandes
                            <span class="badge  {{request()->is('admin/orders*') ? 'badge-danger' : 'badge-info'}} right">{{$order_count}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.newsletter.index')}}" class="nav-link {{request()->is('admin/newsletter*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            News-letter

                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
