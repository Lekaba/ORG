@extends('admin.admin_master')


@section('admin')
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blank Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section> --}}

    <!-- Main content -->
    <section class="content">
        @php
            use App\Models\Productos;
            use App\Models\Categorias;
            $cp = Productos::count();
            $cc = Categorias::count();
        @endphp

        <div class="row" style= "padding: 100px 20px 20px 500px; ">
            <div class="col-lg-2 col-12">

            <div class="small-box bg-info">
            <div class="inner">
            <h3>{{$cc}}</h3>
            <p>Categorias Registradas</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>

            </div>
            </div>

            <div class="col-lg-2 col-12">

            <div class="small-box bg-success">
            <div class="inner">
            <h3>{{$cp}}<sup style="font-size: 20px"></sup></h3>
            <p>Productos Registrados</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>

            </div>
            </div>
        </div>

            {{-- <div class="row">

            <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
            <div class="inner">
            <h3>44</h3>
            <p>User Registrations</p>
            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>

            <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
            <div class="inner">
            <h3>65</h3>
            <p>Unique Visitors</p>
            </div>
            <div class="icon">
            <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
        </div> --}}



    </section>
    <!-- /.content -->
@endsection
