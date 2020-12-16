<?php

namespace App\Model;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Twilio\Rest\Client;

class Token extends Model
{

    const EXPIRATION_TIME = 20; // minutes

    protected $fillable = [
        'code', 'user_id', 'used'
    ];

    public function __construct(array $attributes = [])
    {
        if (! isset($attributes['code'])) {
            $attributes['code'] = $this->generateCode();
        }

        parent::__construct($attributes);
    }

    /**
     * Generate a six digits code
     *
     * @param int $codeLength
     * @return int
     */
    public function generateCode()
    {
        return rand(100000, 999999);
    }

    /**
     * Evaluate if the code is valid
     *
     * @return boolean
     */
    public function isValid()
    {
        return ! $this->isUsed() && ! $this->isExpired();
    }


    /**
     * Return value used
     *
     * @return boolean
     */
    public function isUsed()
    {
        return $this->used;
    }

    /**
     * Return if code is expired
     *
     * @return boolean
     */
    public function isExpired()
    {
        
        return $this->created_at->diffInMinutes(Carbon::now()) > self::EXPIRATION_TIME;   
    }

    /**
     * Sending function Code
     *
     * @return boolean
     */
    public function sendCode()
    {
        if (! $this->user) {
            throw new Exception("No user attached to this token.");
        }

        if (! $this->code) {
            $this->code = $this->generateCode();
        }

        try {
            
            $twilio = new Client(config('services.twilio.account_sid'), config('services.twilio.auth_token'));
            
            $twilio->messages->create(
                $this->user->getPhoneNumber(),
                [
                    'from' => config('services.twilio.phone'),
                    'body' => "Your verification code is {$this->code}"
                ]);

                
            } catch (Exception $ex) {
                return false; //enable to send SMS
            }
        
        return true;
    }

    /**
     * Relacion con la tabla Usuarios
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
