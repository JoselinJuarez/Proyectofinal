<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientesModel;

class clientesController extends Controller
{


    public function guardarCliente(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'ci' => 'required|string|max:20',
            'correo' => 'required|email',
            'direccion' => 'required|string|max:255',
            'direccionTrabajo' => 'nullable|string|max:255',
            'empresa' => 'nullable|string|max:255',
            'celular' => 'required|digits:8',
        ]);

        // Crear el cliente y guardarlo
       // cliente::create($validated);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Cliente registrado con éxito.');


}
}
