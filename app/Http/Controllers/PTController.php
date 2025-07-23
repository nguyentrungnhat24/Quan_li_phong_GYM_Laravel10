<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PT;
use Illuminate\Support\Facades\Storage;

class PTController extends Controller
{
    public function ptList() {
        $dspt = PT::all();
        return view('admin.pt', compact('dspt'));
    }
    public function addPT(Request $request) {
        if ($request->has('themmoi')) {
            $data = $request->all();
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('admin/uploaded', 'public');
                $data['image'] = 'storage/' . $path;
            }
            PT::create($data);
        }
        return redirect()->route('admin.pt');
    }
    public function deletePT($id) {
        PT::destroy($id);
        return redirect()->route('admin.pt');
    }
    public function editPT($id) {
        $ptct = PT::findOrFail($id);
        $dspt = PT::all();
        return view('admin.updatept', compact('ptct', 'dspt'));
    }
    public function updatePT(Request $request, $id) {
        $pt = PT::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('admin/uploaded', 'public');
            $data['image'] = 'storage/' . $path;
        }
        $pt->update($data);
        return redirect()->route('admin.pt');
    }
}
