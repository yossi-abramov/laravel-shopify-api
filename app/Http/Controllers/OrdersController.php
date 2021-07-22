<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\LineItem;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    static public $data = [];

    public function index(){
        Self::$data['orders'] = Order::all();
        return view('orders', Self::$data);
    }

    public function getOrderItems(Request $request){
        $order = Order::where('order_id', $request->order_id)->first();
        Self::$data['order_total'] = $order->order_sum . ' ' . $order->order_currency;
        Self::$data['order'] = LineItem::where('order_id', $request->order_id)->get();
        return view('order', Self::$data);
    }
}
