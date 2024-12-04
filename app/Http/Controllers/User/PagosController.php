<?php

namespace App\Http\Controllers\User;

use App\Models\Pago;
use App\Http\Controllers\Controller;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagosController extends Controller
{
    public function index(Request $request)
    {
        $pagos = Pago::with('prestamo')->paginate(10);

        if ($request->wantsJson()) {
            return response()->json($pagos);
        }

        return view('user.pagos.index', compact('pagos'));
    }

    public function create()
    {
        $prestamos = Prestamo::with('cliente')->get()->mapWithKeys(function ($prestamo) {
            return [$prestamo->id => $prestamo->id . ' - ' . $prestamo->cliente->nombre . ' - ' . $prestamo->total];
        })->toArray();
        return view('user.pagos.form', compact('prestamos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
            'fecha_pago' => 'required|date|before_or_equal:today',
            'monto' => 'required|numeric|min:0.01',
        ]);

        DB::transaction(function () use ($validatedData) {
            $pago = Pago::create($validatedData);

            $prestamo = $pago->prestamo;

            $totalPagos = $prestamo->pagos()->sum('monto');
            if ($totalPagos >= $prestamo->total) {
                $prestamo->update(['estado' => 'Pagado']);
            }
        });

        session()->flash('status', 'success');
        session()->flash('message', 'Pago agregado exitosamente.');

        return redirect()->route('pagos.index');
    }

    public function edit(Pago $pago)
    {
        $prestamos = Prestamo::with('cliente')->get()->mapWithKeys(function ($prestamo) {
            return [$prestamo->id => $prestamo->id . ' - ' . $prestamo->cliente->nombre . ' - ' . $prestamo->total];
        })->toArray();
        return view('user.pagos.form', compact('pago', 'prestamos'));
    }

    public function update(Request $request, Pago $pago)
    {
        $validatedData = $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
            'fecha_pago' => 'required|date',
            'monto' => 'required|numeric|min:0.01',
        ]);

        DB::transaction(function () use ($pago, $validatedData) {
            $pago->update($validatedData);

            $prestamo = $pago->prestamo;

            $totalPagos = $prestamo->pagos()->sum('monto');
            if ($totalPagos >= $prestamo->total) {
                $prestamo->update(['estado' => 'Pagado']);
            } else {
                $prestamo->update(['estado' => 'Activo']);
            }
        });

        session()->flash('status', 'success');
        session()->flash('message', 'Pago actualizado exitosamente.');

        return redirect()->route('pagos.index');
    }

    public function destroy(Pago $pago)
    {
        DB::transaction(function () use ($pago) {
            $prestamo = $pago->prestamo;

            $pago->delete();

            $totalPagos = $prestamo->pagos()->sum('monto');
            if ($totalPagos < $prestamo->total) {
                $prestamo->update(['estado' => 'Activo']);
            }
        });

        session()->flash('status', 'warning');
        session()->flash('message', 'Pago eliminado exitosamente.');

        return redirect()->route('pagos.index');
    }
}
