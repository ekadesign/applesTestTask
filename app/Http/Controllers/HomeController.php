<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Services\Apples\Driver\AppleSaver;
use App\User;

use App\Http\Requests;
use App\Apple;

class HomeController extends Controller {

    private $appleSaver;

    public function __construct(AppleSaver $appleSaver) {
        $this->appleSaver = $appleSaver;
    }

    /**
     * @return string
     */
    public function index() {

        $users = User::all();

        $basketApples = Apple::WhereNull('grabbed_by')->get();

        return view('site.home', compact('users', 'basketApples'));
    }


    /**
     * gives apple to user
     * @param int $id as user ID
     * @return string
     */
    public function giveAppleToUser($id) {

        $user = User::find($id);

        $this->appleSaver->save($user);

        return redirect()->route('index');
    }


    /**
     * clear apples and reset basket time
     * @return string
     */
    public function getFreeApples() {

        $basket = Basket::find(1);

        //clear updated_at for the basket model
        $basket->updated_at = null;
        $basket->timestamps = false;
        $basket->save();
        $apples = Apple::all();
        //clear apples
        foreach ($apples as $apple) {
            $apple->grabbed_by = null;
            $apple->save();
        }

        return redirect()->route('index')->with('message', 'Очищено');
    }


}
