@php
$route = Route::current()->getName();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->



    <div style= "padding: 0px 00px 0px 50px; ">
        <span class="brand-text font-weight-light"> </span>
        <img src="{{asset('admin/img/logorg.jpg')}}" height=80 class="brand-image img-circle elevation-3" alt="AdminLTE Logo">
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Administrador ORG</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview menu-open">
                    <a class="nav-link {{ $route == 'admin.dashboard' ? '' : 'collapsed' }}" href="{{ route('admin.dashboard') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Inicio
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-header">Crear contenido</li>
                <li class="nav-item">
                    <a class="nav-link {{ $route == 'categorias.index' ? '' : 'collapsed' }}" href="{{ route('categorias.index') }}">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Categorias
                            {{-- <span class="badge badge-info right">2</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $route == 'productos.index' ? '' : 'collapsed' }}" href="{{ route('productos.index') }}">
                        <i class="nav-icon fa fa-shopping-bag"></i>
                        <p>
                            Productos
                            {{-- <span class="badge badge-info right">2</span> --}}
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
