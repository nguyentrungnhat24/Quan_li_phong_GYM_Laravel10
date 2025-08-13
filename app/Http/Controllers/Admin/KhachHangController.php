<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class KhachHangController extends Controller
{
    public function khachHangList() {
        $dskh = User::getAllUsers('role_id', 3);
        return view('admin.khachhang', compact('dskh'));
    }
    public function addKhachHang(Request $request) {
        if ($request->has('themmoikh')) {
            $data = $request->all();
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image');
            }
            User::createUser($data);
        }
        return redirect()->route('admin.khachhang');
    }
    public function deleteKhachHang($id) {
        User::deleteUser($id);
        return redirect()->route('admin.khachhang');
    }
    public function editKhachHang($id) {
        $khct = User::getUserById($id);
        $dskh = User::getAllUsers();
        return view('admin.updatekh', compact('khct', 'dskh'));
    }
    public function updateKhachHang(Request $request, $id) {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }
        User::updateUser($id, $data);
        return redirect()->route('admin.khachhang');
    }
}
