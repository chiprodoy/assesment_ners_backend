<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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

     /**
     * Get asesmen
     */
    public function asesmen()
    {
        return $this->belongsTo(Asesmen::class);
    }
}
