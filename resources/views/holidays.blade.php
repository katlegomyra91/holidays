<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME', 'Holidays Apps') }}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Holidays</h1>
                    @if(count($holidays) > 0)
                        <p><a type="button" class="btn btn-primary" href="{{ url('generatePDF') }}">Download PDF</a></p>
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                @foreach($holidays as $holiday)
                                    <li class="list-group-item"><p class="mb-0">{{$holiday->date}} | <small>{{$holiday->name}}</small></p class="mb-0"></li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p>No holidays found</p>
                        <a type="button" class="btn btn-primary" href="{{ url('init') }}">Initiate App</a>
                    @endif
                </div>
            </div>
        </div>
        <!-- scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
