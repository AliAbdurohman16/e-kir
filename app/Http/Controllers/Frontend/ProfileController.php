<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::user();
        
        return view('frontend.profile.index', $data);
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        
        return view('frontend.profile.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $data = $request->validate([
            'image' => 'mimes:jpg,png,jpeg|image|max:2048',
            'name' => 'required',
            'email' => $user->email === $request->email ? 'required|email' : 'required|email|unique:users,email',
            'phone' => $user->phone === $request->phone ? 'required|min:10|max:15' :  'required|unique:users,phone',
        ]);

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete('users/' . $user->image);
            }

            $data['image'] = basename($request->file('image')->store('users', 'public'));
        }

        $user->update($data);

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diubah!');
    }
}
