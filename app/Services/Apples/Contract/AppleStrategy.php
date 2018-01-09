<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 06.01.2018
 * Time: 5:51
 */

namespace App\Services\Apples\Contract;


use App\User;

interface AppleStrategy {

    public function returnApples(User $user);

}