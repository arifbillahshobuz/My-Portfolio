<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'otp',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    //PROFILE RELATION ONE TO ZERO OR ONE
    public function profile(){
        return $this->hasOne(UserProfile::class);
    }

}
