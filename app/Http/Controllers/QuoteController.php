<?php

namespace App\Http\Controllers;

use App\Quote;
use Auth;
use Illuminate\Http\Request;

class QuoteController extends Controller
{

    public function index(Request $request) {
        $data = $request->validate([
            'id' => 'required'
        ]);

        if ($data['id'] == Auth::id()) {

            $quotes = Quote::orderBy('created_at', 'desc')->get();

            return response()->json($quotes);
        } else {

            return response()->json(['error' => 'Unauthorized']);
        }
    }

    public function create() {
        //
    }


    public function store(Request $request) {
        $data = $request->validate([
            'quote' => 'required',
            'author' => 'required'
        ]);

        $quote = new Quote;
        $quote->quote = $data['quote'];
        $quote->author = $data['author'];
        $quote->save();

        return response()->json(['success' => 'Quote added.']);
    }

    public function show(Quote $quote) {
        //
    }

    public function edit(Quote $quote) {
        //
    }

    public function update(Request $request, Quote $quote) {
        //
    }

    public function destroy(Request $request) {
        $data = $request->validate([
            'id' => 'required',
            'quote_id' => 'required'
        ]);
        if ($data['id'] == Auth::id()) {

            Quote::where('id', $data['quote_id'])->delete();

            return response()->json(['succes' => 'Quote deleted']);
        } else {

            return response()->json(['error' => 'Unauthorized']);
        }
    }
}
