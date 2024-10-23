<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Prestamo; // Asegúrate de que el modelo Prestamo esté correctamente importado

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index()
    {
        // Obtén todos los registros de la tabla "prestamos" usando Eloquent si funciona
        $prestamos = Prestamo::all();
    
        // Retorna la vista "prestamos" con los datos
        return view("prestamos")->with("prestamos", $prestamos);
    }
    /*public function indexprestamos()
    {
        //
        //
        $prestamos=DB::select("select *from prestamos");
        //$prestamosPrestamos::all();
//return view("prestamos");
        return view("editarprestamos")->with("prestamos",$prestamos);
    }*/

    /**
     * Show the form for creating a new resource.
     */
    public function delete($id)
    {
        //
        try{
        $sql=DB::delete("delete from prestamos where id_prestamos=$id");
        //$prestamosPrestamos::all();
//return view("prestamos");
    }catch(\Throwable $th){
        $sql=0;
    }
    if ($sql==true){
        return back()->with("correcto","coooo");

    }else{
        return back()->with("in","inn");
    }
}
      

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
{
    // Crear un nuevo registro de préstamo usando Eloquent si funciona
    $prestamo = new Prestamo();
    $prestamo->id_prestamos = $request->numero;
    $prestamo->fecha_de_inicio = $request->inicio;
    $prestamo->fecha_de_fin = $request->fin;
    $prestamo->montos = $request->monto;
    $prestamo->periodo = $request->nombree;
    $prestamo->var = $request->var;

    // Guardar el registro en la base de datos
    if($prestamo->save()){
        return back()->with("correcto", "correcto");
    } else {
        return back()->with("incorrecto", "incorrecto");
    }
}
   public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        return view('prestamos.edit', compact('prestamo'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombree' => 'required|string|max:255',
            'inicio' => 'required|date',
            'fin' => 'required|date',
            'monto' => 'required|numeric',
            'var' => 'required|string|max:255',
        ]);

        try {
            $updated = DB::update("UPDATE prestamos SET fecha_de_inicio = ?, fecha_de_fin = ?, montos = ?, periodo = ?, var = ? WHERE id = ?", [
                $request->nombree,
                $request->inicio,
                $request->fin,
                $request->monto,
                $request->var,
                $id,
            ]);

            if ($updated) {
                return redirect()->route('prestamos.index')->with("correcto", "Actualización exitosa");
            } else {
                return back()->with("incorrecto", "No se realizó ninguna actualización");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error: " . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    //public function show(string $id)
    //{
        //
    //}

    /**
     * Show the form for editing the specified resource.
     */
    //public function edit(string $id)
    //{
        //
    //}

    /**
     * Update the specified resource in storage.
     */
   // public function update(Request $request, string $id)
    //{
        //
    //}

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(string $id)
    //{
        //
    //}
}
