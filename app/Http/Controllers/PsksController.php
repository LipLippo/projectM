<?php

namespace App\Http\Controllers;

use App\Models\Psks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PsksController extends Controller
{
    public function index(Request $request)
    {
        // ── Tahun yang tersedia ─────────────────────────────────────────
        $tahunList = Psks::select('tahun')
            ->distinct()
            ->orderBy('tahun')
            ->pluck('tahun');

        $tahunKolom = $tahunList->toArray();

        // ── Chart: total PSKS per tahun (semua jenis digabung) ──────────
        $chartData = Psks::select('tahun', DB::raw('SUM(jumlah) as total'))
            ->groupBy('tahun')
            ->orderBy('tahun')
            ->get();

        // ── Tabel: Rekap per Jenis PSKS ─────────────────────────────────
        $searchJenis = $request->input('search', '');

        $jenisQuery = Psks::select('jenis_psks', 'tahun', DB::raw('SUM(jumlah) as total'))
            ->groupBy('jenis_psks', 'tahun');

        if ($searchJenis) {
            $jenisQuery->where('jenis_psks', 'like', "%{$searchJenis}%");
        }

        $rekapJenisRaw = $jenisQuery->get();

        // Bangun pivot: jenis => [tahun => jumlah]
        $jenisMap = [];
        foreach ($rekapJenisRaw as $row) {
            $j = $row->jenis_psks;
            if (!isset($jenisMap[$j])) {
                $jenisMap[$j] = ['nama' => $j, 'data' => []];
            }
            $jenisMap[$j]['data'][$row->tahun] = $row->total;
        }

        // Pagination manual
        $perPage         = (int) $request->input('per_page', 10);
        $page            = (int) $request->input('page', 1);
        $jenisCollection = collect(array_values($jenisMap));
        $total           = $jenisCollection->count();
        $rekapJenis      = $jenisCollection->forPage($page, $perPage)->values();

        return view('psks.index', compact(
            'tahunKolom',
            'chartData',
            'rekapJenis',
            'total',
            'page',
            'perPage',
            'searchJenis',
        ));
    }
}
