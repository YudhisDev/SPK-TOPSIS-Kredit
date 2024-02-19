<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function alternatif()
    {
        return $this->hasMany(Alternatif::class, 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class, 'id');
    }
    public function hasil()
    {
        return $this->hasOne(Hasil::class, 'id');
    }
}
