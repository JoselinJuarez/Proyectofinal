<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showDashboard()
    {
        return view('user.dashboard');
    }

    public function index(Request $request)
    {
        $users = User::paginate(10);

        if ($request->wantsJson()) {
            return response()->json($users);
        }

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'pass' => 'required|string|min:8',
            'role' => 'required|in:Administrador,Cobrador',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $path = null;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('images/users', 'public');
        }

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['pass']),
            'role' => $validatedData['role'],
            'foto' => $path ? Storage::url($path) : null
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Usuario agregado exitosamente.');

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:Administrador,Cobrador',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $user = User::findOrFail($id);

        $path = $user->foto;

        if ($request->hasFile('foto')) {
            if ($path) {
                $pathToDelete = str_replace('/storage/', '', $path);
                Storage::disk('public')->delete($pathToDelete);
            }

            $path = $request->file('foto')->store('images/users', 'public');
        }

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'foto' => $user->foto != $path ? Storage::url($path) : $user->foto,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Usuario actualizado exitosamente.');

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        if ($user->foto) {
            $pathToDelete = str_replace('/storage/', '', $user->foto);
            Storage::disk('public')->delete($pathToDelete);
        }

        $user->delete();

        session()->flash('status', 'warning');
        session()->flash('message', 'Usuario eliminado exitosamente.');

        return redirect()->route('users.index');
    }
}
