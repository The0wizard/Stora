<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Access denied.');
        }

        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Access denied.');
        }

        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Access denied.');
        }

        $request->validate([
            'status' => 'required|in:pending,completed,canceled',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated.');
    }

    public function userOrders()
    {
        $orders = Order::with('orderItems.book')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function userShow(Order $order)
    {
        $order = Order::with('orderItems.book')
            ->where('user_id', Auth::id())
            ->findOrFail($order->id);

        return view('orders.show', compact('order'));
    }
}
