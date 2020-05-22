<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME', 'Holidays Apps') }}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Hello, welcome to the holiday app!</h1>
                <p>Please click one of the buttons to indicate how you'd like to proceed.</p>
                <p>
                    <a class="btn btn-primary btn-lg" href="{{ url('init') }}" role="button">Initiate App</a>
                    <a class="btn btn-primary btn-lg" href="{{ url('holidays') }}" role="button">View Holidays</a>
                    <a class="btn btn-primary btn-lg" href="{{ url('generatePDF') }}" role="button">Download PDF</a>
                </p>
            </div>
        </div>
        <!-- scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
