<?php 

namespace App\Domain\Repositories\User;

use App\Models\Balance;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BalanceRepo implements IBalanceRepo
{
    public function increase($user_id, $amount)
    {
        DB::transaction(function() use ($user_id,$amount){
            $user = User::find($user_id);

            $user->increment('balance' , $amount);

            $balance = new Balance();

            $balance->user_id = $user_id;

            $balance->amount = $amount;

            $balance->save();
        });
    }
}