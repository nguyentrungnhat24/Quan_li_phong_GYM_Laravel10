<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoiTap extends Model
{
    protected $table = 'tb_goitap';
    protected $fillable = [
        'tenloptap', 'gia', 'soluong', 'thoigian', 'iddmlt', 'idkh', 'tenkh', 'diachi', 'sdt', 'email', 'dangki', 'thoihan', 'state'
    ];
    public $timestamps = false;

    public static function getAllGoiTap()
    {
        return self::all();
    }

    public static function createGoiTap($data)
    {
        return self::create($data);
    }

    public static function deleteGoiTap($id)
    {
        return self::destroy($id);
    }

    public static function getGoiTapById($id)
    {
        return self::findOrFail($id);
    }

    public static function updateGoiTapById($id, $data)
    {
        $gt = self::findOrFail($id);
        return $gt->update($data);
    }
}