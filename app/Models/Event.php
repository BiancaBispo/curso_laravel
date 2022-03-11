<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    //Informando para o Laravel que a coluna items é um array
    protected $casts = [
        'items' => 'array'
    ];

    //Informando para o event que esse campo é de data
    protected $dates = ['date'];
    
}
