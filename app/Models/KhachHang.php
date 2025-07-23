<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'user';
    protected $fillable = [
        'tenkh', 'image', 'sodt', 'email', 'diachi'
    ];
    public $timestamps = false;
}