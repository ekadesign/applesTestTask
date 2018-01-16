<?php
/**
 * Created by PhpStorm.
 * User: eka
 * Date: 14.01.2018
 * Time: 17:45
 */

namespace Tests\Unit;


use App\Apple;
use App\Basket;
use App\Http\Controllers\HomeController;
use App\Services\Apples\Driver\AppleSaver;
use App\User;
use Illuminate\Support\Facades\Bus;
use Mockery\Mock;
use Symfony\Component\HttpFoundation\Request;
use Tests\TestCase;

class HomeControllerTest extends TestCase {

    public function testGetHome(){
        $response = $this->get('/');
        $response->assertViewIs('site.home');
        $response->assertViewHasAll(['users', 'basketApples']);
    }

    public function testGetFreeApples(){

        $basket = $this->createMock(Basket::class);
        $apples = $this->createMock(Apple::class);


        $response = $this->get('/free-apples');

        $response->assertSessionHas('message');
        $response->assertRedirect('/');
        $this->assertNull($basket->updated_at);

            $this->assertNull($apples->grabbed_by);
    }

    public function testGetTakeApple() {
        $response = $this->get('/take-apple/1');
        $response->assertRedirect('/');

    }
}