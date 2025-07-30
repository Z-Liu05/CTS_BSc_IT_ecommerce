<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Verify user and group
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];
        // Return product price
        $product_data = Product::withPrices()->get();

        return view('pages.default.productspage', compact('product_data'));
    }

    public function search()
    {
        $search = request('search'); // Use the global helper instead of injecting Request

        $product_data = Product::withPrices()
            ->where('title', 'like', "%{$search}%")
            ->orWhere('category', 'like', "%{$search}%")
            ->get();

        return view('partials.product-list', compact('product_data'))->render();
    }
}
