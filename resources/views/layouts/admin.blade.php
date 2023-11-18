<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - @yield('title') </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- datatabel -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">

    <x-sidebar-admin />

    <div class="min-h-screen bg-gray-100">
        <main>
            {{ $slot }}
        </main>
    </div>


    @stack('modals')

    @livewireScripts

    <script>
        $('#hidden_fields').css('display', 'none'); // Hide the text input box in default
        function myFunction() {
            if ($('#trigger').prop('checked')) {
                $('#hidden_fields').css('display', 'block');
            } else {
                $('#hidden_fields').css('display', 'none');
            }
        }
        var DataTable = require('datatables.net');
        require('datatables.net-responsive');

        let table = new DataTable('#myTable', {
            responsive: true
        });
    </script>
</body>

</html>