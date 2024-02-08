<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesmen extends MainModel
{
    use HasFactory;

        /**
     * Get Assesmen
     */
    public function kompetensis()
    {
        return $this->hasMany(Kompetensi::class);
    }
}
