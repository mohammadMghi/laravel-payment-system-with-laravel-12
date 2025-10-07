<?php 

namespace App\Application;

use App\Models\User;

abstract class Gateway
{ 
    public abstract function pay(User $user,$amount);
}