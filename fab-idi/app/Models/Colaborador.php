<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class Colaborador extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'colaboradores';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tipoColaborador',
        'user_id',
    ];

}
