<?php

namespace App\Http\Controllers;

use App\Models\Ppks;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PpksController extends Controller
{
    public function index(Request $request)
    {
        // ── Tahun yang tersedia ──────────────────────────────────────────
        $tahunList = Ppks::select('tahun')->distinct()->orderBy('tahun')->pluck('tahun');

        // ── Chart: total PPKS per tahun (semua kab/kota digabung) ────────
        $chartData = Ppks::select('tahun', DB::raw('SUM(jumlah) as total'))
            ->groupBy('tahun')
            ->orderBy('tahun')
            ->get();

        // ── Tabel 1: Rekap per Kabupaten/Kota ────────────────────────────
        // Pivot: setiap kolom = 1 tahun
        $tahunKolom = $tahunList->toArray();

        $rekapKabQuery = Ppks::select(
                'kabupaten_id',
                'tahun',
                DB::raw('SUM(jumlah) as total')
            )
            ->groupBy('kabupaten_id', 'tahun')
            ->with('kabupaten');

        // Filter search kabupaten
        $searchKab = $request->input('search_kab', '');
        if ($searchKab) {
            $rekapKabQuery->whereHas('kabupaten', function ($q) use ($searchKab) {
                $q->where('nama', 'like', "%{$searchKab}%");
            });
        }

        $rekapKabRaw = $rekapKabQuery->get();

        // Susun pivot
        $kabMap = [];
        foreach ($rekapKabRaw as $row) {
            $id   = $row->kabupaten_id;
            $nama = optional($row->kabupaten)->nama ?? 'Tidak Diketahui';
            if (!isset($kabMap[$id])) {
                $kabMap[$id] = ['nama' => $nama, 'data' => []];
            }
            $kabMap[$id]['data'][$row->tahun] = $row->total;
        }

        // Pagination manual sederhana
        $perPage      = (int) $request->input('per_page_kab', 10);
        $pageKab      = (int) $request->input('page_kab', 1);
        $kabCollection = collect(array_values($kabMap));
        $totalKab      = $kabCollection->count();
        $rekapKab      = $kabCollection->forPage($pageKab, $perPage)->values();

        // ── Tabel 2: Rekap per Jenis PPKS ────────────────────────────────
        $searchJenis = $request->input('search_jenis', '');
        $jenisQuery  = Ppks::select('jenis_ppks', 'tahun', DB::raw('SUM(jumlah) as total'))
            ->groupBy('jenis_ppks', 'tahun');

        if ($searchJenis) {
            $jenisQuery->where('jenis_ppks', 'like', "%{$searchJenis}%");
        }

        $rekapJenisRaw = $jenisQuery->get();

        $jenisMap = [];
        foreach ($rekapJenisRaw as $row) {
            $j = $row->jenis_ppks;
            if (!isset($jenisMap[$j])) {
                $jenisMap[$j] = ['nama' => $j, 'data' => []];
            }
            $jenisMap[$j]['data'][$row->tahun] = $row->total;
        }

        $perPageJenis  = (int) $request->input('per_page_jenis', 10);
        $pageJenis     = (int) $request->input('page_jenis', 1);
        $jenisCollection = collect(array_values($jenisMap));
        $totalJenis      = $jenisCollection->count();
        $rekapJenis      = $jenisCollection->forPage($pageJenis, $perPageJenis)->values();

        return view('ppks.index', compact(
            'tahunList',
            'tahunKolom',
            'chartData',
            'rekapKab',
            'totalKab',
            'pageKab',
            'perPage',
            'searchKab',
            'rekapJenis',
            'totalJenis',
            'pageJenis',
            'perPageJenis',
            'searchJenis',
        ));
    }
}