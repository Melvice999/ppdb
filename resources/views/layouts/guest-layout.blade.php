<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_smk.ico') }}" type="image/x-icon">
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

<body class="font-sen bg-l-sky-blue" id="up">
    @include('navbar.guest-navbar')
    <div class="overflow-hidden min-h-screen relative">
        @yield('content')
        <div class="mb-24 max-md:mb-80 max-lg:mb-40"></div>

        <div class="absolute bottom-0 w-full bg-d-green text-white py-2 pl-10 pr-10">
            <div class="flex justify-between border-b border-white font-bold py-2">
                <div>
                    SMK MA'ARIF NU DORO
                </div>
                <div>
                    <a href="#up">
                        <i class="fa-solid fa-arrow-up"></i>
                        <span>UP</span>
                    </a>
                </div>
            </div>

            @foreach ($pengaturan as $item)
                <div class="flex">Kontak Kami <span class="block ms-2 mb-2">:</span></div>
                <div class="grid grid-cols-2 py-2 max-md:text-sm max-md:block">

                    <table>

                        <td class="flex items-center">
                            <i class="fa-brands fa-whatsapp w-5"></i>
                            <div class="text-base ms-2">{{ $item->wa }}</div>
                        </td>

                        <td class="flex items-center">
                            <i class="fa-brands fa-instagram w-5"></i>
                            <div class="text-base ms-2">{{ $item->ig }}</div>
                        </td>

                        <td class="flex items-center">
                            <i class="fa-brands fa-facebook w-5"></i>
                            <div class="text-base ms-2">{{ $item->fb }}</div>
                        </td>

                        <td class="flex items-center">
                            <i class="fa-solid fa-earth-asia w-5"></i>
                            <div class="text-base ms-2">{{ $item->web }}</div>
                        </td>

                        <td class="flex items-center">
                            <i class="fa-brands fa-youtube w-5"></i>
                            <div class="text-base ms-2">{{ $item->yt }}</div>
                        </td>

                        <td class="flex items-center">
                            <i class="fa-solid fa-location-dot w-5"></i>
                            <div class="text-base ms-2">{{ $item->map }}</div>
                        </td>

                    </table>

                    <iframe class="justify-self-end w-64 h-36 rounded-xl max-md:mt-4"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15839.26412390808!2d109.6897945!3d-7.0308979!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7018ea59978517%3A0x39a4f7ba92c82aa0!2sSMK%20MAARIF%20NU%20DORO!5e0!3m2!1sid!2sid!4v1709352682720!5m2!1sid!2sid"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            @endforeach
        </div>

        <script type="module">
            $(document).ready(function() {
                // Open Nav Menu
                $("#nav_hidden").click(function() {
                    $("#nav_hidden").removeClass("md:hidden").addClass("hidden")
                    $("#nav_open").removeClass("hidden").addClass("md:hidden")
                    $("#menu_nav_open").removeClass("max-md:hidden").addClass("max-md:block")
                    // overflow di saat nav open
                    $(".overflow-hidden").addClass("max-md:mt-52")
                    // $("#ppdb1").addClass("max-md:mt-64")
                    // $("#ppdb2").addClass("max-md:mt-64")
                    // navigasi up and down daftar
                    $("#navigasi").addClass("hidden")
                })
                // Close Nav Menu
                $("#nav_open").click(function() {
                    $("#nav_open").removeClass("md:hidden").addClass("hidden")
                    $("#nav_hidden").removeClass("hidden").addClass("md:hidden")
                    $("#menu_nav_open").removeClass("max-md:block").addClass("max-md:hidden")
                    // overflow di animasi awan beranda guest
                    $(".overflow-hidden").removeClass("max-md:mt-52")
                    // $("#ppdb1").removeClass("max-md:mt-64")
                    // $("#ppdb2").removeClass("max-md:mt-64")
                    // navigasi up and down daftar
                    $("#navigasi").removeClass("hidden")
                })
            })
        </script>
</body>

</html>
