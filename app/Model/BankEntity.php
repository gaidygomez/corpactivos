<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankEntity extends Model
{
    use SoftDeletes;

    protected $table = 'bank_entities';
}
