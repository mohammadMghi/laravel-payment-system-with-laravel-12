<?php 

namespace App\Application\Buy;

use App\Application\Factories\GatewayFactory;
use App\Application\Gateway;
use App\Domain\Repositories\Order\IOrderRepo;
use App\Models\User;
use Exception;

class BuyService
{
    protected Gateway $gateway;

    function __construct(
        protected IOrderRepo $orderRepo, 
        )
    {}

    public function buy(User $user,int $order_id)
    {
        if (! isset($this->gateway)) throw new Exception('gateway not found');

        $order = $this->orderRepo->find($user->id,$order_id); 
 
        $this->gateway->pay($user, $order->amount);
    }

    public function setGateway($name)
    {
        $this->gateway = GatewayFactory::create($name);
        
        return $this;
    }
}