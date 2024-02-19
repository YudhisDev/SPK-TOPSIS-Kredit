<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pinjaman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }
    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
