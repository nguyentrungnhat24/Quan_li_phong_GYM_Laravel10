<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMucDungCu extends Model
{
    protected $table = 'tb_danhmucdungcu';
    protected $fillable = [
        'tendmdc'
    ];
    public $timestamps = false;
}