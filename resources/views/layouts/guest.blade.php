<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
        <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/listing-style.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Scripts -->

        <script src="{{ asset('js/owl.js') }}" defer></script>
        <script src="{{ asset('js/select2.min.js') }}" defer></script>
        <script src="{{ asset('js/script.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased bcvbv">
            @include('components.header')
            {{ $slot }}
            @include('components.footer')
        </div>
    </body>
</html>
