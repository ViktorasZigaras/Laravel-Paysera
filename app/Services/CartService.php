<?php

namespace App\Services;

use Session;
use App\Models\Product;

class CartService
{
    # needs setter
    public $request;

    public function getCart()
    {
        // unset(Session::get('cart'));
        $cart = Session::get('cart', []);
        $count = 0;
        $total = 0;
        $items = [];
        foreach ($cart as $key => $value) {
            $count += $value['count']; 
            $total += $value['price']; 
            $items[$key] = Product::where('id', $value['product_id'])->first();
        }
        # compact ?
        return ['products' => Product::all()->sortBy('title'), 'count' => $count, 'total' => $total, 'items' => $items, 'cart' => $cart];
    }

    public function addToCart() {
        $count = (int) $this->request->count;
        $product = Product::where('id', $this->request->product_id)->first();
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
    }

    public function remove()
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$this->request->product_id])) {
            unset($cart[$this->request->product_id]);
        }
        Session::put('cart', $cart);
    }

    public function clearSession() {
        Session::forget('cart');
    }
}
