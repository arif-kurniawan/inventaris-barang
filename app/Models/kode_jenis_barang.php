<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kode_jenis_barang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jenis_barangs(){
        return $this->hasMany(JenisBarang::class, 'kode_jenis', 'kode_jenis' );
    }
}
