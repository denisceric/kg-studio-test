<html>
    <head>
    </head>
    <body>
        <div style="text-align:center;font-family:Arial">
            @if(isset($quote))
            <h1> {{ $quote->quote }}</h1>
            <h2> {{ $quote->author }}</h2>
            @else
            <h1>More quotes coming soon!</h1>
            @endif
        </div>
    </body>
</html>