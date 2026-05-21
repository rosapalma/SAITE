<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SAITE') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

          <link href="{{ asset('css/app.css') }}" rel="stylesheet">
           <link href="{{ asset('css/upel.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
          <link href="{{ asset('css/saite.css') }}" rel="stylesheet">
          <!-- CDN BOOTSTRAP 
             <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-header />


  <div class="">
            {{-- MENU Y USER --}}
            @if(Auth::user())
                @livewire('navigation-menu')
            @endif
            <!-- Page title -->
                {{-- <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $page }}
                    </div>
                </header> --}}
            <!-- Page Content -->
            <main class="">
                {{ $slot }}
            </main>
        </div>






        @stack('modals')

        @livewireScripts

        <!-- <x-footer/> SOLO PARA USUARIO NO AUTH-->
    </body>
</html>
