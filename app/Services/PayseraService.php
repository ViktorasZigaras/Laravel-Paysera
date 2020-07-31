<?php

namespace App\Services;

use App\Models\Order;
use App\Libs\WebToPay;
use App\Libs\WebToPayException;

class PayseraService {

    private $config;

    public function __construct(array $config) {
        $this->config = $config;
    }

    public function buy(Order $order) {
        try {         
            return redirect(WebToPay::redirectToPayment([
                'projectid'     => $this->config['projectid'],
                'sign_password' => $this->config['sign_password'],
                // 'orderid'       => 'orderNo-' . $order->id,
                'orderid'       => $order->id,
                'amount'        => (int) ($order->price * 100), # cents!
                'currency'      => 'EUR',
                'country'       => 'LT',
                'accepturl'     => route('paysera.accept'),
                'cancelurl'     => route('paysera.cancel'),
                'callbackurl'   => route('paysera.callback'),
                'test'          => 1,
            ]));
        } catch (WebToPayException $e) {
            echo get_class($e) . ': ' . $e->getMessage();
        } 

        // return 'paysera?';
        
        # no return because Paysera interrupts
    }

    public function allGood() {
        try {
            $response = WebToPay::checkResponse($_GET, $this->config);
            $orderId = $response['orderid'];
            $amount = $response['amount'];
            $currency = $response['currency'];

            $order = Order::where('id', $orderId)->first();
            if (
                $amount == (int) ($order->price * 100) && 
                $currency == 'EUR' && 
                $order->status == 1
            ) {
                $order->status = 2;
                $order->save();
            }
            return 'Accept order ' . $orderId . ': ' . $amount/100 . ' ' . $currency;
        } catch (\Exception $e) {
            echo get_class($e) . ': ' . $e->getMessage();
        }
    }
}