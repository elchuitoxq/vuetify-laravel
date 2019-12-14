<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app1.css') }}" rel="stylesheet">
    </head>
    <body>
        <v-app id="app">
            <app :auth="{{Auth::user() ? Auth::user() : 'false'}}"></app>
        </v-app>
        <script src="{{ asset('js/app1.js') }}"></script>
    </body>
</html>