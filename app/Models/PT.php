<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PT extends Model
{
    protected $table = 'tb_pt';
    protected $fillable = [
        'tenpt', 'image', 'sodt', 'email', 'vaitro', 'quandiem'
    ];
    public $timestamps = false;
}