<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Web Admin') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://kit.fontawesome.com/4c657afdc9.js" crossorigin="anonymous"></script>
        <script src="https://cdn.tiny.cloud/1/d2y45evtmwrl9g4lzivvnftsoep3fvw2thh40r8419m3ug2e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    </head>
    <body class="font-sans antialiased bg-light">
        <x-jet-banner />
        @livewire('navigation-menu')

        <!-- Page Heading 
        <header class="d-flex py-2 bg-white shadow-sm border-bottom">
            <div class="container">
                {{ $header }}
            </div>
        </header>-->

        <!-- Page Content -->
        <main class="container my-4">
            {{ $slot }}
        </main>

        @stack('modals')

        @livewireScripts

        @stack('scripts')
    </body>
</html>
