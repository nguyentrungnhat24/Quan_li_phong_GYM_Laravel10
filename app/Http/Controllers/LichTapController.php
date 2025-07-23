<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LichTap;

class LichTapController extends Controller
{
    public function lichTapList() {
        $dslt = LichTap::all();
        return view('admin.lichtap', compact('dslt'));
    }
    public function addLichTap(Request $request) {
        if ($request->has('themmoilichtap')) {
            $data = $request->all();
            LichTap::create($data);
        }
        return redirect()->route('admin.lichtap');
    }
    public function deleteLichTap($id) {
        LichTap::destroy($id);
        return redirect()->route('admin.lichtap');
    }
    public function editLichTap($id) {
        $ltct = LichTap::findOrFail($id);
        $dslt = LichTap::all();
        return view('admin.updatelichtap', compact('ltct', 'dslt'));
    }
    public function updateLichTap(Request $request, $id) {
        $lt = LichTap::findOrFail($id);
        $data = $request->all();
        $lt->update($data);
        return redirect()->route('admin.lichtap');
    }
}
