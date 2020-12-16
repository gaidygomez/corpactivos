<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
