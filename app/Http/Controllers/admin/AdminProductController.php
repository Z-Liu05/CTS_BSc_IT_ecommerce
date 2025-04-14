<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * This funciton is responsible for retrieving all of the product information from the database
     * Information is passed through a view to display
     * This is where admin can view all products available on app
     */
    public function index()
    {
        $product_data = Product::all();

        return view('admin.default.products.admin-view-products', compact('product_data'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('admin.default.products.admin-add-products');
    }

    /**
     * Store a newly created product in database.
     *
     * This function is for creation and validation of data to the database
     */
    public function store(CreateProductRequest $request)
    {
        $validatedData = $request->validated();
        $imageHelper = new ImageHelper();
        $validatedData['image_path'] = '/images/products/';
        $validatedData['image_name'] = $imageHelper->imageUpload($request->file('image_upload'));
        Product::create($validatedData);
        return redirect()->route('admin.products.index')->with('message', 'Product created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::findOrFail($id);

        return view('admin.default.products.admin-edit-products', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * Validate and update the product information in the database
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $product = Product::findOrFail($id);

        $imageHelper = new ImageHelper();

        if ($request->hasFile('image_upload')) {
            $validatedData['image_name'] = $imageHelper->imageUpload($request->file('image_upload'));
        }

        $product->update($validatedData);

        return redirect()->route('admin.products.edit', ['product' => $id])->with('message', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
