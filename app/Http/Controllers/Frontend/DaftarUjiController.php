<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarUjiController extends Controller
{
    public function index()
    {
        return view('frontend.daftar-uji');
    }

    public function create()
    {
        // 
    }
    
    public function store(Request $request)
    {
        // 
    }

    public function show($id)
    {
        return view('frontend.booking.show', compact('id'));
    }

    public function edit($id)
    {
        return view('frontend.booking.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // 
    }

    public function destroy($id)
    {
        // 
    }
}
