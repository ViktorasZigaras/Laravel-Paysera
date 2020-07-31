<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
// use Validator;
// use Session;
use App\Services\CartService;
use App\Services\PayseraService;

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
        $miniCartHtml = view('front.cart', $cart->getCart())->render();
        return [
            'html' => $miniCartHtml ?? 'fail',
            'cart' => 'OK',
        ];
    }

    public function remove(CartService $cart)
    {
        $cart->remove();
        return redirect()->back();
    }

    public function buy(CartService $cart, PayseraService $paysera, Request $request)
    {
        # simplify this service call?
        $buyCart = $cart->getCart();
        $order = Order::makeOrder($request, $buyCart['total']);
        $cart->clearSession();
        Cart::makeCart($buyCart['products'], $order);
        return $paysera->buy($order);

        return 'buying';
        
        # no return because Paysera interrupts
    }

    public function payseraAccept(PayseraService $paysera) {
        return $paysera->allGood();
        # alternatively use redirect to response page
    }

    public function payseraCancel() {
        return 'Cancel';
    }

    public function payseraCallback() {
        return 'Callback';
    }
}
