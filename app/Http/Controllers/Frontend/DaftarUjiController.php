<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Uji;
use Image;
use App\Helpers\Huffman;

class DaftarUjiController extends Controller
{
    public function index()
    {
        return view('frontend.daftar-uji');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'tanggal_pengujian' => 'required',
            'jenis_kendaraan' => 'required',
            'nama' => 'required',
            'alamat_garasi' => 'required',
            'merk_kendaraan' => 'required',
            'tipe_kendaraan' => 'required',
            'tahun_pembuatan' => 'required',
            'nomor_kendaraan' => 'required',
            'nomor_pemeriksaan' => 'required',
            'nomor_chassis' => 'required',
            'nomor_mesin' => 'required',
            'macam' => 'required',
            'bahan' => 'required',
            'keistimewaan' => 'required',
            'tanggal_terakhir_pengujian' => 'required',
            'tempat_terakhir_pengujian' => 'required',
            'ktp' => 'required|mimes:jpg,png,jpeg|image',
            'stnk' => 'required|mimes:jpg,png,jpeg|image',
            'surat_uji_kendaraan' => 'required|mimes:jpg,png,jpeg|image',
        ]);

        // Ambil kode terakhir yang sudah ada dari database
        $lastKode = Uji::where('kode', 'like', 'KIR%')->orderBy('kode', 'desc')->first();

        // Jika kode terakhir ada, ambil angka 4 digitnya, jika tidak mulai dari 1
        $lastNumber = $lastKode ? (int) substr($lastKode->kode, 3) : 0;

        // Buat kode baru dengan format KIR+4 digit angka
        $newKode = 'KIR' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

        $data['user_id'] = auth()->user()->id;

        $data['kode'] = $newKode;

        if ($request->hasFile('ktp')) {
            $ktpImageFile = $request->file('ktp');

            // liat ukuran gambar sebelum di kompresi
            $ktpBeforeCompressed = $this->beforeCompression($ktpImageFile);

            // Kompres gambar dan simpan
            $ktpCompressed = $this->compressImage($ktpImageFile, 'ktp');

            $data['ktp'] = $ktpCompressed['filename'];
            $data['ktp_size_asli'] = $ktpBeforeCompressed;
            $data['ktp_size_kompresi'] = $ktpCompressed['sizeKompresi'];
        }

        if ($request->hasFile('stnk')) {
            $stnkImageFile = $request->file('stnk');

            // liat ukuran gambar sebelum di kompresi
            $stnkBeforeCompressed = $this->beforeCompression($stnkImageFile);

            // Kompres gambar dan simpan
            $stnkCompressed = $this->compressImage($stnkImageFile, 'stnk');

            $data['stnk'] = $stnkCompressed['filename'];
            $data['stnk_size_asli'] = $stnkBeforeCompressed;
            $data['stnk_size_kompresi'] = $stnkCompressed['sizeKompresi'];
        }

        if ($request->hasFile('surat_uji_kendaraan')) {
            $suratUjiKendaraanImageFile = $request->file('surat_uji_kendaraan');

            // liat ukuran gambar sebelum di kompresi
            $suratUjiKendaraanBeforeCompressed = $this->beforeCompression($suratUjiKendaraanImageFile);

            // Kompres gambar dan simpan
            $suratUjiKendaraanCompressed = $this->compressImage($suratUjiKendaraanImageFile, 'surat_uji_kendaraan');

            $data['surat_uji_kendaraan'] = $suratUjiKendaraanCompressed['filename'];
            $data['surat_uji_kendaraan_size_asli'] = $suratUjiKendaraanBeforeCompressed;
            $data['surat_uji_kendaraan_size_kompresi'] = $suratUjiKendaraanCompressed['sizeKompresi'];
        }

        Uji::create($data);

        return redirect()->route('daftar-uji.index')->with('success', 'Data berhasil terkirim.');
    }
    
    public function compressImage($image, $folder, $quality = 10)
    {
        // Kompres gambar menggunakan Image Intervention
        $img = Image::make($image)->encode('jpg', $quality);
        $rawData = (string) $img;

        // Kompresi dengan Huffman Encoding
        $huffman = new Huffman();
        $huffman->buildHuffmanTree($rawData);
        $encodedData = $huffman->encode($rawData);

        // Dekompresi data untuk menghasilkan citra JPG
        $decodedData = $huffman->decode($encodedData); // Mengembalikan data ke bentuk asli

        // Simpan citra JPG hasil dekompresi ke dalam folder yang ditentukan
        $filename = time() . '_' . $folder . '.jpg';
        Storage::disk('public')->put("{$folder}/{$filename}", $decodedData);

        // Pastikan file tersimpan sebelum mengambil informasi
        $filePath = "public/{$folder}/{$filename}"; // Path relatif dari storage Laravel
        $fullFilePath = storage_path("app/public/{$folder}/{$filename}"); // Path lengkap untuk `filesize()`

        if (!file_exists($fullFilePath)) {
            throw new \Exception("Error: File hasil kompresi tidak ditemukan di $fullFilePath");
        }

        // Ambil informasi size setelah kompresi
        $sizeKompresi = $this->formatSize(filesize($fullFilePath));// Ukuran dalam KB

        return [
            'filename' => $filename,
            'sizeKompresi' => $sizeKompresi
        ];
    }

    public function beforeCompression($imageFile)
    {
        return $this->formatSize($imageFile->getSize());
    }

    public function formatSize($sizeBytes)
    {
        $sizeKB = $sizeBytes / 1024; // Konversi ke KB

        // Jika lebih dari 1024 KB (1 MB), konversi ke MB
        return ($sizeKB >= 1024) ? round($sizeKB / 1024, 2) . ' MB' : round($sizeKB, 2) . ' KB';
    }
}
