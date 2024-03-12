<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_smk.ico') }}" type="image/x-icon">

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
    </section>

</body>



{{-- Script Navbar --}}
<script type="module">
    $(document).ready(function() {
        let closeToggle = "fa-circle-chevron-right";
        let openToggle = "fa-circle-chevron-left";
        let navToggle = $("#nav_toggle")
        // Toggle Nav Menu
        navToggle.click(function() {
            if (navToggle.hasClass(closeToggle)) {
                // Close Nav Menu
                navToggle.removeClass(closeToggle).addClass(openToggle);
                $("nav span").addClass("invisible max-md:visible");
                $("nav input").addClass('hidden max-md:block');
                $("nav").removeClass('w-60').addClass('w-24');
                $("#logout").removeClass("w-4/5").addClass("w-12");
                $("#logo_close").removeClass("hidden");
                $("section").removeClass("ml-60").addClass("ml-20");
            } else {
                // Open Nav Menu
                navToggle.removeClass(openToggle).addClass(closeToggle);
                $("nav span").removeClass("invisible max-md:visible");
                $("nav input").removeClass('hidden max-md:block');
                $("nav").removeClass('w-24').addClass('w-60');
                $("#logout").removeClass("w-12").addClass("w-4/5");
                $("#logo_close").addClass("hidden");
                $("section").removeClass("ml-20").addClass("ml-60");
            }
        });

        let navToggleMobile = $("#nav_toggle_mobile")
        navToggleMobile.click(function() {
            if ($("nav ul").hasClass("max-md:hidden")) {
                navToggleMobile.removeClass("fa-bars")
                navToggleMobile.addClass("fa-xmark")
                $("nav ul").removeClass("max-md:hidden")
                $("nav").removeClass("max-md:h-16").addClass("max-md:h-full")
                $("section").addClass("max-md:hidden")
            } else {
                navToggleMobile.removeClass("fa-xmark")
                navToggleMobile.addClass("fa-bars")
                $("nav ul").addClass("max-md:hidden")
                $("nav").removeClass("max-md:h-full").addClass("max-md:h-16")
                $("section").removeClass("max-md:hidden")
            }

        })
    });
</script>

</html>
