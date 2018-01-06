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

class AppleSaver {

    private $apples;

    private $user;

    public function __construct($user_id) {

        $this->user = User::find($user_id);

        $this->checkStrategy();
    }

    public function checkStrategy() {
        if(!$this->user->apples->count()){
            $this->apples = new NotExistsStrategy();
        }

        if($this->user->apples->count() && $this->user->apples->first()->id % 2 == 0){
            $this->apples = new EvenStrategy();
        }

        if($this->user->apples->count() && $this->user->apples->first()->id % 2 == 1){
            $this->apples = new OddStrategy();
        }
    }

    public function save() {

        $this->apples = $this->apples->returnApples();

        $apple = $this->apples->first();

        $apple->grabbed_by = $this->user->id;

        $apple->save();
    }

}