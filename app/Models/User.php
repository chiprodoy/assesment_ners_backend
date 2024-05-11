<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nidn_npm',
        'telepon',
        'email',
        'password',
        'uuid'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    /**
     * set uuid
     */
    public function setUuidAttribute($value){
        $this->attributes['uuid'] = (Str::isUuid($value) ? $value : Str::uuid()); //
    }

    /**
     * Get the comments for the blog post.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

        /**
     * Get the comments for the blog post.
     */
    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }

            /**
     * Get the comments for the blog post.
     */
    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }
}
