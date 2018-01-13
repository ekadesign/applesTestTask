<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 06.01.2018
 * Time: 6:18
 */

namespace App\Services\Apples\Driver;

use App\User;

class AppleSaver {

    private $apples;

    private $strategyContext;

    public function __construct(StrategyContext $strategyContext) {

        $this->strategyContext = $strategyContext;
    }

    public function save(User $user) {

        $this->apples = $this->strategyContext->supports($user);

        //TODO нет яблок сделать
        if (!$this->apples->count()) return redirect()->route('home')->with('message', 'К сожалению яблоки для вас закончились');

        $apple = $this->apples->first();

        $apple->grabbed_by = $user->id;

        $apple->save();

        return redirect()->route('home');
    }

}