<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 14.01.2018
 * Time: 20:57
 */

namespace Tests\Unit\StrategiesTest;


use App\Apple;
use App\Services\Apples\Strategies\NotExistsStrategy;
use App\User;
use Tests\TestCase;

class NotExistStrategyTest extends TestCase {

    public function testReturnApples(){

        //clear for test
        foreach(Apple::all() as $app){
            $app->grabbed_by = null;
            $app->save();
        }

        $user = User::find(1);
        $notExistStrategy = new NotExistsStrategy();
        $apple = Apple::find(2);

        //Need Collection
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $notExistStrategy->returnApples($user));

        //give even apple to user
        $apple->grabbed_by = $user->id;
        $apple->save();
        $user->refresh();

        //cause User don't has apples
        $this->assertFalse($notExistStrategy->returnApples($user));

        //refresh for next tests
        foreach(Apple::all() as $app){
            $app->grabbed_by = null;
            $app->save();
        }
    }

}