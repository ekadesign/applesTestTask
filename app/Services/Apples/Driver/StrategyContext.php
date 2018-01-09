<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 06.01.2018
 * Time: 6:18
 */

namespace App\Services\Apples\Driver;

use App\Services\Apples\Strategies\EvenStrategy;
use App\Services\Apples\Strategies\NotExistsStrategy;
use App\Services\Apples\Strategies\OddStrategy;
use App\User;

class StrategyContext {

    private $strategies;

    public function __construct()
    {
        $this->strategies = [EvenStrategy::class, NotExistsStrategy::class, OddStrategy::class];
    }

    public function supports(User $user) {

        foreach ($this->strategies as $strategy){
            if($apples = (new $strategy)->returnApples($user))
                return $apples;
        }
    }
}