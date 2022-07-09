<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacoes extends Model
{
    use HasFactory;


    public $timestamps = false;

    
       protected $fillable = [
        'id',
        'Tipo_Movimentacao',
        'Data_Inicio',
        'Data_Fim',
        'Conteiner',
    ];
}
