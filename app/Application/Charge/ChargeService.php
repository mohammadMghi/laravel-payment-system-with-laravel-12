<?php 

namespace App\Application\Charge;

use App\Application\Factories\GatewayFactory;
use App\Application\Gateway;
use App\Domain\Repositories\User\IBalanceRepo;
use App\Models\User;
use Exception;

class ChargeService
{
    protected Gateway $gateway;

    function __construct(
        protected IBalanceRepo $balanceRepo, 
        )
    {}

    public function charge(User $user, $amount)
    {
        if (! isset($this->gateway)) throw new Exception('gateway not found');

        $this->gateway->pay($user, $amount);

        $this->balanceRepo->increase($user->id, $amount);
    }

    public function setGateway($name)
    {
        $this->gateway = GatewayFactory::create($name);
        
        return $this;
    }
}