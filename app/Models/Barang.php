<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ruang(){
        return $this->belongsTo(Ruang::class);
    }

    public function jenisbarang(){
        return $this->belongsTo(JenisBarang::class);
    }
}
