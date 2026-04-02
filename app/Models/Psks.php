<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psks extends Model
{
    use HasFactory;

    protected $table = 'psks';

    protected $fillable = [
        'jenis_psks',
        'tahun',
        'jumlah',
    ];
}
