<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'id_usuario',
        'monto',
        'interes',
        'estado',
        'fecha_inicio',
        'fecha_fin',
        'total'
    ];

    protected static function booted()
    {
        static::updated(function ($prestamo) {
            if ($prestamo->wasChanged('total')) {
                $totalPagos = $prestamo->pagos()->sum('monto');

                if ($totalPagos < $prestamo->total) {
                    $prestamo->updateQuietly(['estado' => 'Activo']);
                }

                if ($totalPagos == $prestamo->total) {
                    $prestamo->updateQuietly(['estado' => 'Pagado']);
                }
            }
        });
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function garantias()
    {
        return $this->hasMany(Garantia::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
