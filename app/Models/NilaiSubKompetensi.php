<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSubKompetensi extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sub_kompetensi_id',
        'mahasiswa_id',
        'dosen_id',
        'nilai',
        'pembimbing_akademik',
        'pembimbing_lapangan',

    ];

        /**
     * Get the comments for the blog post.
     */
    public function sub_kompetensi()
    {
        return $this->belongsTo(SubKompetensi::class);
    }


}
