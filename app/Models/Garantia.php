<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garantia extends Model
{
    use HasFactory;

    protected $fillable = [
        'prestamo_id',
        'valor',
        'descripcion',
        'estado'
    ];

    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }
}
