<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Mail\Welcome;
use App\Mail\Verify;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class CustomerController extends Controller
{

    public function index() {
        $customers = Customer::paginate(20);

        return response()->json($customers);
    }

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

        $email = $data['email'];

        $url = URL::signedRoute('unsubscribe', ['email' => $email]);
        Mail::to($data['email'])->send(new Welcome($url));

        return response()->json(['success' => 'customer paid']);
    }

    public function paymentStatus(Request $request) {

        $customer = Customer::where('email', $request->email)->first();

        if ($customer != null) {
            
            return response()->json(['paid' => $customer->paid]);
        } else {
            return response()->json(['paid' => false]);
        }
    }

    public function customerStatus(Request $request) {
        
        $customer = Customer::where('email', $request->email)->first();

        if ($customer != null) {
            
            return response()->json(['status' => $customer->status]);
        } else {
            return response()->json(['status' => $customer]);
        }
    }

    public function unsubscribe(Request $request) {

        $customer = Customer::where('email', $request->email)->update(['status' => 0]);

        return view('unsubscribed');
    }

    public function actions(Request $request) {
        $customer = Customer::where('id', $request->id)->first();
        if ($request->action == 'deactivate') {
            $customer->status = false;
        } else {
            $customer->status = true;
        }

        $customer->update();

        return response()->json(['success' => 'User changed']);
    }

    public function reactivate(Request $request) {
        $customer = Customer::where('email', $request->email)->first();

        $url = URL::signedRoute('verified', ['email' => $customer->email]);
        Mail::to($customer->email)->send(new Verify($url));
    }

    public function verified(Request $request) {

        $customer = Customer::where('email', $request->email)->update(['status' => 1]);

        return view('verified');
    }

}
