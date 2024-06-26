<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_smk.ico') }}" type="image/x-icon">
    <title> {{$title}} </title>

    <style>
        @import url('https://fonts.cdnfonts.com/css/sen');
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- chartjs --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>ini beranda headmaster </title>

</head>

<body class="min-h-screen bg-l-sky-blue font-sen">

    @include('navbar.headmaster-navbar')

    <section class="mt-0 ml-60 h-screen py-3 px-10 max-md:mt-20 max-md:ml-0 max-md:w-full">
        @yield('content')
        <div class="pt-10"></div>
    </section>

</body>

