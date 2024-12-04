<?php

namespace App\Http\Controllers\User;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{
    /*public function index(Request $request)
    {
        $clientes = Cliente::paginate(10);

        if ($request->wantsJson()) {
            return response()->json($clientes);
        }

        return view('user.clientes.index', compact('clientes'));
    }*/public function index(Request $request)
    {
        $busqueda = $request->get('busqueda');
        $clientes = Cliente::where('nombre', 'like', '%' . $busqueda . '%')
                           ->orWhere('correo', 'like', '%' . $busqueda . '%')
                           ->paginate(10);

        if ($request->wantsJson()) {
            return response()->json($clientes);
        }

        return view('user.clientes.index', compact('clientes', 'busqueda'));

    }

    public function create()
    {
        return view('user.clientes.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo',
            'telefono' => 'required|digits_between:8,15',
            'direccion' => 'required|string|max:255',
        ]);

        Cliente::create([
            'nombre' => $validatedData['nombre'],
            'correo' => $validatedData['correo'],
            'telefono' => $validatedData['telefono'],
            'direccion' => $validatedData['direccion'],
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Cliente agregado exitosamente.');

        return redirect()->route('clientes.index');
    }

    public function edit(Cliente $cliente)
    {
        return view('user.clientes.form', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo,' . $id,
            'telefono' => 'required|digits_between:8,15',
            'direccion' => 'required|string|max:255',
        ]);

        $cliente = Cliente::findOrFail($id);

        $cliente->update([
            'nombre' => $validatedData['nombre'],
            'correo' => $validatedData['correo'],
            'telefono' => $validatedData['telefono'],
            'direccion' => $validatedData['direccion'],
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Cliente actualizado exitosamente.');

        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        session()->flash('status', 'warning');
        session()->flash('message', 'Cliente eliminado exitosamente.');

        return redirect()->route('clientes.index');
    }
}
