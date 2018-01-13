<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Services\Apples\Driver\AppleSaver;
use App\User;

use App\Http\Requests;
use App\Apple;

class HomeController extends Controller
{

    private $appleSaver;

    public function __construct(AppleSaver $appleSaver)
    {
        $this->appleSaver = $appleSaver;
    }

    /**
     * @return string
     */
    public function getHome() {

        $users = User::all();

        $basketApples = Apple::WhereNull('grabbed_by')->get();

        return view('site.home', compact('users', 'basketApples', 'basket'));
    }


    /**
     * @param int $user_id
     * @return string
     */
    public function getTakeApple( $user_id ) {

        $user = User::find($user_id);

        $this->appleSaver->save($user);

        return redirect()->route('home')->with('message', 'увы и ах меньше минуты с момента последнего обращения к корзине');

    }


    /**
     * @return string
     */
    public function getFreeApples() {

        $basket = Basket::find(1);

        //clear updated_at for the basket model
        $basket->setUpdatedAt(null);

        $apples = Apple::all();
        //clear apples
        foreach ($apples as $apple){
            $apple->grabbed_by = null;
            $apple->save();
        }

        return redirect()->route('home')->with('success_message', 'Очищено');
    }


}
