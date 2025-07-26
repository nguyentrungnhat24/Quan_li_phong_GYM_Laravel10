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
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'user', 
        'password', 
        'namee', 
        'image', 
        'addresss', 
        'phone_number', 
        'email', 
        'role'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

     // Nếu bạn muốn Laravel dùng cột 'user' để đăng nhập
    public function getAuthIdentifierName()
    {
        return 'user';
    }

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
