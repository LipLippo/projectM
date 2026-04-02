<?php

namespace App\Http\Controllers;

use App\Models\DtJateng;
use Illuminate\Http\Request;

class DtJatengController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $query = DtJateng::with('kabupaten');

        if ($search) {
            $query->whereHas('kabupaten', function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            });
        }

        // Urutkan berdasarkan ID kabupaten jika diperlukan atau sesuai di db
        $perPage = (int) $request->input('per_page', 10);
        $dtJateng = $query->paginate($perPage)->appends(request()->query());

        return view('dt-jateng.index', compact('dtJateng', 'search'));
    }
}
