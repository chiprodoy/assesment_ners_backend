<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Kompetensi extends MainModel
{
    use HasFactory;
          /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'asesmen_id',
        'nama_kompetensi',
        'persentase',
        'uuid'
    ];

    public function setUuidAttribute($value){
        $this->attributes['uuid'] = (Str::isUuid($value) ? $value : Str::uuid()); //
    }

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
     /**
     * Get subkompetensi
     */
    public function sub_kompetensi()
    {
        return $this->hasMany(SubKompetensi::class);

    }
}

class GroupKompetensi
{
    const KOGNITIF = 'kognitif';
    const PSIKOMOTORIK = 'psikomotorik';
    const AFEKTIF = 'afektif';
    const SOCIAL_INTERACTION = 'social interaction';


}
