<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;



    // app/Models/Prestamo.php



    protected $table = 'Prestamos';
    //protected $primaryKey = 'prestamo_id';

    

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'pre_id_cliente', 'id_cliente');
    }
    public function var()
    {
        return $this->belongsTos(Objetos::class, 'pre_id_objeto','id_objetos');
    }


}
