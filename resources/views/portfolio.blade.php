<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- title -->
    <title>ORG - Abastecimiento Industrial</title>
    <meta content="Coderthemes" name="author" />
    <meta content="A fully featured multi purpose template" name="description" />

    <!-- theme favicon -->
    <link rel="shortcut icon" href="{{asset('/cliente/images/favicon.png')}}">


    <!-- third party plugins -->
    <link rel="stylesheet" href="{{asset('/cliente/css/vendor.min.css')}}" type="text/css" />

    <!-- theme css -->
    <link rel="stylesheet" href="{{asset('/cliente/css/theme.min.css')}}" type="text/css" />
</head>

<body>
    <div>
         <!-- Navbar -->
         <br>
         @include('cliente.body.header')
         <!-- /.navbar -->
<br><hr>
        <section class="hero-4 pb-5 pt-7 py-sm-7 bg-gradient2">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 text-center">
                        <h1 class="hero-title">Conoce nuestros productos</h1>
                        <p class="fs-17 text-muted">"texto mamalon"</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="overflow-hidden py-5 py-md-6 py-lg-7">
        <div class="container">

            <!-- Filter -->
            <div class="row">
                <div class="col-12">
                    <div class="text-center filter-menu" data-toggle='item-filter' data-menu-item=".filter-menu-item" data-target-container="#filterable-content">
                        <a href="javascript: void(0);" class="filter-menu-item active" data-rel="all">All</a>
                        @php
                        use App\Models\Categorias;
                        use App\Models\Productos;
                        use App\Models\ArchivosProductos;
                        $categorias = Categorias::latest()->get();
                        $productos = Productos::latest()->get();
                        @endphp

                        @foreach ($categorias as $categoria)
                        <a href="javascript: void(0);" class="filter-menu-item" data-rel="{{$categoria->nombre}}">{{$categoria->nombre}}</a>
                        @endforeach


                    </div>
                </div>
            </div>
            <!-- end row-->

            <div data-toggle="image-gallery" data-delegate="a" data-type="image" data-enable-gallery="true" class="mt-5">
                <div class="row grid-portfolio" id="filterable-content">



                    @foreach ($productos as $producto)
                    @php
                     $archivos_productos = DB::table('archivos_productos')->where('id','=', $producto->archivos_productos_id)->get();
                    @endphp

                    <div class="col-sm-6 col-xl-4 filter-item all {{$producto->categoria->nombre}}">
                        <div class="card card-portfolio-item shadow border">
                            <div class="p-2">
                                <div class="card-zoom">
                                    @foreach ($archivos_productos as $archivo_productos)
                                    <a href="{{asset('/cliente/images/photos/'. $archivo_productos->nombre)}}" class="image-popup" data-title="{{$producto->nombre}}">
                                        <img src="{{asset('/cliente/images/photos/'. $archivo_productos->nombre)}}" class="card-img-top" alt="work-thumbnail">
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-body p-2">
                                <div class="mt-2">
                                    <h5 class="mt-0">{{$producto->nombre}}</h5>
                                    <p class="text-muted mb-1">{{$producto->descripcion}}</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- footer start -->
    {{-- <section class="pt-5 pb-4 bg-gradient3 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a class="navbar-brand me-lg-4 mb-4 me-auto d-flex align-items-center pt-0" href="#">
                        <img src="{{asset('/cliente/images/logo.png')}}" height="30" alt="" />
                    </a>
                    <p class="text-muted w-75">
                        Make your web application stand out with high-quality landing page
                    </p>
                </div>
                <div class="col-md-auto col-sm-6">
                    <div class="ps-md-5">
                        <h6 class="mb-4 mt-5 mt-sm-2 fs-14 fw-semibold text-uppercase">
                            Platform</h6>
                        <ul class="list-unstyled">
                            <li class="my-3"><a href="#" class="text-muted">Demo</a></li>
                            <li class="my-3"><a href="#" class="text-muted">Pricing</a></li>
                            <li class="my-3"><a href="#" class="text-muted">Integrations</a></li>
                            <li class="my-3"><a href="#" class="text-muted">Status</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-auto col-sm-6">
                    <div class="ps-md-5">
                        <h6 class="mb-4 mt-5 mt-sm-2 fs-14 fw-semibold text-uppercase">
                            Knowledge Base</h6>
                        <ul class="list-unstyled">
                            <li class="my-3"><a href="#" class="text-muted">Blog</a></li>
                            <li class="my-3"><a href="#" class="text-muted">Help Center</a></li>
                            <li class="my-3"><a href="#" class="text-muted">Sales Tools catalog</a></li>
                            <li class="my-3"><a href="#" class="text-muted">API</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-auto col-sm-6">
                    <div class="ps-md-5">
                        <h6 class="mb-4 mt-5 mt-sm-2 fs-14 fw-semibold text-uppercase">
                            Company</h6>
                        <ul class="list-unstyled">
                            <li class="my-3"><a href="#" class="text-muted">About Us</a></li>
                            <li class="my-3"><a href="#" class="text-muted">Career</a></li>
                            <li class="my-3"><a href="#" class="text-muted">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-auto col-6">
                    <div class="ps-md-5">
                        <h6 class="mb-4 mt-5 mt-sm-2 fs-14 fw-semibold text-uppercase">
                            Legal
                        </h6>
                        <ul class="list-unstyled">
                            <li class="my-3"><a href="#" class="text-muted">Usage Policy</a></li>
                            <li class="my-3"><a href="#" class="text-muted">Privacy Policy</a></li>
                            <li class="my-3"><a href="#" class="text-muted">Terms of Service</a></li>
                            <li class="my-3"><a href="#" class="text-muted">Trust</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row text-md-start text-center">
                <div class="col-md-6">
                    <p class="pb-0 mb-0 text-muted"><script>document.write(new Date().getFullYear())</script> © Prompt. All rights reserved. Crafted
                        by <a href="https://coderthemes.com/">Coderthemes</a></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="align-items-end mt-md-0 mt-4">
                        <ul class="list-unstyled mb-0">
                            <li class="d-inline-block me-4">
                                <a href=""><i data-feather="facebook" class="icon icon-xs"></i></a>
                            </li>
                            <li class="d-inline-block me-4">
                                <a href=""><i data-feather="twitter" class="icon icon-xs"></i></a>
                            </li>
                            <li class="d-inline-block">
                                <a href=""><i data-feather="linkedin" class="icon icon-xs"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- footer end -->


    <!-- back to top -->
    <a class="btn btn-soft-primary shadow-none btn-icon btn-back-to-top" href='#'><i class="icon-xxs" data-feather="arrow-up"></i></a>

    <!-- javascript -->
    <!-- vendor js -->
    <script src="{{asset('/cliente/js/vendor.min.j')}}s"></script>


    <!-- theme js -->
    <script src="{{asset('/cliente/js/theme.min.js')}}"></script>

</body>

</html>
