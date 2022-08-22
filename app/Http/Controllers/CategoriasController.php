<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::latest()->paginate(5);
        return View("admin.categorias.index", compact("categorias"));
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    // public function post()
    // {
    //     return View('admin.categorias.create', compact());
    // }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
        ],

        [
            'nombre.required' => 'El nombre de la categoria es requerido',
        ]);

        Categorias::insert([
            'nombre' => $request->nombre,
            'created_at' => Carbon::now()
        ]);


        $notification  = array(
            'message' => "Categoria Agregada Correctamente",
            'alert-type' => "success",
        );


        return redirect()->route('categorias.index')->with($notification);

    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        if ($id > 0) {
            Categorias::findOrFail($id)->delete();

            $notification = array(
                'message' => "La categoria se eliminó correctamente",
                "alter-type" => "error"
            );

            return  redirect()->route('categorias.index')->with($notification);
        }

        $notification = array(
            'message' => "La categoria no existe",
            "alter-type" => "error"
        );

        return redirect()->route('categorias.index')->with($notification);
    }


    public function edit($id)
    {
        if ($id > 0) {
            $categorias = Categorias::findOrFail($id);
            return view('admin.categorias.update', compact("categorias"));
        }

        $notification = array(
            'message' => "La zona no existe",
            "alter-type" => "error"
        );

        return redirect()->route('categorias.index')->with($notification);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre de la es requerido',
        ]);

        Categorias::findOrFail($id)->update([
            'nombre' => $request->nombre,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => "Categoria Actualizada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('categorias.index')->with($notification);
    }
}
