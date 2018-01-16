<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 14.01.2018
 * Time: 20:28
 */

namespace Tests\Unit\StrategiesTest;


use App\Apple;
use App\Services\Apples\Driver\AppleSaver;
use App\Services\Apples\Strategies\EvenStrategy;
use App\User;
use Tests\TestCase;

class EvenStrategyTest extends TestCase {

    public function testReturnApples(){

        //clear for test
        foreach(Apple::all() as $app){
            $app->grabbed_by = null;
            $app->save();
        }

        $user = User::find(1);
        $evenStrategy = new EvenStrategy();
        $apple = Apple::find(2);

        //cause User don't has apples
        $this->assertFalse($evenStrategy->returnApples($user));

        //give even apple to user
        $apple->grabbed_by = $user->id;
        $apple->save();
        $user->refresh();

        //Need Collection
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $evenStrategy->returnApples($user));


        //refresh for next tests
        foreach(Apple::all() as $app){
            $app->grabbed_by = null;
            $app->save();
        }
    }
}