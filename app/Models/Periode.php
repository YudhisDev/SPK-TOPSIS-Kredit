<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function pemohon()
    {
        return $this->hasMany(Pemohon::class, 'id');
    }
    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class, 'id');
    }
}
