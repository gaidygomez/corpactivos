<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'email', 'password', 'username', 'phone', 'ci', 'sname', 'lname', 'lsname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     *  Función para comprobar si en el campo Rol el valor es 0 y por lo tanto Administrador 
    */
    public function getIsAdminAttribute()
    {
        return $this->role == 0;
    }

    /*
     *  Función para comprobar si en el campo Rol el valor es 1 y por lo tanto Usuario 
    */
    public function getIsUserAttribute()
    {
        return $this->role == 1;
    }

    /**
     * User tokens relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    /**
     * Return the country code and phone number
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone;
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
    
    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
}
