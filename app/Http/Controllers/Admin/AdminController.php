<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{




    /**
     * @return string
     */
    public function getDashboard() {
        return view('admin.page');
    }


}
