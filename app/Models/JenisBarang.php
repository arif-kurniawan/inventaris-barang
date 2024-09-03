<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function barang(){
        return $this->hasMany(Barang::class);
    }

    public function kode_jenis(){
        return $this->belongsTo(kode_jenis_barang::class, 'kode_jenis', 'kode_jenis');
    }
}
