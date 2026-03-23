<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table      = 'kecamatan';
    protected $primaryKey = 'id';
    public    $incrementing = false;
    protected $keyType    = 'string';

    protected $fillable = ['id', 'kabupaten_id', 'nama'];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }

    public function desa()
    {
        return $this->hasMany(Desa::class, 'kecamatan_id');
    }
}
