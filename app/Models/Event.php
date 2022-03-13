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

    //Para realizar o update dos dados ao banco
    protected $guarded = []; //tudo o que for enviado pelo post pode ser atualizado, sem nenhuma restrição

    //Informar que o usuário, dono do evento, vai retornar tudo o que pertence apenas a ele.
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
}
