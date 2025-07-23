<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'tb_nhanvien';
    protected $fillable = [
        'tennv', 'image', 'sodt', 'email', 'diachi', 'vaitro'
    ];
    public $timestamps = false;
}