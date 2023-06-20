<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';

    protected $fillable = [
        'nombre',
        'autor',
        'centro',
        'curso_academico_id',
        'tipo_proyecto_id',
        'descripcion',
        'destacado',
        'disponible',
        'url',
        'imagen',
        'activo',
    ];

    public function scopeDestacados($query)
    {
        return $query->where('destacado', true);
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }
}
?>