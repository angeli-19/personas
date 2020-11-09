<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos= Libro::all();
        return view("libro", compact("datos"));
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
            "autor"=>"required",
            "genero"=>"required",
            "paginas"=>"required"
        ] );
        $libro= new Libro ([
            "nombre"=> $request->nombre,
            "autor"=> $request->autor,
            "genero"=> $request->genero,
            "paginas"=> $request->paginas
        ]);
        $libro->save();
        return redirect("/libro")->with("success", "se ha guardado ". $request->nombre);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
            $libro = Libro::find($id);
            $libro-> nombre = $request->enombre;
            $libro-> autor = $request->eapellido;
            $libro-> genero = $request->eedad;
            $libro-> paginas = $request->edom;
            $libro->save();
            return redirect("/libro")->with("success", "se ha actualizado la informacion". $request->enombre);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::find($id);
        $nombre=$libro->nombre." ".$libro->autor;
        $libro->delete();
        return redirect("/libro")->with("success", "se ha eliminado la informacion de ".$nombre);
    }
}
