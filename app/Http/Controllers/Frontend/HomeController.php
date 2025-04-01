<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Uji;

class HomeController extends Controller
{
    public function index()
    {
        $data['uji'] = Uji::count();
        
        return view('frontend.home', $data);
    }
}
