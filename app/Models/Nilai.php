<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
    public function alternatif()
    {
        return $this->hasMany(Alternatif::class, 'id');
    }
}
