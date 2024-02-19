<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    // protected $primaryKey = 'id';

    protected $fillable = ['id_pemohon', 'id_periode', 'nilai', 'created_at', 'updated_at'];

    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon');
    }
}
