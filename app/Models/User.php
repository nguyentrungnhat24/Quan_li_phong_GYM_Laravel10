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

    // Mutator để hash password khi lưu vào database
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // Accessor để lấy password field cho authentication
    public function getAuthPassword()
    {
        return $this->password;
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

    // Lấy tất cả user
    public static function getAllUsers() {
        return self::all();
    }

    // Tạo user mới, xử lý upload ảnh nếu có
    public static function createUser($data) {
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            $path = $data['image']->store('admin/uploaded', 'public');
            $data['image'] = 'storage/' . $path;
        }
        return self::create($data);
    }

    // Cập nhật user
    public static function updateUser($id, $data) {
        $user = self::findOrFail($id);
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            $path = $data['image']->store('admin/uploaded', 'public');
            $data['image'] = 'storage/' . $path;
        }
        $user->update($data);
        return $user;
    }

    // Xóa user
    public static function deleteUser($id) {
        return self::destroy($id);
    }

    // Lấy user theo id
    public static function getUserById($id) {
        return self::findOrFail($id);
    }
}
