<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaans';
    protected $fillable = [
        'type', 'satuan', 'rujukan',
    ];

    public function pasiens()
    {
        return $this->belongsToMany(Pasien::class, 'pasien_pemeriksaan', 'pemeriksaans_id', 'pasiens_id');
    }

}
