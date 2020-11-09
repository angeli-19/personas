<?php

namespace App\Http\Controllers;

use App\Registros;
use Illuminate\Http\Request;

class RegistrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos= Registros::all();
        return view("registros", compact("datos"));
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
        /*$rules=[
            "nombre"=>"required|max:10",
            "apellido"=>"required|max:20",
            "dom"=>"required|numeric"
        ];*/
        //$validateData=$request ->validate($rules);
        $request->validate([
            "nombre"=>"required|max:10",
            "apellido"=>"required|max:20",
            "dom"=>"required|numeric"
        ],
        [
            "nombre.requered"=>"el campo nombre esta vacio",
            "nombre.max"=>"nombre sobrepasa el maximo de caracteres",
            "apellido.requered"=>"el campo apellido esta vacio",
            "apellido.max"=>"apellidos sobrepasa el maximo de caracteres",
            "dom.numeric"=>"el domicilio es numerico"
        ]
                );
        $registros = new Registros ([
            "nombre"=> $request->nombre,
            "apellido"=> $request->apellido,
            "nacimiento"=> $request->edad,
            "direccion"=> $request->dom
        ]);
        $registros->save();
        return redirect("/home")->with("success", "se ha guardado ". $request->nombre);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Registros  $registros
     * @return \Illuminate\Http\Response
     */
    public function show(Registros $registros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registros  $registros
     * @return \Illuminate\Http\Response
     */
    public function edit(Registros $registros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registros  $registros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
            $registros = Registros::find($id);
            $registros-> nombre = $request->enombre;
            $registros-> apellido = $request->eapellido;
            $registros-> nacimiento = $request->eedad;
            $registros-> direccion = $request->edom;
            $registros->save();
            return redirect("/home")->with("success", "se ha actualizado la informacion". $request->enombre);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registros  $registros
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registros = Registros::find($id);
        $nombre=$registros->nombre." ".$registros->apellido;
        $registros->delete();
        return redirect("/home")->with("success", "se ha eliminado la informacion de ".$nombre);
    }
}
