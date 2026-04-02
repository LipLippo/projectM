<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DtJateng extends Model
{
    use HasFactory;

    protected $table = 'dt_jateng';

    protected $fillable = [
        'kabupaten_id',
        'rtlh',
        'rtlh_p1',
        'rtlh_p2',
        'listrik',
        'air',
        'jamban',
        'ats',
        'tidak_bekerja',
        'pct_art',
    ];

    protected $casts = [
        'pct_art' => 'float',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
}
