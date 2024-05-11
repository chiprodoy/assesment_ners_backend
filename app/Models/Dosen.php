<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dosen extends Model
{
    use HasFactory;
          /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'nidn',
        'user_id',
    ];

         /**
     * Get user Relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
