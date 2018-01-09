<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 06.01.2018
 * Time: 5:59
 */

namespace App\Services\Apples\Strategies;


use App\Apple;
use App\Services\Apples\Contract\AppleStrategy;
use App\User;

class OddStrategy implements AppleStrategy {

    public function returnApples(User $user) {
        if($user->apples->count() && $user->apples->first()->id % 2 == 1)
        return Apple::Odd()->get();
        return false;
    }
}