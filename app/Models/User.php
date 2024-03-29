<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'username',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function kuesioner()
    {
        return $this->hasOne(kuesioner::class, 'id');
    }
    public function registrasi()
    {
        return $this->belongsTo(Registrasi::class, 'id_registrasi');
    }
    public function pemohon()
    {
        return $this->hasMany(Registrasi::class, 'id');
    }
    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class, 'id');
    }
    public function getId()
    {
        return $this->id;
    }

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
    ];
}
