<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::content();

        return view('carts.index', compact('carts'));
    }

    public function add(Request $request, $dish)
    {
        $product = Product::findOrFail($dish);

        Cart::add($product->id, $product->name, 1, $product->price);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);

        return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully!');
    }

    public function clear()
    {
        Cart::destroy();

        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully!');
    }
}
