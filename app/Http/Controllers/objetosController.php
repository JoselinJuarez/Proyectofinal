<?php

namespace App\Http\Controllers;

use App\Models\Objetos;
use Illuminate\Http\Request;


class objetosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexgarantia()
    {
        //
        $objetos =Objetos::all();
     
        // Retorna la vista "prestamos" con los datos
        return view("garantias")->with("objetos", $objetos);
    }
    public function crearobjeto(Request $request)
    {
        // Crear un nuevo registro de préstamo usando Eloquent si funciona
        $objetos= new Objetos();
        $objetos->nombre_objeto=$request->nombree;
        $objetos->monto= $request->fin;
        $objetos->descripcion= $request->monto;
        $objetos->valor_evaluado= $request->var;
        $objetos->estado= $request->estado;
        if($objetos->save()){
            return back()->with("correcto", "correcto");
        } else {
            return back()->with("incorrecto", "incorrecto");
        }
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    //public function show(r $r)
    //{
        //
   // }

    /**
     * Show the form for editing the specified resource.
     */
  //  public function edit(r $r)
  //  {
        //
  //  }

    /**
     * Update the specified resource in storage.
     */
   // public function update(Request $request, r $r)
   // {
        //
   // }

    /**
     * Remove the specified resource from storage.
     */
  //  public function destroy(r $r)
  //  {
        //
 //   }
}
