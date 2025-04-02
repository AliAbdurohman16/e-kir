<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::all();

        return view('backend.user.index', $data);       
    }

    public function create()
    {
        $data['roles'] = Role::all();

        return view('backend.user.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|min:10|max:15|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required'
        ]);

        unset($data['role']);

        $data['password'] = Hash::make($request->password);

        User::create($data)->assignRole($request->role);

        return redirect()->route('pengguna.index')->with('message', 'Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            'user' => User::findOrFail($id),
            'roles' => Role::all(),
        ];

        return view('backend.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => $user->email === $request->email ? 'required|email' : 'required|string|email|max:255|unique:users,email',
            'phone' => $user->phone === $request->phone ? 'required' : 'required|string|min:10|max:15|unique:users,phone',
            'password' => $request->password ? 'required|min:8|confirmed' : '',
            'role' => 'required'
        ]);

        unset($data['role']);

        $data['password'] = $request->password ? Hash::make($request->password) : $user->password;

        $user->update($data);

        if ($request->role !== $user->name) {
            $user->syncRoles($request->role);
        }

        return redirect()->route('pengguna.index')->with('message', 'Berhasil diperbarui!.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'Berhasil dihapus!']);
    }
}
