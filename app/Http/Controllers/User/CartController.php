<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GoiTap;

class CartController extends Controller
{
    public function index()
    {
        return view('user.cart');
    }

    public function add(Request $request)
    {
        $goiTapId = $request->input('goi_tap_id');
        $goiTap = GoiTap::findOrFail($goiTapId);
        
        // Thêm vào session cart
        if (!session()->has('cart')) {
            session(['cart' => []]);
        }
        
        $cart = session('cart');
        $cart[$goiTapId] = [
            'id' => $goiTap->id,
            'name' => $goiTap->tengoitap,
            'price' => $goiTap->gia,
            'time' => $goiTap->thoigian
        ];
        
        session(['cart' => $cart]);
        
        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function remove($id)
    {
        $cart = session('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart]);
        
        return redirect()->back()->with('success', 'Đã xóa khỏi giỏ hàng!');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Đã xóa giỏ hàng!');
    }

    public function updateQuantity(Request $request, $id)
    {
        $quantity = $request->input('quantity', 1);
        $cart = session('cart', []);
        
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, $quantity);
            session(['cart' => $cart]);
        }
        
        return redirect()->back()->with('success', 'Cập nhật số lượng thành công!');
    }
}
