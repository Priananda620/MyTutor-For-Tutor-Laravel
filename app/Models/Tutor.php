<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tutor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;

    protected $table = 'tutors';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'mailing_address',
        'state_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'full_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'mailing_address' => 'string',
        'state_id' => 'integer'
    ];

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function subject(){
        return $this->hasMany(Subject::class);
    }
}
