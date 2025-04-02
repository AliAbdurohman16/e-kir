<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Uji;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'belumValidasi' => Uji::where('status_validasi', 'Belum Validasi')->count(),
            'sudahValidasi' => Uji::where('status_validasi', 'Valid')->count(),
            'belumDiuji' => Uji::where('status_validasi', 'Valid')->where('status_uji', 'Belum Diuji')->count(),
            'teruji' => Uji::where('status_uji', 'Teruji')->count(),
            'tidakTeruji' => Uji::where('status_uji', 'Tidak Teruji')->count(),
            'pengguna' => User::whereHas('roles', function ($query) {
                                $query->where('name', 'user');
                            })->count(),
        ];

        return view('backend.dashboard.index', $data);
    }
}
