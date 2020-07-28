<?php

namespace App\Http\Controllers;

// use App\Models\Product;
// use Illuminate\Http\Request;
// use Validator;
// use Session;
use App\Services\CartService;

class FrontController extends Controller
{
    public function home(CartService $cart) {
        return view('front.home', $cart->getCart());
    }

    public function add(CartService $cart) { 
        $cart->addToCart();
        return redirect()->back()->with('success_message', 'Item added.');
    }

    public function addJS(CartService $cart) { 
        $cart->addToCart();
        $miniCartHtml = view('front.mini-cart', $cart->get())->render();
        return response()->json([
            'html' => $miniCartHtml,
            'cart' => 'OK',
        ]);
    }

    public function remove(CartService $cart)
    {
        $cart->remove();
        return redirect()->back();
    }
}
