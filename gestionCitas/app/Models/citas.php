<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class citas extends Model
{
    use HasFactory;


    protected $fillable = [
        'cliente_id',
        'inicio',
        'fin',
        'notas'
    ];

    protected $dates = ['inicio', 'fin'];

    public function cliente()
    {
        return $this->belongsTo(clientes::class);
    }

    public function trabajadores()
    {
        return $this->belongsToMany(
            trabajadores::class,      // Modelo relacionado
            'cita_trabajador',        // Nombre de la tabla pivote
            'cita_id',                // Foreign key de este modelo en la tabla pivote
            'trabajador_id'           // Foreign key del modelo relacionado en la tabla pivote
        );
    }
}
