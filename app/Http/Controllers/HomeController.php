<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Verify user and group
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];
        // Return product price

        $product_data = Product::withPrices()->get();
        return view('pages.default.homepage', compact('product_data'));
    }
}
