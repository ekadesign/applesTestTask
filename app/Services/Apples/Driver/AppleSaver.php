<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 06.01.2018
 * Time: 6:18
 */

namespace App\Services\Apples\Driver;

use App\User;
use Carbon\Carbon;

class AppleSaver {

    private $apples;

    private $strategyContext;

    public function __construct(StrategyContext $strategyContext) {

        $this->strategyContext = $strategyContext;
    }

    public function save(User $user) {

        $basket = Basket::find(1);
        $currentTime = Carbon::now();

        $this->apples = $this->strategyContext->supports($user);

        if (!$this->apples->count()) {
            return redirect()->route('home')->with('message', 'К сожалению яблоки для вас закончились');
        }

        if ($currentTime->diffInMinutes($basket->updated_at) >= 1) {

            $apple = $this->apples->first();
            $apple->grabbed_by = $user->id;
            $apple->save();

            $basket->touch();

            return redirect()->route('home');
        }

        return redirect()->route('home');
    }

}