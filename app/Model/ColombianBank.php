<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColombianBank extends Model
{
    use SoftDeletes;
    
    protected $table = 'colombian_banks';

    protected $fillable = [
        'name',
        'description',
        'balance',
        'type',
        'acronym',
        'ban'
    ];
}
