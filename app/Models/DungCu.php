<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DungCu extends Model
{
    protected $table = 'tb_dungcu';
    protected $fillable = [
        'tendc', 'image', 'gia', 'tinhtrang', 'soluong', 'iddmdc'
    ];
    public $timestamps = false;
}