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
        // $validator = Validator::make($request->all(),
        // [
        //     'name' => ['required', 'min:3', 'max:64'],
        //     'surname' => ['required', 'min:3', 'max:64'],
        // ]
        // );
        // if ($validator->fails()) {
        //     $request->flash();
        //     return redirect()->back()->withErrors($validator);
        // }
        // $author = Author::create($request->all());
        // $author->save();
        // return redirect()->route('author.index')->with('success_message', '<Author Created>');

        $product = new Product;
        $product->title = $request->title;
        $product->price = 0;
        $product->sale = 'no';
        $product->description = 'none';
        $product->save();

        foreach ($request->file('image') as $file) {
            $name = $file->getClientOriginalName();
            $destinationPath = public_path('/images/products');
            $file->move($destinationPath, $name);

            $image = new Image;
            $image->name = $request->title;
            $image->product_id = $product->id;
            $image->sequence = 0;
            $image->alt = '';
            $image->save();
        }

        return redirect()->route('product.index')->with('success_message', 'Product created.');
    }

    public function show(/*Book $book*/)
    {
        return '';
    }

    public function edit(/*Book $book*/)
    {
        return '';
    }

    public function update(Request $request/*, Book $book*/)
    {
        return '';
    }

    public function destroy(/*Book $book*/)
    {
        return '';
    }
}
