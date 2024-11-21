<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadosController extends Controller
{
    //
    public function index(){
        $empleados = Prestamo::with('cliente')->get();
        return view("empleado")->with("empleados",$empleados);}
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
        
   /* public function create()
    {*

    }
    public function creat()
    {
        
    }
    ihui
    ,pkpok*/
}
