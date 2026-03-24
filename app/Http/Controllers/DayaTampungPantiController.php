<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panti;

class DayaTampungPantiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $perPage = 10;

        $panti = Panti::when($search, function ($q) use ($search) {
                $q->where('nama_panti', 'like', "%{$search}%")
                  ->orWhere('kabupaten', 'like', "%{$search}%");
            })
            ->orderBy('id')
            ->paginate($perPage)
            ->withQueryString();

        return view('daya-tampung-panti', compact('panti', 'search'));
    }
}