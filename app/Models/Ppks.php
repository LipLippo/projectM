<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppks extends Model
{
    use HasFactory;

    protected $table = 'ppks';

    protected $fillable = [
        'kabupaten_id',
        'jenis_ppks',
        'tahun',
        'jumlah',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
}