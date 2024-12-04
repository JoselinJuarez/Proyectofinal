<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'prestamo_id',
        'fecha_pago',
        'monto',
    ];

    protected static function booted()
    {
        static::created(function ($pago) {
            $prestamo = $pago->prestamo;
            $totalPagos = $prestamo->pagos()->sum('monto');

            if ($totalPagos >= $prestamo->total) {
                $prestamo->update(['estado' => 'Pagado']);
            }
        });
    }

    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }
}
