<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('asset/img/logo_smk.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>

    <!-- Styles -->
    <style>
        /* Font */
        @import url('https://fonts.googleapis.com/css2?family=Aldrich&display=swap');
        @import url('https://fonts.cdnfonts.com/css/sen');

        /* Agar input type number tidak ada up and down */
        @layer base {

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        }

        /* Animasi Awan */
        @keyframes awan {
            0% {
                transform: translateX(-200%);
            }

            100% {
                transform: translateX(1000%);
            }
        }
    </style>
</head>

<body class="font-sen bg-l-sky-blue">
    @include('navbar.guest-navbar')
    <div class="overflow-hidden">
        @yield('content')
    </div>

    <script type="module">
        $(document).ready(function() {
            // Open Nav Menu
            $("#nav_hidden").click(function() {
                $("#nav_hidden").removeClass("md:hidden").addClass("hidden")
                $("#nav_open").removeClass("hidden").addClass("md:hidden")
                $("#menu_nav_open").removeClass("max-md:hidden").addClass("max-md:block")
                // overflow di saat nav open
                $(".overflow-hidden").addClass("max-md:mt-64")
                $("#ppdb1").addClass("max-md:mt-64")
                $("#ppdb2").addClass("max-md:mt-64")
                // navigasi up and down daftar
                $("#navigasi").addClass("hidden")
            })
            // Close Nav Menu
            $("#nav_open").click(function() {
                $("#nav_open").removeClass("md:hidden").addClass("hidden")
                $("#nav_hidden").removeClass("hidden").addClass("md:hidden")
                $("#menu_nav_open").removeClass("max-md:block").addClass("max-md:hidden")
                // overflow di animasi awan beranda guest
                $(".overflow-hidden").removeClass("max-md:mt-64")
                $("#ppdb1").removeClass("max-md:mt-64")
                $("#ppdb2").removeClass("max-md:mt-64")
                // navigasi up and down daftar
                $("#navigasi").removeClass("hidden")
            })
        })
    </script>
</body>

</html>
