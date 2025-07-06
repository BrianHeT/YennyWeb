<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Mostrar listado de usuarios
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Mostrar formulario para editar el rol
    public function editRole($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit-role', compact('user'));
    }

    // Actualizar el rol del usuario
    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'role' => 'required|in:client,admin',
        ]);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Rol actualizado correctamente.');
    }
}

