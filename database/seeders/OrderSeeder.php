<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\LineItem;
use App\Services\ShopifyAPI;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shop = new ShopifyAPI();
        $orders = $shop->getOrders();
        if(count($orders)){
            foreach ($orders as $key => $order) {
                Order::create([
                    'order_id' => $order['order_number'],
                    'customer_first_name' => $order['shipping_address']['first_name'],
                    'customer_last_name' => $order['shipping_address']['last_name'],
                    'order_currency' => $order['total_price_set']['presentment_money']['currency_code'],
                    'order_sum' => $order['total_price_set']['presentment_money']['amount'],
                    'ordered_at' => $order['created_at']
                ]);
                foreach ($order['line_items'] as $key => $item) {
                    LineItem::create([
                        'order_id' => $order['order_number'],
                        'title' => $item['title'],
                        'price' => $item['price']
                    ]);
                }
            }
        }
    }
}
