<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Storage;

class NhanVienController extends Controller
{
    public function addNhanVien(Request $request)
    {
        if ($request->has('themmoi')) {
            $data = $request->only(['tennv', 'sodt', 'email', 'diachi', 'vaitro']);
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('/uploaded', 'public');
                $data['image'] = '/' . $path;
            } else {
                $data['image'] = 'uploaded/avatar.png'; // default image nếu không upload
            }
            NhanVien::create($data);
        }
        return redirect()->route('admin.nhanvien');
    }

    public function updateNhanVien(Request $request, $id)
    {
        $nv = NhanVien::findOrFail($id);
        $data = $request->only(['tennv', 'sodt', 'email', 'diachi', 'vaitro']);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('/uploaded', 'public');
            $data['image'] = '/../' . $path;
        }
        $nv->update($data);
        return redirect()->route('admin.nhanvien');
    }

    public function deleteNhanVien($id)
    {
        NhanVien::destroy($id);
        return redirect()->route('admin.nhanvien');
    }

    public function nhanVienList()
    {
        $nhanviens = NhanVien::all();
        return view('admin.nhanvien', compact('nhanviens'));
    }
}
