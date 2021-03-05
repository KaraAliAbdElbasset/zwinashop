<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.dashboard')}}" class="nav-link">Home</a>
        </li>
{{--        <li class="nav-item d-none d-sm-inline-block">--}}
{{--            <a href="#" class="nav-link">Contact</a>--}}
{{--        </li>--}}
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-link"><a href="{{route('admin.settings.index')}}"><i class="fas fa-cog text-info"></i></a></li>

        <li class="nav-item dropdown">
            <a class="nav-link" href="{{route('admin.logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Logout
            </a>
        </li>
    </ul>
    <form action="{{route('admin.logout')}}" method="post" id="logout-form">@csrf</form>
</nav>
