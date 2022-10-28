<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'identification',
        'name',
        'email',
        'phone',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setCreate($attributes)
    {
        $data['identification'] = $attributes['identification'];
        $data['name'] = $attributes['name'];
        $data['email'] = $attributes['email'];
        $data['phone'] = $attributes['phone'];

        return $data;
    }
}
