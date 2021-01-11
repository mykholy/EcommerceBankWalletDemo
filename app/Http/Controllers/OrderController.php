<?php

namespace App\Http\Controllers;

use App\Order;
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
            $bank_wallet = new BankWalletHelper(env('CLIENT_ID'), env('CLIENT_SECRET'),"https://bank.egym.site/");


            $res = $bank_wallet->doCheckoutPayment($request->TransactionID);

            if ($res['status']) {
                $order = Order::where('user_id', auth()->user()->id)->orderBy('updated_at', 'DESC')->first();
                $order->paid = 1;
                $order->save();
                \Cart::session(auth()->user()->id)->clear();

            }

        }

        $orders = Order::where('user_id', auth()->user()->id)->get();

//        return ($orders)->first()->cart_data['items'][0]['itemId'];


        return view('orders', compact('orders'));

    }


}
