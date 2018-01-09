<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 06.01.2018
 * Time: 6:00
 */

namespace App\Services\Apples\Strategies;


use App\Apple;
use App\Services\Apples\Contract\AppleStrategy;
use App\User;

class EvenStrategy implements AppleStrategy {


    public function returnApples(User $user) {
        if($user->apples->count() && $user->apples->first()->id % 2 == 0)
            return Apple::Even()->get();
        return false;
    }
}