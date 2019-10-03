<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Quote;

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
        $customers = Customer::all()->count();
        $quotes = Quote::all()->count();
        return view('home', compact('customers', 'quotes'));
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
