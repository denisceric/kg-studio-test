<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->validate([
            'email' => 'required'
        ]);
        $checkCustomer = Customer::where('email', $data['email'])->first();
        if ($checkCustomer === null) {
            $customer = new Customer;
            $customer->email = $data['email'];
            $customer->save();
            return response()->json(['success' => 'customer added']);
        } else {
            return response()->json(['error' => 'Email already exists.']);
        }
    }

    public function payment(Request $request) {
        $data = $request->validate([
            'email' => 'required'
        ]);

        $customer = Customer::where('email', $data['email'])->update(['paid' => 1]);

        return response()->json(['success' => 'customer paid']);
    }

    public function status(Request $request) {
        $customer = Customer::where('email', $request->input('email'))->first();
        return response()->json(['paid' => $customer->paid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
