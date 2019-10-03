@extends('layouts.app')

@section('content')

    <div class="px-4 pt-3 pb-2 h3 dark-blue2">
        Settings
    </div>
    <div class="bg-white border border-light shadow mx-5 mb-5 p-5 h2">
        <h2>Quotes scheduler:</h2><br>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="d-flex">
            <h3 class="px-3 pt-1">Daily at: </h3>
            <form action="{{ route('scheduler') }}" method="POST">
                @csrf
                <select class="dropdown btn border border-secondary" name="hour" class="form-control w-25">
                    <option selected disabled>Select hour</option>
                    <option value="00:00">00:00h</option>
                    <option value="01:00">01:00h</option>
                    <option value="02:00">02:00h</option>
                    <option value="03:00">03:00h</option>
                    <option value="04:00">04:00h</option>
                    <option value="05:00">05:00h</option>
                    <option value="06:00">06:00h</option>
                    <option value="07:00">07:00h</option>
                    <option value="08:00">08:00h</option>
                    <option value="09:00">09:00h</option>
                    <option value="10:00">10:00h</option>
                    <option value="11:00">11:00h</option>
                    <option value="12:00">12:00h</option>
                    <option value="13:00">13:00h</option>
                    <option value="14:00">14:00h</option>
                    <option value="15:00">15:00h</option>
                    <option value="16:00">16:00h</option>
                    <option value="17:00">17:00h</option>
                    <option value="18:00">18:00h</option>
                    <option value="19:00">19:00h</option>
                    <option value="20:00">20:00h</option>
                    <option value="21:00">21:00h</option>
                    <option value="22:00">22:00h</option>
                    <option value="23:00">23:00h</option>
                </select>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>

@endsection