<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
// use Validator;
// use Session;
use App\Services\CartService;
use App\Libs\WebToPay;
use App\Libs\WebToPayException;

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

    public function buy(CartService $cart, Request $request)
    {
        # simplify this service call?
        $buyCart = $cart->getCart();
        $order = new Order;
        # use autofill
        $order->customer_id = 1;
        $order->customer_name = $request->name;
        $order->customer_email = $request->email;
        $order->customer_phone = $request->phone;
        $order->price = $buyCart['total'];
        $order->status = 1;
        $order->save();

        foreach ($buyCart['products'] as $product) {
            $orderCart = new Cart;
            $orderCart->product_id = $product->id;
            $orderCart->order_id = $order->id;
            $orderCart->save();
        }

        #####

        try {         
            return redirect(WebToPay::redirectToPayment([
                'projectid'     => 181604,
                'sign_password' => '0b32d6a87c09c32b3cd90dfd5ef5699f',
                'orderid'       => 'orderNo-' . $order->id,
                'amount'        => (int) $order->price * 100, # cents!
                'currency'      => 'EUR',
                'country'       => 'LT',
                'accepturl'     => route('paysera.accept'),
                'cancelurl'     => route('paysera.cancel'),
                'callbackurl'   => route('paysera.callback'),
                'test'          => 1,
            ]));
        } catch (WebToPayException $e) {
            // handle exception
        } 
        
        # no return because Paysera interrupts
    }
}
