<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;


use GuzzleHttp\Client;
use http\Message\Body;
use Illuminate\Http\Request;
use Mykholy\BankWalletHelper\BankWalletHelper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $userId;

    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {


        $this->userId = auth()->user()->id;

        $products = Product::all();

        $carts = \Cart::session($this->userId)->getContent();


        return view('home', compact('products', 'carts'));
    }

    public function addProduct(Product $product)
    {


        if (\Cart::session(auth()->user()->id)->get($product->id) == null)
            \Cart::session(auth()->user()->id)->add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $product
            ));
        else
            $this->updateQty($product, 1);

        return redirect()->back();

    }

    public function updateQty(Product $product, $qty)
    {


        \Cart::session(auth()->user()->id)->update($product->id, [
            'quantity' => $qty
        ]);
        return redirect()->back();

    }

    public function removeItem(Product $product)
    {
        \Cart::session(auth()->user()->id)->remove($product->id);

        return redirect()->back();


    }

    public function clearCart()
    {
        \Cart::session(auth()->user()->id)->clear();
        Order::where('user_id', auth()->user()->id)->where('paid', 0)->first()->delete();
        return redirect()->back();
    }

    public function pay()
    {


        $bank_wallet = new BankWalletHelper(env('CLIENT_ID'), env('CLIENT_SECRET'),"https://bank.egym.site/");

        $res = $bank_wallet->checkout(json_encode($this->cartData()));


        if (!$res['status'])
            return redirect()->back()->with(['error' => $res['message']]);


        //create order
        if (!Order::where('paid', 0)->where('user_id', auth()->user()->id)->first())
            Order::create(['cart_data' => $this->cartData(), 'user_id' => auth()->user()->id]);
        else {
            $order = Order::where('paid', 0)->where('user_id', auth()->user()->id)->first();
            $order->cart_data = $this->cartData();
            $order->save();
        }


        return redirect()->to($res['data']['wallet_link']);
    }

    public function cartData()
    {
        $data = [];
        $data['items'] = $this->getItems();
        $data['total'] = \Cart::session(auth()->user()->id)->getTotal();
        $data['sub_total'] = \Cart::session(auth()->user()->id)->getSubTotal();
        $data['shipping'] = 1;
        $data['cancel_url'] = "http://localhost/TestEcommerce/public/home";
        $data['return_url'] = route('orders.index');


        return ($data);

    }

    public function getItems()
    {
        $items = collect(\Cart::session(auth()->user()->id)->getContent());

        $myItems = [];


        foreach ($items as $row) {

            $newItem['itemId'] = "" . $row->id;
            $newItem['description'] = $row->name;
            $newItem['quantity'] = $row->quantity;
            $newItem['price'] = $row->price;

            array_push($myItems, $newItem);

        }


        return ($myItems);

    }
}
