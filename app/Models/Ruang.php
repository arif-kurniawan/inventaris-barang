<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function barang(){
        return $this->hasMany(Barang::class);
    }

    public function gedung(){
        return $this->belongsTo(Gedung::class);
    }
}
