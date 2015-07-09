<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function home()
    {

        $name = \Auth::user()->first_name;

        return view('pages.home', compact('name'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function profile()
    {

        return view('pages.profile');
    }
}
