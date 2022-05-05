<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public function nilai()
    {
        return $this->hasOne('App\Models\Nilai');
    }

    public function rapor()
    {
        return $this->hasOneThrough('App\Models\Rapor', 'App\Models\Nilai');
    }
}
