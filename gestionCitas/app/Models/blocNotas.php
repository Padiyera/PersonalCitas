<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class blocNotas extends Model
{
    use HasFactory;

    protected $table = 'bloc_notas';

    protected $fillable = ['fecha', 'contenido'];

    protected $casts = [
        'fecha' => 'date',
    ];

    protected static function booted()
    {
        static::creating(function ($nota) {
            $nota->fecha = now()->toDateString();
        });
    }
}
