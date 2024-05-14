<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class SubKompetensi extends MainModel
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kompetensi_id',
        'nama_sub_kompetensi',
        'skor_penilaian',
        'uuid'
    ];

    public function setUuidAttribute($value){
        $this->attributes['uuid'] = (Str::isUuid($value) ? $value : Str::uuid()); //
    }
         /**
     * Get asesmen
     */
    public function kompetensi()
    {
        return $this->belongsTo(Kompetensi::class);
    }

}
