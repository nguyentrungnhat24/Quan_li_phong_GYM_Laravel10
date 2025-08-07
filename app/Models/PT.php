<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PT extends Model
{
    protected $table = 'tb_pt';
    protected $fillable = [
        'tenpt', 'image', 'sodt', 'email', 'vaitro', 'quandiem'
    ];
    public $timestamps = false;

    /**
     * Lấy danh sách tất cả PT
     */
    public static function getAllPT()
    {
        return self::all();
    }

    /**
     * Tạo PT mới
     */
    public static function createPT(Request $request)
    {
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('admin/uploaded', 'public');
            $data['image'] = 'storage/' . $path;
        }
        
        return self::create($data);
    }

    /**
     * Xóa PT theo ID
     */
    public static function deletePTById($id)
    {
        return self::destroy($id);
    }

    /**
     * Lấy PT theo ID
     */
    public static function getPTById($id)
    {
        return self::findOrFail($id);
    }

    /**
     * Cập nhật PT
     */
    public static function updatePTById(Request $request, $id)
    {
        $pt = self::findOrFail($id);
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('admin/uploaded', 'public');
            $data['image'] = 'storage/' . $path;
        }
        
        return $pt->update($data);
    }

    /**
     * Xuất dữ liệu PT ra file CSV
     */
    public static function exportPT()
    {
        $pts = self::getAllPT();
        
        $filename = 'danh_sach_pt_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($pts) {
            $file = fopen('php://output', 'w');
            
            // UTF-8 BOM để Excel hiển thị tiếng Việt đúng
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Header
            fputcsv($file, [
                'ID',
                'Tên PT',
                'Số điện thoại', 
                'Email',
                'Vai trò',
                'Quan điểm',
                'Hình ảnh'
            ]);
            
            // Data
            foreach ($pts as $pt) {
                fputcsv($file, [
                    $pt->id,
                    $pt->tenpt,
                    $pt->sodt,
                    $pt->email,
                    $pt->vaitro,
                    $pt->quandiem,
                    $pt->image
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}