<?php

namespace App\Http\Controllers\Admin;


use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VentasSessionController extends Controller
{
    


    function index(){
        if(request()->wantsJson())
        {
            $sessionVentas = \Session::get('ventas');
            return response(compact('sessionVentas'));
        }        
    }

    function store(Request $request)
    {
        if(request()->wantsJson()){

            $ventas = \Session::get('ventas');
           
            $producto = Producto::where('codigo',$request->codigo)->first();
            
            if(!$producto){
                return response(['error'=>"Lo siento tu producto no existe"],404);
            }
            //dd($ventas);
            //la session de ventas existe?
            if(is_array($ventas)){
                   

                //el producto si existe en esta sesion     
                if(session()->has('ventas.'.$producto->codigo)){
                    //si la sesion ya existe debo buscar el producto                      
                    $ventaExistente = $request->session()->get('ventas.'.$producto->codigo); 

                    //elimino el item  que existía
                    $request->session()->forget('ventas.'.$producto->codigo);

                    $cantidad = $ventaExistente->cantidad + $request->cantidad;
                    $importe  = $cantidad * $producto->precio;
                    

                    $ventaN = (object)[
                        "id"=>$producto->id,
                        "nombre"=>$producto->nombre,
                        "precio"=>$producto->precio,
                        "cantidad"=>$cantidad,
                        "importe"=>$importe
                    ];

                    \Session::put('ventas.'.$producto->codigo,$ventaN);                   

                }
                else{
                    $ventaN = (object)[
                        "id"=>$producto->id,
                        "nombre"=>$producto->nombre,
                        "precio"=>$producto->precio,
                        "cantidad"=>$request->cantidad,
                        "importe"=>$request->cantidad*$producto->precio
                    ];
    
                    \Session::put('ventas.'.$producto->codigo,$ventaN);
                }
            }
            else{
                $ventaN = (object)[
                    "id"=>$producto->id,
                    "nombre"=>$producto->nombre,
                    "precio"=>$producto->precio,
                    "cantidad"=>$request->cantidad,
                    "importe"=>$request->cantidad*$producto->precio
                ];

                \Session::put('ventas.'.$producto->codigo,$ventaN);
                
            }

            $sessionVentas = \Session::get('ventas');
            return response(compact('sessionVentas'),200);
        }
    }
}
