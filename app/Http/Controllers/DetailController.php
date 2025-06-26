<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    /**
     * Display a single resource
     *
     * This method retrieves a product form the products table based on an ID
     * The information is then passed on to the details page
     *
     * @param [type] $id
     * @return detailspage
     */
    public function index($id)
    {
        // Verify user and group
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        $user = Auth::user();
        // Return specific prodcut price
        $data = Product::singleProduct($id)->withPrices()->get()->first();

        return view('pages.default.detailspage', compact('data'));
    }
}
