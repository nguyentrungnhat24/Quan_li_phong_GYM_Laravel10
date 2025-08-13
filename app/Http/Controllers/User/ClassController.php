<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhMucLopTap;
use App\Models\LichTap;
use App\Models\Comment;

class ClassController extends Controller
{
    public function index()
    {
        $classes = DanhMucLopTap::with('pt')->get();
        return view('user.class', compact('classes'));
    }

    public function show($id)
    {
        $class = DanhMucLopTap::with('pt')->findOrFail($id);
        $lichTaps = LichTap::all();
        $comments = Comment::where('idlt', $id)->orderBy('id', 'desc')->paginate(4);
        
        return view('user.Chitietgoitap', compact('class', 'lichTaps', 'comments'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $classes = DanhMucLopTap::with('pt')
            ->where('tenloptap', 'like', "%{$query}%")
            ->get();

        return view('user.class', compact('classes', 'query'));
    }

    public function addComment(Request $request)
    {
        $request->validate([
            'idlt' => 'required|integer',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'comment' => 'required|string'
        ]);

        $comment = Comment::create([
            'idlt' => $request->idlt,
            'iduser' => auth()->id() ?? 1, // Default to 1 if not logged in
            'name' => $request->name,
            'title' => $request->title,
            'comment' => $request->comment
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'comment' => $comment]);
        }

        return redirect()->back()->with('success', 'Bình luận đã được gửi thành công!');
    }
}
