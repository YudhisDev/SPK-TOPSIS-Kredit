<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id');
    }
    public function alternatif()
    {
        return $this->hasMany(Nilai::class, 'id');
    }
}
