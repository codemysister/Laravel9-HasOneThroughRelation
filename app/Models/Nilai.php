<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa');
    }

    public function rapor()
    {
        return $this->hasOne('App\Models\Rapor');
    }
}
