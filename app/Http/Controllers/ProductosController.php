<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos= Productos::all();
        return view("productos", compact("datos"));
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
        $request->validate([
            "nombre"=>"required",
            "descripcion"=>"required",
            "tipo"=>"required",
            "precio"=>"required"
        ] );
        $productos= new Productos ([
            "nombre"=> $request->nombre,
            "descripcion"=> $request->descripcion,
            "tipo"=> $request->tipo,
            "precio"=> $request->precio
        ]);
        $productos->save();
        return redirect("/productos")->with("success", "se ha guardado ". $request->nombre);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
            $productos = Productos::find($id);
            $productos-> nombre = $request->enombre;
            $productos-> descripcion = $request->eapellido;
            $productos-> tipo = $request->eedad;
            $productos-> precio = $request->edom;
            $productos->save();
            return redirect("/productos")->with("success", "se ha actualizado la informacion". $request->enombre);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productos = Productos::find($id);
        $nombre=$productos->nombre." ".$registros->descripcion;
        $productos->delete();
        return redirect("/productos")->with("success", "se ha eliminado la informacion de ".$nombre);
    }
}
