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

    public static function getAllLichTap()
    {
        return self::all();
    }

    public static function createLichTap($data)
    {
        return self::create($data);
    }

    public static function deleteLichTap($id)
    {
        return self::destroy($id);
    }

    public static function getLichTapById($id)
    {
        return self::findOrFail($id);
    }

    public static function updateLichTapById($id, $data)
    {
        $lt = self::findOrFail($id);
        return $lt->update($data);
    }
}