<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichTap extends Model
{
    protected $table = 'tb_lichtap';
    protected $fillable = [
        'Ten', 'BatDau', 'KetThuc', 'NgayTap', 'phongtap', 'idloptap'
    ];
    public $timestamps = false;
}