<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;

class BerandaController extends Controller
{
    /**
     * Tampilkan halaman beranda.
     */
    public function index()
    {
        $kabupaten = Kabupaten::orderBy('nama')->get();

        return view('beranda', compact('kabupaten'));
    }

    /**
     * Proses cek kepesertaan berdasarkan NIK.
     */
    public function cekKepesertaan(Request $request)
    {
        $request->validate([
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa'      => 'required',
            'nik'       => 'required|digits:16',
        ]);

        // TODO: Sesuaikan logika pencarian dengan tabel / model di project kamu
        // Contoh:
        // $warga = Warga::where('nik', $request->nik)
        //               ->where('desa_id', $request->desa)
        //               ->first();
        //
        // $hasil = $warga
        //     ? "NIK {$request->nik} terdaftar sebagai penerima bantuan."
        //     : "NIK {$request->nik} tidak ditemukan dalam data.";

        $hasil = "Fitur pencarian sedang dalam pengembangan.";

        $kabupaten = Kabupaten::orderBy('nama')->get();

        return view('beranda', compact('kabupaten', 'hasil'));
    }

    /**
     * Proses cek status afirmasi SPMB 2026.
     */
    public function cekSpmb(Request $request)
    {
        $request->validate([
            'kabupaten_spmb' => 'required',
            'nik_spmb'       => 'required|digits:16',
        ]);

        // TODO: Sesuaikan logika pencarian SPMB dengan model yang ada
        $hasil = "Fitur cek SPMB sedang dalam pengembangan.";

        $kabupaten = Kabupaten::orderBy('nama')->get();

        return view('beranda', compact('kabupaten', 'hasil'));
    }

    /**
     * API: Ambil daftar kecamatan berdasarkan kabupaten_id.
     */
    public function getKecamatan($kabupatenId)
    {
        $kecamatan = Kecamatan::where('kabupaten_id', $kabupatenId)
            ->orderBy('nama')
            ->get(['id', 'nama']);

        return response()->json($kecamatan);
    }

    /**
     * API: Ambil daftar desa/kelurahan berdasarkan kecamatan_id.
     */
    public function getDesa($kecamatanId)
    {
        $desa = Desa::where('kecamatan_id', $kecamatanId)
            ->orderBy('nama')
            ->get(['id', 'nama']);

        return response()->json($desa);
    }
}
