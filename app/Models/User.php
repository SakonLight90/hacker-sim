<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'ip_address',
        'phase',
        'money_clean',
        'money_dirty',
        'crypto_legal',
        'crypto_illegal',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function software()
    {
        return $this->hasMany(Software::class);
    }

    // AdWare piazzati da questo utente
    public function adwarePlanted()
    {
        return $this->hasMany(Adware::class, 'source_user_id');
    }

    // AdWare ricevuti da questo utente
    public function adwareReceived()
    {
        return $this->hasMany(Adware::class, 'target_user_id');
    }
}
