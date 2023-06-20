<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    use HasFactory;

    protected $table = 'premios';

    protected $fillable = [
        'titulo',
        'fecha',
        'url',
        'descripcion',
        'imagen',
        'destacado',
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