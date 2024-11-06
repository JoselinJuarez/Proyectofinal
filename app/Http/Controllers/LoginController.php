<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Crea una vista para el formulario de login
    }
    public function home()
    {
        return view('home'); // Crea una vista para el formulario de login
    }


    public function login(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'contrasena' => 'required|string',
        ]);

        $usuario = Usuario::where('nombre', $request->nombre)->first();

        if ($usuario && Hash::check($request->contraseña, $usuario->contraseña) && $usuario->estado === 'activo') {
            Auth::login($usuario);

            // Manejar redirección según el rol
            switch ($usuario->rol) {
                case 'admin':
                    return redirect()->route('home'); // Redirigir a la ruta del administrador
                //case 'empleado':
                 //   return redirect()->route('empleado.home'); // Redirigir a la ruta del empleado
                default:
                    return redirect()->route('login'); // Redirigir a una ruta por defecto si no coincide
            }
        }

        return back()->withErrors(['nombre' => 'Credenciales incorrectas o usuario deshabilitado.']);
    }

    //public function logout()
   // {
        //Auth::logout();
        //return redirect()->route('login'); // Redirigir a la página de login
   // }
}
