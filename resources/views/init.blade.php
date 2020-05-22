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
                <h1 class="display-3">Success!</h1>
                <p>South African Public Holidays have been retrieved.</p>
                <p>
                    <a class="btn btn-primary btn-lg" href="{{ url('/') }}" role="button">Go Home</a>
                    <a class="btn btn-primary btn-lg" href="{{ url('holidays') }}" role="button">View Holidays</a>
                </p>
            </div>
        </div>
        <!-- scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
