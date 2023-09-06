<!DOCTYPE html>
<?php
    use App\Models\cars;

    $cars = cars::join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')
                ->where('havebeenchecked','<>',1)
                ->get();
    $fcars = cars::join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')
    ->where('havebeenchecked',"=",1)
    ->where('havebeenpassed',"=",0)
    ->get();
    $pcars = cars::join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')
    ->where('havebeenchecked',"=",1)
    ->where('havebeenpassed',"=",1)
    ->get();
    $carscount = (count($cars)>0)?count($cars):0;
    $failedcars = (count($fcars)>0)?count($fcars):0;
    $passedcars = (count($pcars)>0)?count($pcars):0;


  ?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css"  rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation',['count'=>$carscount,'failedcount'=>$failedcars,'passcount'=>$passedcars])

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    </body>
</html>
