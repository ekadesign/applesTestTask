<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 14.01.2018
 * Time: 20:51
 */

namespace Tests\Unit\StrategiesTest;


use App\Apple;
use App\Services\Apples\Strategies\OddStrategy;
use App\User;
use Tests\TestCase;

class OddStrategyTest extends TestCase {

    public function testReturnApples() {

        //clear for test
        foreach (Apple::all() as $app) {
            $app->grabbed_by = null;
            $app->save();
        }

        $user = User::find(1);
        $oddStrategy = new OddStrategy();
        $apple = Apple::find(1);

        //cause User don't has apples
        $this->assertFalse($oddStrategy->returnApples($user));

        //give odd apple to user
        $apple->grabbed_by = $user->id;
        $apple->save();
        $user->refresh();

        //Need Collection
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $oddStrategy->returnApples($user));


        //refresh for next tests
        foreach (Apple::all() as $app) {
            $app->grabbed_by = null;
            $app->save();
        }
    }

}