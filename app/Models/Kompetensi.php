<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetensi extends MainModel
{
    use HasFactory;

    /**
     * Get sub kompetensi
     */
    public function subkompetensis()
    {
        return $this->hasMany(SubKompetensi::class);
    }
}
