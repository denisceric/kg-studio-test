@extends('layouts.app')

@section('content')

    <div class="px-4 pt-3 pb-2 h3 dark-blue2">
        Dashboard
    </div>
    <div class="bg-white border border-light d-flex p-5 shadow mx-5 mb-5">
        <div class="col-6 text-center h2 bg-primary text-white p-4 mr-2 rounded">
            Customers: <br>
            {{ $customers }}
        </div>
        <div class="col-6 text-center h2 bg-success text-white p-4 ml-1 rounded">
            Quotes: <br>
            {{ $quotes }}
        </div>
    </div>

@endsection
