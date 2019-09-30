<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    </head>
    <body class="h-100">
        <div id="app">
        <div class="container h-25 d-flex justify-content-center p-5">
            <div class="my-auto text-center">
                <h2 class="display-4">DAILY QUOTES</h2>
                <hr>
                <blockquote class="blockquote w-75 mx-auto bg-light text-dark text-left">
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <footer class="blockquote-footer text-right text-dark"><cite title="Source Title">Cicero</cite></footer>
                </blockquote>
            </div>
        </div>
        <subscribe></subscribe>
        </div>


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
