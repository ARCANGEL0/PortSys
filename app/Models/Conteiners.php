<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conteiners extends Model
{
    use HasFactory;

     protected $fillable = [
        'id',
        'Cliente',
        'Conteiner',
        'Tipo',
        'Status',
        'Categoria',
    ];
}
