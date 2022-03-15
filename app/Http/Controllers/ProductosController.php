<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $Productos  =  Producto::join('categorias as categorias', 'categorias.id', '=', 'productos.categoria_id')
            ->select('categorias.nombre as categoria', 'productos.*')
            ->get();

            return response()->json( $Productos, 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error Server', 'resp' => false], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $Producto = new Producto();
            $Producto->nombre = $request->nombre;
            $Producto->slug = $request->slug;
            $Producto->descripcion = $request->descripcion;
            $Producto->categoria_id = $request->categoria_id;
            $Producto->precio = $request->precio;
            if ($Producto->save()) {
                return response()->json(['message' => 'Se ha Guardado con éxito', 'resp' => true], 200);
            }
        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['message' => 'Error Server', 'resp' => false], 500);
            //throw $th;
        }
        // return response()->json("welcome", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $Producto =  Producto::join('categorias as categorias', 'categorias.id', '=', 'productos.categoria_id')
            ->select('categorias.nombre as categoria', 'productos.*')
            ->where('productos.id', "=", $id)
            ->first();
  
            return response()->json($Producto, 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error Server', 'resp' => false], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $Producto =  Producto::join('categorias as categorias', 'categorias.id', '=', 'productos.categoria_id')
            ->select('categorias.nombre as categoria', 'productos.*')
            ->where('productos.id', "=", $id)
            ->first();
  
            return response()->json($Producto, 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error Server', 'resp' => false], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $Producto = Producto::find($id);
            $Producto->nombre = $request->nombre;
            $Producto->slug = $request->slug;
            $Producto->descripcion = $request->descripcion;
            $Producto->categoria_id = $request->categoria_id;
            $Producto->precio = $request->precio;
            if ($Producto->save()) {
                return response()->json(['message' => 'Se ha actualizado con exito', 'resp' => true], 200);
            }
         
            //code...
        } catch (\Throwable $th) {
         
            return response()->json(['message' => 'Error Server', 'resp' => false], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $Producto =  Producto::find($id);

            if ($Producto->delete()) {
                return response()->json(['message' => 'Se ha guardado con eliminador', 'resp' => true], 200);
            }
            return response()->json(['message' => 'No se eliminor', 'resp' => true], 404);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error Server', 'resp' => false], 500);
        }
    }
}
