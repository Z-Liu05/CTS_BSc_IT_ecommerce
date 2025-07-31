<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\products\ProductFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $values = $request->query();

        // Verify user and group
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];
        // Return product price
        $product_data = Product::withPrices()->get();
        $product_data = ProductFilter::withPrices()->filter($values)->get();
        $category_data = Product::distinct('category')->pluck('category');

        return view('pages.default.productspage', compact('product_data', 'category_data'));
    }
}
