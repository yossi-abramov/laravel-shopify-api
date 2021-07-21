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
        Self::$data['order'] = LineItem::where('order_id', $request->order_id)->get();
        return view('order', Self::$data);
    }
}
