<?php

namespace App\Services;

use Osiset\BasicShopifyAPI\Options;
use Osiset\BasicShopifyAPI\Session;
use Osiset\BasicShopifyAPI\BasicShopifyAPI;

class ShopifyAPI{

    private $api = '';

    public function __construct(){

        // Create options for the API
        $options = new Options();
        $options->setType(true); // Makes it private
        $options->setVersion(env('SHOPIFY_VERSION'));
        $options->setApiKey(env('SHOPIFY_API_KEY'));
        $options->setApiPassword(env('SHOPIFY_API_PASSWORD'));
    
        // Create the client and session
        $api = new BasicShopifyAPI($options);
        $api->setSession(new Session(env('SHOPIFY_SHOP_DOMAIN')));

        $this->api = $api; 
    }

    public function getOrders(){
    
        $orders = [];
        $result = $this->api->rest('GET','/admin/api/2021-07/orders.json', ['status' => 'any']);
        
        if($result['status'] === 200){
            $orders = $result['body']['orders'];
        }

        return $orders;
    }
 
}