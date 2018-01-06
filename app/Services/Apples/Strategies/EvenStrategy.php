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

class EvenStrategy implements AppleStrategy {
    public function returnApples() {
        return Apple::Even()->get();
    }
}