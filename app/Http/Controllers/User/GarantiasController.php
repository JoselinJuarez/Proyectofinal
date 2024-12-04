<?php

namespace App\Http\Controllers\User;

use App\Models\Garantia;
use App\Http\Controllers\Controller;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class GarantiasController extends Controller
{
    public function index(Request $request)
    {
        $garantias = Garantia::with('prestamo')->paginate(10);

        if ($request->wantsJson()) {
            return response()->json($garantias);
        }

        return view('user.garantias.index', compact('garantias'));
    }

    public function create()
    {
        $prestamos = Prestamo::with('cliente')->get()->mapWithKeys(function ($prestamo) {
            return [$prestamo->id => $prestamo->id . ' - ' . $prestamo->cliente->nombre . ' - ' . $prestamo->total];
        })->toArray();
        return view('user.garantias.form', compact('prestamos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
            'valor' => 'numeric|min:0',
            'descripcion' => 'string|max:500'
        ]);

        Garantia::create($validatedData);

        session()->flash('status', 'success');
        session()->flash('message', 'Garantía agregada exitosamente.');

        return redirect()->route('garantias.index');
    }

    public function edit(Garantia $garantia)
    {
        $prestamos = Prestamo::with('cliente')->get()->mapWithKeys(function ($prestamo) {
            return [$prestamo->id => $prestamo->id . ' - ' . $prestamo->cliente->nombre . ' - ' . $prestamo->total];
        })->toArray();
        return view('user.garantias.form', compact('garantia', 'prestamos'));
    }

    public function update(Request $request, Garantia $garantia)
    {
        $validatedData = $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
            'valor' => 'numeric|min:0',
            'descripcion' => 'string|max:500',
            'estado' => 'required|in:En garantía,Vendido,Devuelto',
        ]);

        $garantia->update($validatedData);

        session()->flash('status', 'success');
        session()->flash('message', 'Garantía actualizada exitosamente.');

        return redirect()->route('garantias.index');
    }

    public function destroy(Garantia $garantia)
    {
        $garantia->delete();

        session()->flash('status', 'warning');
        session()->flash('message', 'Garantía eliminada exitosamente.');

        return redirect()->route('garantias.index');
    }
}
