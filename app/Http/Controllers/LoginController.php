<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function verificarLogin()
    {
        if (Auth::check())
        {
            $roleUser = Auth::user()->role;

            if ($roleUser == 'admin')
            {
                return redirect()->route('adminDashboard');
            }
            else
            {
                return redirect()->route('userDashboard');
            }
        }

        return redirect(route('login'));
    }
}
