<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RateOfChange extends Model
{
    protected $fillable = [
        'dolar_peso', 'dolar_bs', 'peso_bs'
    ];
}
