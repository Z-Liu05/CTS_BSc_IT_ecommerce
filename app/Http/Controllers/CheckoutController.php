<?php

namespace App\Http\Controllers;

use App\Helpers\PointsHelper;
use App\Models\points\PointsDiscount;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * View for checkout page.
     *
     * @return view for checkout page
     */
    public function index()
    {
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        $user = Auth::user();

        $cart_data = $user->products()->withPrices()->get();

        if ($cart_data->isEmpty()) {
            return redirect()->route('cart.index')->with('message', 'Your Cart is empty.');
        }

        $cart_data->calculateSubtotal();

        $points_helper = new PointsHelper($cart_data->getSubtotal(),$user->total_points, $group_ids);
        $discount_data = PointsDiscount::all();

        return view('pages.default.checkoutpage', compact('cart_data','points_helper','discount_data'));
    }
}
