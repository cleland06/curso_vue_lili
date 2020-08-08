<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;

class ProductosController extends Controller
{
    function index(){
        
        $productos = Producto::where('estatus','<>','Eliminado')->get();
        return response(compact('productos'),200);
    }

    function store(Request $request){
        //esto valida que la petición sea solo por ajax ya que solicita un json
        if(request()->wantsJson() )
        {
            $producto = new Producto;

            $producto->nombre  = $request->nombre;
            $producto->codigo  = $request->codigo;
            $producto->precio  = $request->precio;
            $producto->save();
        }


    }

    function edit(Producto $producto){
        if(request()->wantsJson())
        return response(compact('producto'),200);
    }

    function update(Request $request , Producto $producto){

        $producto->update($request->all());
        

    }

    function destroy(Producto $producto){
        if(request()->wantsJson())
        $producto->update(["estatus"=>"Eliminado"]);
    }

}
