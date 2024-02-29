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

            <div class="flex py-2 max-md:text-sm max-md:block">
                <div class="flex">Kontak Kami <span class="hidden ms-2 max-md:block">:</span></div>
                <div class="flex text-xl ms-10 max-md:text-sm max-md:block max-md:ms-0 max-md:mt-2">
                    <i class="fa-solid fa-minus rotate-90 me-2 max-md:hidden"></i>
                    <a href="" class="me-3 flex items-center">
                        <i class="fa-brands fa-whatsapp"></i>
                        <div class="text-base ms-2">whatsapp</div>
                    </a>
                    <a href="" class="me-3 flex items-center">
                        <i class="fa-brands fa-instagram"></i>
                        <div class="text-base ms-2">instagram</div>
                    </a>

                    <a href="" class="me-3 flex items-center">
                        <i class="fa-brands fa-facebook"></i>
                        <div class="text-base ms-2">facebook</div>
                    </a>
                    <a href="" class="me-3 flex items-center">
                        <i class="fa-solid fa-earth-asia"></i>
                        <div class="text-base ms-2">website</div>
                    </a>

                    <a href="" class="me-3 flex items-center">
                        <i class="fa-brands fa-youtube"></i>
                        <div class="text-base ms-2">youtube</div>
                    </a>
                    <a href="" class="me-3 flex items-center">
                        <i class="fa-solid fa-location-dot"></i>
                        <div class="text-base ms-2">maps</div>
                    </a>
                </div>
            </div>
            {{--             
            <div class="max-md:max-w-md mx-auto">
                
                <div class="flex">
                    <div class="w-1/2">

                        SMK MAARIF NU adalah sekolah dibawah naungan LP MAARIF NU Kecamatan Doro dengan visi MANTAB
                        (Mandiri
                        Terampil dan Berakhlaqul karimah). Sekolah unggulan dengan program studi Teknik Bisnis Sepeda
                        Motor,
                        Teknik Komputer dan Jaringan, serta Akuntansi Keuangan Lembaga
                    </div>
                    <div>
                        Jl. Raya Doro-Jolotigo, Doro, Kec. Doro, Kab. Pekalongan Prov. Jawa Tengah
                    </div>
                </div>
            </div>
        </div> --}}
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
