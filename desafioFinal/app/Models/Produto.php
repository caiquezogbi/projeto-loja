<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'preco',
        'quantidade',
        'categoria',
        'status',
    ];
}
