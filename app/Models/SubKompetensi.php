<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKompetensi extends MainModel
{
    use HasFactory;

         /**
     * Get asesmen
     */
    public function kompetensi()
    {
        return $this->belongsTo(Kompetensi::class);
    }
}
