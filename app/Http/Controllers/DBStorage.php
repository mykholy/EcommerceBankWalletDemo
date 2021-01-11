<?php


namespace App\Http\Controllers;


use App\Order;
use Darryldecode\Cart\CartCollection;

class DBStorage {

    public function has($key)
    {
        return Order::find($key);
    }

    public function get($key)
    {
        if($this->has($key))
        {
            return new CartCollection(Order::find($key)->cart_data);
        }
        else
        {
            return [];
        }
    }

    public function put($key, $value)
    {
        if($row = Order::find($key))
        {
            // update
            $row->cart_data = $value;
            $row->save();
        }
        else
        {
            Order::create([
                'id' => $key,
                'cart_data' => $value,
                'user_id' => auth()->user()->id,
            ]);
        }
    }
}
