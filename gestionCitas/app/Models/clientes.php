<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class clientes extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'telefono'];

    public function citas()
    {
        return $this->hasMany(citas::class);
    }
}
