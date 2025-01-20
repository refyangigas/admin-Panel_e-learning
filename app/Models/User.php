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

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function preTests()
    {
        return $this->hasMany(TestResult::class)->where('test_type', 'pre_test');
    }

    public function postTests()
    {
        return $this->hasMany(TestResult::class)->where('test_type', 'post_test');
    }
}
