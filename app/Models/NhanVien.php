<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class NhanVien extends Model
{
    protected $table = 'tb_nhanvien';
    protected $fillable = [
        'tennv', 'image', 'sodt', 'email', 'diachi', 'vaitro'
    ];
    public $timestamps = false;

    // Validation rules
    public static $rules = [
        'tennv' => 'required|string|max:255',
        'sodt' => 'required|string|max:20',
        'email' => 'required|email|unique:tb_nhanvien,email',
        'diachi' => 'required|string|max:500',
        'vaitro' => 'required|string|max:100',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ];

    // Xử lý upload ảnh
    public static function handleImageUpload($request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalName = $file->getClientOriginalName();

            // Tạo thư mục nếu chưa tồn tại
            $uploadPath = public_path('admin/uploaded');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Lưu file trực tiếp vào public/admin/uploaded
            $file->move($uploadPath, $originalName);
            return '/admin/uploaded/' . $originalName;
        }
        return 'admin/uploaded/avatar.png'; // default image
    }

    // Xử lý upload ảnh cho update (giữ tên gốc, cho phép ghi đè)
    public function handleImageUploadForUpdate($request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalName = $file->getClientOriginalName();

            // Tạo thư mục nếu chưa tồn tại
            $uploadPath = public_path('admin/uploaded');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Lưu file trực tiếp vào public/admin/uploaded
            $file->move($uploadPath, $originalName);
            return '/admin/uploaded/' . $originalName;
        }
        return null; // Không thay đổi ảnh
    }

    // Tạo nhân viên mới với logic business
    public static function createNhanVien($request)
    {
        $data = $request->only(['tennv', 'sodt', 'email', 'diachi', 'vaitro']);
        $data['image'] = self::handleImageUpload($request);
        
        return self::create($data);
    }

    // Cập nhật nhân viên với logic business
    public function updateNhanVien($request)
    {
        $data = $request->only(['tennv', 'sodt', 'email', 'diachi', 'vaitro']);
        
        // Xử lý upload ảnh mới
        $newImagePath = $this->handleImageUploadForUpdate($request);
        if ($newImagePath) {
            $data['image'] = $newImagePath;
        }
        
        return $this->update($data);
    }

    // Scope để lọc theo vai trò
    public function scopeByVaiTro($query, $vaitro)
    {
        return $query->where('vaitro', $vaitro);
    }

    // Accessor để format số điện thoại
    public function getFormattedPhoneAttribute()
    {
        return preg_replace('/(\d{4})(\d{3})(\d{3})/', '$1 $2 $3', $this->sodt);
    }

    // Mutator để format email
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower(trim($value));
    }
}