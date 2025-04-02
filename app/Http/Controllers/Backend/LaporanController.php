<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Uji;

class LaporanController extends Controller
{
    public function index(Request $request)
    {

        return view('backend.report.index');
    }

    public function data(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $uji = Uji::when($start_date, function ($query) use ($start_date) {
                                        return $query->whereDate('updated_at', '>=', $start_date);
                                    })
                                    ->when($end_date, function ($query) use ($end_date) {
                                        return $query->whereDate('updated_at', '<=', $end_date);
                                    })
                                    ->where('status_validasi', 'Valid')
                                    ->where('status_uji', '!=', 'Belum Diuji')
                                    ->get();

        return view('backend.report.data', compact('uji', 'start_date', 'end_date'));
    }
}
