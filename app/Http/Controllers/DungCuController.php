<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DungCu;

class DungCuController extends Controller
{
    public function dungCuList() {
        $dsdc = DungCu::all();
        return view('admin.dungcu', compact('dsdc'));
    }
    public function addDungCu(Request $request) {
        if ($request->has('themmoi')) {
            $data = $request->all();
            DungCu::create($data);
        }
        return redirect()->route('admin.dungcu');
    }
    public function deleteDungCu($id) {
        DungCu::destroy($id);
        return redirect()->route('admin.dungcu');
    }
    public function editDungCu($id) {
        $dcct = DungCu::findOrFail($id);
        $dsdc = DungCu::all();
        return view('admin.updatedc', compact('dcct', 'dsdc'));
    }
    public function updateDungCu(Request $request, $id) {
        $dc = DungCu::findOrFail($id);
        $data = $request->all();
        $dc->update($data);
        return redirect()->route('admin.dungcu');
    }
}
