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

class OddStrategy implements AppleStrategy {
    public function returnApples() {
        return Apple::Odd()->get();
    }
}