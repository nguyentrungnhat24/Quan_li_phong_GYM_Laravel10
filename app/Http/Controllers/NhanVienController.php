<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Validator;

class NhanVienController extends Controller
{
    public function addNhanVien(Request $request)
    {
        if ($request->has('themmoi')) {
            // Validation
            $validator = Validator::make($request->all(), NhanVien::$rules);
            
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            
            // Sử dụng logic từ model
            NhanVien::createNhanVien($request);
        }
        return redirect()->route('admin.nhanvien');
    }

    public function updateNhanVien(Request $request, $id)
    {
        $nv = NhanVien::findOrFail($id);
        
        // Validation (loại trừ email hiện tại)
        $rules = NhanVien::$rules;
        $rules['email'] = 'required|email|unique:tb_nhanvien,email,' . $id;
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        // Sử dụng logic từ model
        $nv->updateNhanVien($request);
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

    // Thêm method để lọc theo vai trò
    public function nhanVienByVaiTro($vaitro)
    {
        $nhanviens = NhanVien::byVaiTro($vaitro)->get();
        return view('admin.nhanvien', compact('nhanviens'));
    }
}
