<?php

namespace App\Http\Controllers;

use App\Services\Apples\Driver\AppleSaver;
use App\User;

use App\Http\Requests;
use App\Apple;

class HomeController extends Controller
{

    /**
     * @return string
     */
    public function getHome() {

        $users = User::all();

        $basketApples = Apple::WhereNull('grabbed_by')->get();

        return view('site.home', compact('users', 'basketApples'));
    }


    /**
     * @param int $user_id
     * @return string
     */
    public function getTakeApple( $user_id ) {

        (new AppleSaver($user_id))->save();

        \Log::info("apple grabbed by {$user_id}");

        return redirect('/');
    }


    /**
     * @return string
     */
    public function getFreeApples() {

        \Log::info("freedom");

        return redirect('/');
    }


}
