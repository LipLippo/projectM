<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    protected $primaryKey = 'id';

    public $incrementing = false; // ini boleh karena ID bukan auto increment
    protected $keyType = 'int';   // 🔥 FIX DI SINI (bukan string)

    protected $fillable = ['id', 'nama'];

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'kabupaten_id');
    }
}