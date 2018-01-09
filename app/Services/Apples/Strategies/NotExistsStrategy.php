<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 06.01.2018
 * Time: 5:54
 */

namespace App\Services\Apples\Strategies;


use App\Apple;
use App\Services\Apples\Contract\AppleStrategy;
use App\User;

class NotExistsStrategy implements AppleStrategy {

    public function returnApples(User $user) {
        if(!$user->apples->count())
            return Apple::whereNull('grabbed_by');
        return false;
    }

}