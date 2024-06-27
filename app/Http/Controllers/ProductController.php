<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('pages.admin.product.product', ['products' => $products]);
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('pages.admin.product.product-detail', ['product' => $product]);
    }

    public function create()
    {
        return view('pages.admin.product.product-create');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $image = $data['imgURL'];
        $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
        $data['imgURL'] = $uploadedFileUrl;
        $product = Product::create($data);

        return redirect()->route('admin.product.detail', ['id' => $product->_id])->with('success', 'Product created successfully');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('pages.admin.product.product-edit', ['product' => $product]);
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validated();

        $product->update($data);

        return redirect()->route('admin.product.detail', ['id' => $id])->with('success', 'Product updated successfully');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('admin.product')->with('success', 'Product deleted successfully');
    }
}
