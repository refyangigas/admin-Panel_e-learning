<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'full_name',
        'password',
        'otp',
        'score'
    ];

    protected $hidden = [
        'password',
        'otp'
    ];

    public function postTestResults()
    {
        return $this->hasMany(PostTestResult::class);
    }

    public function preTestResult()
    {
        return $this->hasOne(PreTestResult::class);
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
}
