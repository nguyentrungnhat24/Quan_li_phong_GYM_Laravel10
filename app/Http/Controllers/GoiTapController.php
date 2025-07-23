<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoiTap;

class GoiTapController extends Controller
{
    public function goiTapList() {
        $dsgt = GoiTap::all();
        return view('admin.goitap', compact('dsgt'));
    }
    public function addGoiTap(Request $request) {
        if ($request->has('themmoi')) {
            $data = $request->all();
            GoiTap::create($data);
        }
        return redirect()->route('admin.goitap');
    }
    public function deleteGoiTap($id) {
        GoiTap::destroy($id);
        return redirect()->route('admin.goitap');
    }
    public function editGoiTap($id) {
        $gtct = GoiTap::findOrFail($id);
        $dsgt = GoiTap::all();
        return view('admin.update_goitap', compact('gtct', 'dsgt'));
    }
    public function updateGoiTap(Request $request, $id) {
        $gt = GoiTap::findOrFail($id);
        $data = $request->all();
        $gt->update($data);
        return redirect()->route('admin.goitap');
    }
}
