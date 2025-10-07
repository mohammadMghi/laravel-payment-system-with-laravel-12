<?php 

namespace App\Domain\Repositories\Order;

interface IOrderRepo
{
    public function find(int $user_id,int $order_id);
}