<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $group_id = Auth::check() ? Auth::user()->getGroups() : [1];

        $user = Auth::user();

        $cart_data = $user->products()->withPrices()->get();

        $cart_data->calculateSubtotal();

        return view('pages.default.cartpage', compact('cart_data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->product_id],
            ['quantity' => DB::raw('quantity + '.$request->quantity), 'updated_at' => now()]
        );

        // redirect user to the cart page
        return redirect()->route('cart.index')->with('message', 'Product added to cart');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::destroy($id);

        return redirect()->route('cart.index')->with('message', 'Product removed from cart');
    }

    public function addToCartFromStore(Request $request)
    {
        Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->id],
            ['quantity' => DB::raw('quantity + '. 1), 'updated_at' => now()]
        );

        // redirect user to the cart page
        return redirect()->route('cart.index')->with('message', 'Product added to cart');
    }
}
