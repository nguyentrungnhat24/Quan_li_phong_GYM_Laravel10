<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Storage;

class KhachHangController extends Controller
{
    public function khachHangList() {
        $dskh = KhachHang::all();
        return view('admin.khachhang', compact('dskh'));
    }
    public function addKhachHang(Request $request) {
        if ($request->has('themmoikh')) {
            $data = $request->all();
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('admin/uploaded', 'public');
                $data['image'] = 'storage/' . $path;
            }
            KhachHang::create($data);
        }
        return redirect()->route('admin.khachhang');
    }
    public function deleteKhachHang($id) {
        KhachHang::destroy($id);
        return redirect()->route('admin.khachhang');
    }
    public function editKhachHang($id) {
        $khct = KhachHang::findOrFail($id);
        $dskh = KhachHang::all();
        return view('admin.updatekh', compact('khct', 'dskh'));
    }
    public function updateKhachHang(Request $request, $id) {
        $kh = KhachHang::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('admin/uploaded', 'public');
            $data['image'] = 'storage/' . $path;
        }
        $kh->update($data);
        return redirect()->route('admin.khachhang');
    }
}
