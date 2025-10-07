<?php

namespace App\Application\Factories;

use App\Application\Gateway;
use App\Application\Gateways\ZarinpalGateway;

class GatewayFactory
{ 
    public static function create($name) : Gateway
    {
        return match($name) { 
            'zarinpal' => new ZarinpalGateway()
        }; 
    }
}