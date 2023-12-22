<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'jenis_kelamin', 'no_telpon', 'alamat', 'no_rm', 'tanggal_masuk',
    ];

    public function pemeriksaans()
    {
        return $this->belongsToMany(Pemeriksaan ::class, 'pasien_pemeriksaan', 'pasiens_id', 'pemeriksaans_id')->withPivot('result');
    }

    public function samples()
    {
        return $this->hasMany(Sample::class, 'pasiens_id', 'id');
    }
}
