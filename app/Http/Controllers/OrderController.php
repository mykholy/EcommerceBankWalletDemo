<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Mykholy\BankWalletHelper\BankWalletHelper;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index(Request $request)
    {

        if ($request->has('TransactionID')) {
            $bank_wallet = new BankWalletHelper(env('CLIENT_ID'), env('CLIENT_SECRET'), "https://bank.egym.site/");


            $res = $bank_wallet->doCheckoutPayment($request->TransactionID);


            if ($res['status']) {
                $timeout_transaction = intval(strtotime(Carbon::now()) - strtotime(Carbon::parse($res['data']['created_at']))); //timeout transaction in sec;
                $amount_paid = $res['data']['amount'];
                $amount_cart = \Cart::session(auth()->user()->id)->getTotal();

                if ($timeout_transaction < 100 && $amount_paid == $amount_cart) {
                    $order = Order::where('user_id', auth()->user()->id)->orderBy('updated_at', 'DESC')->first();
                    $order->paid = 1;
                    $order->save();
                    \Cart::session(auth()->user()->id)->clear();

                }

            }

        }

        $orders = Order::where('user_id', auth()->user()->id)->get();

//

        return view('orders', compact('orders'));

    }


}
