<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesmen extends MainModel
{
    use HasFactory;

        /**
     * Get Kompetensi Relationship
     */
    public function kompetensis()
    {
        return $this->hasMany(Kompetensi::class);
    }

     /**
     * Get Matakuliah Relationship
     */
    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
}
