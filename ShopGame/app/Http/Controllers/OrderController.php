<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = Auth::user()->cart;

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->withErrors('Your cart is empty.');
        }

        // Tính tổng giá trị giỏ hàng
        $total = $cart->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'pending',
        ]);

        // Tích hợp cổng thanh toán (ví dụ: Stripe)
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Charge::create([
                'amount' => $total * 100, // Stripe sử dụng đơn vị cent
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Order payment',
            ]);

            $order->update(['status' => 'completed']);
            $cart->items()->delete(); // Xóa các sản phẩm trong giỏ hàng sau khi thanh toán thành công
        } catch (\Exception $e) {
            $order->update(['status' => 'failed']);
            return redirect()->route('cart.index')->withErrors('Payment failed. Please try again.');
        }

        return redirect()->route('orders.show', $order);
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function index()
    {
        $orders = Auth::user()->orders;
        return view('orders.index', compact('orders'));
    }
}
