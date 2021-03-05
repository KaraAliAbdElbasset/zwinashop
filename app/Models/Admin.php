<?php

namespace App\Models;

use App\Notifications\Admin\AdminResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $fillable = ['name','email','password','role'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
         $this->notify(new AdminResetPasswordNotification($token));
    }
}
