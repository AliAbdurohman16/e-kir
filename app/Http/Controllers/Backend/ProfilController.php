<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $data['profile'] = Auth::user();

        return view('backend.profile.index', $data);
    }

    public function store(Request $request)
    {
        $profile = Auth::user();

        $data = $request->validate([
            'avatar' => 'mimes:jpg,png,jpeg|image|max:2048',
            'name' => 'required',
            'email' => $profile->email === $request->email ? 'required|email' : 'required|email|unique:users,email',
            'phone' => $profile->phone === $request->phone ? 'required' : 'required|string|min:10|max:15|unique:users,phone',
        ]);

        if ($request->hasFile('image')) {
            if ($profile->image) {
                Storage::disk('public')->delete('users/' . $profile->image);
            }

            $data['image'] = basename($request->file('image')->store('users', 'public'));
        }

        $profile->update($data);

        return redirect()->back()->with('message', 'Data berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $profile = Auth::user();

        Storage::disk('public')->delete('users/' . $profile->image);

        $profile->update(['image' => 'default/user.jpg']);

        return redirect()->back()->with('message', 'Foto berhasil dihapus!');
    }
}
