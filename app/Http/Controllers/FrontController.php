<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
}
