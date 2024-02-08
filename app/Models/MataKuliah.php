<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends MainModel
{
    use HasFactory;

    /**
     * Get Assesmen
     */
    public function asesmens()
    {
        return $this->hasMany(Asesmen::class);
    }
}
