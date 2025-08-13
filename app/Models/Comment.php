<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'tb_comment';
    
    protected $fillable = [
        'iduser',
        'idlt', 
        'name',
        'title',
        'comment'
    ];

    public $timestamps = false;

    /**
     * Lớp tập mà bình luận thuộc về
     */
    public function lopTap()
    {
        return $this->belongsTo(DanhMucLopTap::class, 'idlt');
    }

    /**
     * User đã bình luận
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    /**
     * Lấy bình luận theo lớp tập
     */
    public static function getCommentsByLopTap($idlt)
    {
        return self::where('idlt', $idlt)
                   ->orderBy('id', 'desc')
                   ->get();
    }

    /**
     * Tạo bình luận mới
     */
    public static function createComment($data)
    {
        return self::create($data);
    }
}
