<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index', ['products' => Product::all()->sortBy('title')]);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $product = Product::create(['title' => $request->title]);
        $product->save();

        foreach ($request->file('image', []) as $file) {
            $name = $file->getClientOriginalName();
            $destinationPath = public_path('/images/products');
            $file->move($destinationPath, $name);

            $image = new Image;
            $image->name = $name;
            $image->product_id = $product->id;
            $image->sequence = 0;
            $image->alt = 'This is ' . $request->title;
            $image->save();
        }

        return redirect()->route('product.index')->with('success_message', 'Product created.');
    }

    public function show(/*Product $product*/)
    {
        return '';
    }

    public function edit(/*Product $product*/)
    {
        return '';
    }

    public function update(Request $request/*, Product $product*/)
    {
        return '';
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success_message', 'Product deleted.');
    }
}
