<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoiTap;

class GoiTapController extends Controller
{
    public function index() {
        $dsgoitap = GoiTap::getAllGoiTap();
        return view('admin.goitap', compact('dsgoitap'));
    }

    public function store(Request $request) {
        if ($request->has('themmoigoitap')) {
            $data = $request->all();
            GoiTap::createGoiTap($data);
        }
        return redirect()->route('admin.goitap');
    }

    public function destroy($id) {
        GoiTap::deleteGoiTap($id);
        return redirect()->route('admin.goitap');
    }


    public function update(Request $request, $id) {
        $data = $request->all();
        GoiTap::updateGoiTapById($id, $data);
        return redirect()->route('admin.goitap');
    }
}
