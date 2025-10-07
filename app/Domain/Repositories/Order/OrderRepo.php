<?php 

namespace App\Domain\Repositories\Order;

use App\Models\Order;

class OrderRepo implements IOrderRepo
{
    public function find(int $user_id,int $order_id)
    {
        return Order::where('id',$order_id)
            ->where('id' , $user_id)->first();
    }
} 