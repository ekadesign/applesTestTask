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

class NotExistsStrategy implements AppleStrategy {

    public function returnApples() {
        return Apple::whereNull('grabbed_by');
    }

}