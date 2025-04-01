<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Uji;

class HistoryController extends Controller
{
    public function index()
    {
        $data['uji'] = Uji::where('user_id', auth()->user()->id)->latest()->get();

        return view('frontend.history.index', $data);
    }

    public function show($id)
    {
        $data['uji'] = Uji::find($id);

        return view('frontend.history.show', $data);
    }
}
