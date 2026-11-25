<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('book.promotions')->where('user_id', Auth::id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request, Book $book)
{
    $user = auth()->user();

    $cartItem = $user->cart()->where('book_id', $book->id)->first();

    if ($cartItem) {
        $cartItem->increment('quantity');
    } else {
        $user->cart()->create([
            'book_id' => $book->id,
            'quantity' => 1,
        ]);
    }

    session(['cart_count' => $user->cart()->count()]);
    return redirect()->back()->with('success', 'Book added to cart!');
}



    public function remove(Cart $cart)
{
    if ($cart->user_id !== Auth::id()) {
        abort(403);
    }

    $cart->delete();
    return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
}

public function update(Request $request, Cart $cart)
{
    if ($cart->user_id !== Auth::id()) {
        abort(403);
    }

    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $cart->update(['quantity' => $request->quantity]);
    return redirect()->route('cart.index')->with('success', 'Cart updated.');
}


    public function checkout()
{
    // Retrieve the cart items for the logged-in user
    $cartItems = Cart::with('book.promotions')->where('user_id', Auth::id())->get();

    // Calculate the total price of the cart items
    $total = $cartItems->sum(function ($cartItem) {
        return $cartItem->book->finalPrice() * $cartItem->quantity;
    });

    return view('cart.checkout', compact('cartItems', 'total'));
}
public function confirm(Request $request)
{
    // Validate the input
    $request->validate([
        'address' => 'required|min:10', // Ensure address is provided and has a minimum length of 10 characters
    ]);

    // Get the user's cart items
    $cartItems = Cart::with('book.promotions')->where('user_id', Auth::id())->get();

    // Check if the cart is empty
    if ($cartItems->isEmpty()) {
        return redirect()->route('home')->with('error', 'Your cart is empty.');
    }

    // Calculate the total price of the cart items
    $total = $cartItems->sum(function ($cartItem) {
        return $cartItem->book->finalPrice() * $cartItem->quantity;
    });

    // Create the order (ensure you have an Order model)
    $order = Order::create([
        'user_id' => Auth::id(),
        'total_price' => $total,
        'address' => $request->address,
        'status' => 'pending',
    ]);
session(['cart_count' => 0]);

    // Add cart items to the order
    foreach ($cartItems as $cartItem) {
        $order->orderItems()->create([
            'book_id' => $cartItem->book_id,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->book->finalPrice(),
        ]);
    }

    // Clear the user's cart after order is placed
    Cart::where('user_id', Auth::id())->delete();

    return redirect()->route('orders.index')->with('success', 'Your order has been placed successfully.');
}

}
