<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Lấy danh sách đơn hàng của user
        // $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        
        return view('user.orders');
    }

    public function show($id)
    {
        // $order = Order::where('user_id', Auth::id())->findOrFail($id);
        // return view('user.order-detail', compact('order'));
        
        return view('user.order-detail');
    }

    public function checkout(Request $request)
    {
        $selected = $request->input('selected_items', []);
        $cart = session('cart', []);
        $checkoutCart = [];

        foreach ($selected as $id) {
            if (isset($cart[$id])) {
                $checkoutCart[$id] = $cart[$id];
            }
        }

        session(['checkout_cart' => $checkoutCart]);

        return redirect()->route('user.checkout-page');
    }

    public function checkoutPage()
    {
        $checkoutCart = session('checkout_cart', []);
        return view('user.checkout', compact('checkoutCart'));
    }

    public function checkout1()
    {
        return view('user.checkout1');
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'payment_method' => 'required|in:cash,card,bank_transfer'
        ]);

        // Xử lý thanh toán và tạo đơn hàng
        // $order = Order::create([...]);
        
        // Xóa giỏ hàng sau khi thanh toán thành công
        session()->forget('cart');
        
        return redirect()->route('user.orders')->with('success', 'Đặt hàng thành công!');
    }
}
