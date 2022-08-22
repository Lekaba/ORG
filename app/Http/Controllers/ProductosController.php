<?php

namespace App\Http\Controllers;

use App\Models\ArchivosProductos;
use App\Models\Categorias;
use Illuminate\Http\Request;
use App\Models\Productos;
use Carbon\Carbon;

class ProductosController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:estatus-list|estatus-created|estatus-edit|estatus-delete', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:estatus-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:estatus-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:estatus-delete', ['only' => ['destroy']]);
    // }

    // public function createPDF()
    // {
    //     $datos = Expedientes::all();
    //     $pdf = PDF::loadView('admin.expedientes.createPDF', compact('datos'));
    //     return $pdf->download('Expedientes_PDF.pdf');
    // }

    public function index()
    {
        $productos = Productos::latest()->paginate(50);
        return View("admin.productos.index", compact("productos"));
    }

    public function create()
    {

        $categorias = Categorias::latest()->get();
        return View('admin.productos.create', compact("categorias"));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required',
            'descripcion' => 'required',

        ],
        [
            'nombre.required' => 'El nombre del producto es requerido',
            'categoria_id.required' => 'La categoria del producto es requerido',
            'descripcion.required' => 'La descripcion del producto es requerido',

        ]);

        // Productos::insert([
        //     'nombre' => $request->nombre,
        //     'categoria_id' => $request->categoria_id,
        //     'descripcion' => $request->descripcion,
        //     'created_at' => Carbon::now()
        // ]);

        $new_producto = Productos::create($data);

        if ($request->has('nombre_archivos')) {
            foreach ($request->file('nombre_archivos') as $documento) {
                $documento_nname = $data['nombre'] . '-documento-' . time() . rand(1, 1000) . '.' . $documento->extension();
                $documento->move(public_path('cliente/images/photos'), $documento_nname);
                $archivoid = ArchivosProductos::insertGetId([
                    'producto_id' => $new_producto->id,
                    'nombre_archivos' => $documento_nname,
                    'nombre' => $documento_nname,
                    'created_at' => Carbon::now()
                ]);

                $new_producto->update([
                    'archivos_productos_id' => $archivoid,
                ]);
            }
        }

        $notification  = array(
            'message' => "Producto Agregado Correctamente",
            'alert-type' => "success",
        );


        return redirect()->route('productos.index')->with($notification);

    }
    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        if ($id > 0) {
        Productos::findOrFail($id)->delete();

        $notification = array(
            'message' => "Producto Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('productos.index')->with($notification);
        }
        $notification = array(
            'message' => "La categoria no existe",
            "alter-type" => "error"
        );
        return redirect()->route('productos.index')->with($notification);

    }

    public function deleteProductos($id, $Productoid)
    {
        ArchivosProductos::where("id",$id)->where("producto_id", $Productoid)->delete();

        $notification = array(
            'message' => "Archivo Productos Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('productos.index')->with($notification);
        }

    public function edit($id)
    {
        if ($id > 0) {
        $productos = Productos::findOrFail($id);
        $archivos_productos = ArchivosProductos::where('productos_id', $productos->id)->get();
        return View('admin.productos.update', compact("productos", "archivos_productos"));
        }

        $notification = array(
            'message' => "La zona no existe",
            "alter-type" => "error"
        );

        return redirect()->route('productos.index')->with($notification);
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'nombre' => '',
        ]);

        Productos::findOrFail($id)->update([
            'nombre' => $request->numero,
            'categoria_id' => $request->categoria_id,
            'descripcion' => $request->descripcion,
            'updated_at' => \Carbon\Carbon::now(),
        ]);


        $notification = array(
            'message' => "Producto Actualizado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('productos.index')->with($notification);
    }
}

