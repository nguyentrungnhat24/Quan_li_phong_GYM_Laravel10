<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMucLopTap extends Model
{
    protected $table = 'tb_danhmucloptap';
    protected $fillable = [
        'tenloptap', 'gia', 'thoigian', 'idpt'
    ];
    public $timestamps = false;
}