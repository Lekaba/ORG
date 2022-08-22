@extends('admin.admin_master')
@section('admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Productos</h1>
                </div>
                <br><br>
                <hr>
                <div class="col-sm-2">
                    <ol class="breadcrumb float-md-left">
                        <a class="btn btn-primary btn-md" href="{{ route('productos.create') }}"><i class="fas fa-plus-circle"></i>

                            &nbsp; Añadir Producto
                        </a>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped"
                        aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th class="text-center" class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Nombre
                                </th>
                                <th class="text-center" class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Categoria
                                </th>
                                <th class="text-center" class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Descripción
                                </th>
                                <th class="text-center" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">
                                    Acciones
                                </th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($productos as $producto)
                                <tr class="odd">
                                    <td class="text-center" class="dtr-control sorting_1" tabindex="0">{{ $producto->nombre }}</td>
                                    <td class="text-center" class="dtr-control sorting_1" tabindex="0">{{ $producto->categoria->nombre ?? 'N/A'}}</td>
                                    <td class="text-center" class="dtr-control sorting_1" tabindex="0">{{ $producto->descripcion }}</td>
                                    <th class="text-center" class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            <a class="btn btn-md btn-success" href="{{ route('productos.edit', $producto->id) }}">
                                                <i class="fa fa-eye" aria-hidden="true"> </i>
                                            </a>

                                            <a class="btn btn-md btn-danger" href="{{ route('productos.destroy', $producto->id) }}"
                                                id="delete"><i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>

                                        </div>
                                    </th>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex">
                        {!! $productos->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
