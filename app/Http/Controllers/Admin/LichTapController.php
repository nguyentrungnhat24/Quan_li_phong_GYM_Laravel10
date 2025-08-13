<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LichTap;

class LichTapController extends Controller
{
    public function lichTapList() {
        $dslt = LichTap::getAllLichTap();
        return view('admin.lichtap', compact('dslt'));
    }
    public function addLichTap(Request $request) {
        if ($request->has('themmoilichtap')) {
            $data = $request->all();
            LichTap::createLichTap($data);
        }
        return redirect()->route('admin.lichtap');
    }
    public function deleteLichTap($id) {
        LichTap::deleteLichTap($id);
        return redirect()->route('admin.lichtap');
    }
    
    public function updateLichTap(Request $request, $id) {
        $data = $request->all();
        LichTap::updateLichTapById($id, $data);
        return redirect()->route('admin.lichtap');
    }
}
