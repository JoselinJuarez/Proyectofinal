<?php

namespace App\Http\Controllers\User;

use App\Models\Prestamo;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PrestamosController extends Controller
{
    public function index(Request $request)
    {
        $prestamos = Prestamo::with('cliente', 'usuario')->paginate(10);

        if ($request->wantsJson()) {
            return response()->json($prestamos);
        }

        return view('user.prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        $clientes = Cliente::all()->pluck('nombre', 'id')->toArray();
        return view('user.prestamos.form', compact('clientes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'monto' => 'required|numeric|min:0',
            'interes' => 'required|in:0.17,0.10,0.20',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $total = $validatedData['monto'] + ($validatedData['monto'] * $validatedData['interes']);

        Prestamo::create([
            'cliente_id' => $validatedData['cliente_id'],
            'id_usuario' => Auth::user()->id,
            'monto' => $validatedData['monto'],
            'interes' => $validatedData['interes'],
            'estado' => 'Activo',
            'fecha_inicio' => $validatedData['fecha_inicio'],
            'fecha_fin' => $validatedData['fecha_fin'],
            'total' => $total,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Préstamo agregado exitosamente.');

        return redirect()->route('prestamos.index');
    }

    public function edit(Prestamo $prestamo)
    {
        $clientes = Cliente::all()->pluck('nombre', 'id')->toArray();
        return view('user.prestamos.form', compact('prestamo', 'clientes'));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'monto' => 'required|numeric|min:0',
            'interes' => 'required|in:0.17,0.10,0.20',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $total = $validatedData['monto'] + ($validatedData['monto'] * $validatedData['interes']);

        $prestamo->update([
            'cliente_id' => $validatedData['cliente_id'],
            'monto' => $validatedData['monto'],
            'interes' => $validatedData['interes'],
            'fecha_inicio' => $validatedData['fecha_inicio'],
            'fecha_fin' => $validatedData['fecha_fin'],
            'total' => $total,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Préstamo actualizado exitosamente.');

        return redirect()->route('prestamos.index');
    }

    public function destroy(Prestamo $prestamo)
    {
        $prestamo->delete();

        session()->flash('status', 'warning');
        session()->flash('message', 'Préstamo eliminado exitosamente.');

        return redirect()->route('prestamos.index');
    }
    public function pdf(Request $request)
    {
        // Obtener las fechas de inicio y fin desde la solicitud
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;

        // error en tu variable Filtrar los préstamos entre las fechas de inicio y fin
        $prestamos = Prestamo::with('cliente', 'usuario')
            ->where('fecha_inicio','>=',$fecha_inicio)->where('fecha_inicio','<=',$fecha_fin)
            ->get();

        // Generar el PDF a partir de la vista
        $pdf = PDF::loadView('user.pdf.pdf', compact('prestamos'));

        // Devolver el PDF generado
        return $pdf->stream('reporte_prestamos.pdf');
    }
}
