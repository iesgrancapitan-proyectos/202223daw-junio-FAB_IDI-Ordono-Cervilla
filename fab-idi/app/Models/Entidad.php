<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Entidad extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'entidades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'representante',
        'colaborador_id',
        'telefono',
        'email',
        'web',
        'imagen',
        'activo',
    ];
}
