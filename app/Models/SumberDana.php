<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberDana extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jenis_barang(){
        return $this->hasMany(JenisBarang::class);
    }
}
