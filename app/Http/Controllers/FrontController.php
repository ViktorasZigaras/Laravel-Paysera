<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Validator;
use Session;

class FrontController extends Controller
{
    public function home() {
        print_r(Session::get('cart'));

        $cart = Session::get('cart');
        $count = 0;
        $total = 0;
        $items = [];
        foreach ($cart as $key => $value) {
            $count += $value['count']; 
            $total += $value['price']; 
            $items[$key] = Product::where('id', $value['product_id'])->first();
        }
        # compact ?
        return view('front.home', ['products' => Product::all()->sortBy('title'), 'count' => $count, 'total' => $total, 'items' => $items, 'cart' => $cart]);
    }

    public function add(Request $request) {

        // Session::put('cart', []);

        $count = (int) $request->count;
        $product = Product::where('id', $request->product_id)->first();
        #prices can be added later when developing this project
        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id] = 
            [
                'count' => $cart[$product->id]['count'] + $count, 
                'product_id' => $product->id, 
                'price' => $cart[$product->id]['price'] + 10 * $count
            ];
        } else {
            $cart[$product->id] = 
            [
                'count' => $count, 
                'product_id' => $product->id, 
                'price' => 10 * $count
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success_message', 'Item added.');
    }
}
