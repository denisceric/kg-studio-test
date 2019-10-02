<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        return view('home');
    }

    public function quotes() {

        return view('quotes');
    }

    public function customers() {

        return view('customers');
    }

    public function settings() {
        return view('settings');
    }

}
