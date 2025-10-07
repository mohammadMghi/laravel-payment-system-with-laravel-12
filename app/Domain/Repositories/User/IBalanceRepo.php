<?php 

namespace App\Domain\Repositories\User;

interface IBalanceRepo
{
    public function increase($user_id , $amount);
}