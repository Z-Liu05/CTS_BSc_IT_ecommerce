<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index($id)
    {
        // Verify user and group
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        // Return specific prodcut price
        $product_data = Product::singleProduct($id)->withPrices()->get()->first();

        return view('pages.testing.detailspage', compact('product_data'));
    }
}
