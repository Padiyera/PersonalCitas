<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class trabajadores extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'especialidad', 'color', 'disponibilidad'];

    public function citas()
    {
        return $this->belongsToMany(citas::class);
    }
}
