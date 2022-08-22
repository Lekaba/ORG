@extends('admin.admin_master')

@section('admin')
    <section class="content-header" style="margin-top: 10px">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Productos</h1>
                </div>
                <br><br>
            </div>
            <hr>
        </div>
    </section>
    <div  class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Creación de Producto</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingresa el nombre">
                        @error('nombre')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" class="form-control" id="descripcion" cols="10" rows="2" placeholder="Ingresa la descripcion"></textarea>
                        @error('descripcion')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="categoria_id">Categoria:</label>
                        <select name="categoria_id" class="form-select" aria-label="Default select example">
                            <option value="{{$producto->categoria->id ?? ''}}">Selecciona una categoria</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                    <div class="form-floathing">
                        <label for="nombre_archivos">Imagen del producto</label>
                        <input type="file" name="nombre_archivos[]" class="form-control" multiple>
                    </div>


                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <a href="{{ route('productos.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
