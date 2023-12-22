<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];

    public function pasiens()
    {
        return $this->belongsTo(Pasien::class);
    }
}
