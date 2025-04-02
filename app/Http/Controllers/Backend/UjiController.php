<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Uji;

class UjiController extends Controller
{
    public function index()
    {
        $data['belumValidasi'] = Uji::where('status_validasi', 'Belum Validasi')->get();

        return view('backend.data-uji.belum-validasi', $data);
    }

    public function show($id)
    {
        $data['uji'] = Uji::findOrFail($id);

        return view('backend.data-uji.show', $data);
    }

    public function validasi(Request $request, $id)
    {
        $uji = Uji::findOrFail($request->id);

        $uji->update(['status_validasi' => 'Valid']);

        return response()->json(['success' => 'Data Uji berhasil divalidasi.']);
    }

    public function sudahValidasi()
    {
        $data['sudahValidasi'] = Uji::where('status_validasi', 'Valid')->get();

        return view('backend.data-uji.sudah-validasi', $data);
    }

    public function belumDiuji()
    {
        $data['belumDiuji'] = Uji::where('status_validasi', 'Valid')->where('status_uji', 'Belum Diuji')->get();

        return view('backend.data-uji.belum-diuji', $data);
    }

    public function lolos(Request $request, $id)
    {
        $uji = Uji::findOrFail($request->id);

        $uji->update(['status_uji' => 'Teruji']);

        return response()->json(['success' => 'Kendaraan tersebut sudah teruji.']);
    }

    public function tolak(Request $request, $id)
    {
        $uji = Uji::findOrFail($request->id);

        $uji->update(['status_uji' => 'Tidak Teruji']);

        return response()->json(['success' => 'Kendaraan tersebut gagal teruji.']);
    }

    public function teruji()
    {
        $data['teruji'] = Uji::where('status_uji', 'Teruji')->get();

        return view('backend.data-uji.teruji', $data);
    }

    public function tidakTeruji()
    {
        $data['tidakTeruji'] = Uji::where('status_uji', 'Tidak Teruji')->get();

        return view('backend.data-uji.tidak-teruji', $data);
    }
}
