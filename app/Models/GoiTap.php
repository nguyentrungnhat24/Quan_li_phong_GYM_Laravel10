<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoiTap extends Model
{
    protected $table = 'tb_goitap';
    protected $fillable = [
        'tengt', 'soluong', 'gia', 'ngaybatdau', 'ngayhethan', 'idkh', 'iddmgoitap'
    ];
    public $timestamps = false;
}