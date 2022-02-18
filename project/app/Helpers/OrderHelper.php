<?php 

namespace App\Helpers;

use Auth;
use Session;
use App\Models\Cart;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\VendorOrder;
use App\Models\Notification;
use App\Models\UserNotification;

class OrderHelper
{
   
    public static function mollie_currencies(){
        return array(
            'AED',
            'AUD',
            'BGN',
            'BRL',
            'CAD',
            'CHF',
            'CZK',
            'DKK',
            'EUR',
            'GBP',
            'HKD',
            'HRK',
            'HUF',
            'ILS',
            'ISK',
            'JPY',
            'MXN',
            'MYR',
            'NOK',
            'NZD',
            'PHP',
            'PLN',
            'RON',
            'RUB',
            'SEK',
            'SGD',
            'THB',
            'TWD',
            'USD',
            'ZAR'
            );
    }


    public static function flutter_currencies(){
        return array(
            'BIF',
            'CAD',
            'CDF',
            'CVE',
            'EUR',
            'GBP',
            'GHS',
            'GMD',
            'GNF',
            'KES',
            'LRD',
            'MWK',
            'NGN',
            'RWF',
            'SLL',
            'STD',
            'TZS',
            'UGX',
            'USD',
            'XAF',
            'XOF',
            'ZMK',
            'ZMW',
            'ZWD'
            );
    }

    public static function mercadopago_currencies(){
        return array(
            'ARS',
            'BRL',
            'CLP',
            'MXN',
            'PEN',
            'UYU',
            'VEF'
            );
    }

}