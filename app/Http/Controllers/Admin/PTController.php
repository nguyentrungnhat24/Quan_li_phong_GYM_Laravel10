<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PT;

class PTController extends Controller
{
    public function ptList() {
        $dspt = PT::getAllPT();
        return view('admin.pt', compact('dspt'));
    }
    
    public function addPT(Request $request) {
        if ($request->has('themmoi')) {
            PT::createPT($request);
        }
        return redirect()->route('admin.pt');
    }
    
    public function deletePT($id) {
        PT::deletePTById($id);
        return redirect()->route('admin.pt');
    }
    
    public function editPT($id) {
        $ptct = PT::getPTById($id);
        $dspt = PT::getAllPT();
        return view('admin.updatept', compact('ptct', 'dspt'));
    }
    
    public function updatePT(Request $request, $id) {
        PT::updatePTById($request, $id);
        return redirect()->route('admin.pt');
    }

    public function exportPT() {
        return PT::exportPT();
    }
}
