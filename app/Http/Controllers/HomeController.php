<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Services\Apples\Driver\AppleSaver;
use App\User;

use App\Http\Requests;
use App\Apple;
use Carbon\Carbon;

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

        $basket = Basket::find(1);

        $currentTime = Carbon::now();

        if($currentTime->diffInMinutes($basket->updated_at) > 1) {

            $this->appleSaver->save($user);

            $basket->touch();

            return redirect()->route('home');
        }

        return redirect()->route('home')->with('message', 'увы и ах меньше минуты с момента последнего обращения к корзине');

    }


    /**
     * @return string
     */
    public function getFreeApples() {

        $basket = Basket::find(1);

        //clear updated_at for the basket model
        $basket->setUpdatedAt($basket->freshTimestamp());

        $apples = Apple::all();
        //clear apples
        foreach ($apples as $apple){
            $apple->grabbed_by = null;
            $apple->save();
        }

        return redirect()->route('home')->with('success_message', 'Очищено');
    }


}
