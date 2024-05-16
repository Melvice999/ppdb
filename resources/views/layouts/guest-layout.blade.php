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

<body class="font-sen bg-l-sky-blue" id="top">

    @include('navbar.guest-navbar')

    <div class="overflow-hidden min-h-screen relative" id="content">
        @yield('content')
    </div>

    <div class="mb-20"></div>

    <footer class="w-full absolute bg-d-green text-white py-2 px-10 max-[375px]:px-3 max-[375px]:text-xs">

        <div class="flex justify-between border-b border-white font-bold py-2">
            <div>
                SMK MA'ARIF NU DORO
            </div>
            <div>
                <div class="scroll-up cursor-pointer">
                    <i class="fa-solid fa-arrow-up"></i>
                    <span>UP</span>
                </div>
            </div>
        </div>

        @foreach ($pengaturan as $item)
            <div class="flex mt-2">Kontak Kami <span class="block ms-2 mb-2">:</span></div>
            <div class="grid grid-cols-2 py-2 max-md:w-full max-md:text-sm max-md:block">

                <table>

                    <td class="flex items-center">
                        <i class="fa-brands fa-whatsapp w-5"></i>
                        <a href="https://wa.me/+62{{ $item->wa }}">
                            <div class="ms-2">{{ $item->wa }}</div>
                        </a>
                    </td>

                    <td class="flex items-center">
                        <i class="fa-brands fa-instagram w-5"></i>
                        <a href="https://www.instagram.com/{{ $item->ig }}">
                            <div class="ms-2">{{ $item->ig }}</div>
                        </a>
                    </td>

                    <td class="flex items-center">
                        <i class="fa-brands fa-facebook w-5"></i>
                        <a href="https://www.facebook.com/{{ $item->fb }}">
                            <div class="ms-2">{{ $item->fb }}</div>
                        </a>
                    </td>

                    <td class="flex items-center">
                        <i class="fa-solid fa-earth-asia w-5"></i>
                        <a href="https://{{ $item->web }}">
                            <div class="ms-2">{{ $item->web }}</div>
                        </a>
                    </td>

                    <td class="flex items-center">
                        <i class="fa-brands fa-youtube w-5"></i>
                        <a href="https://www.youtube.com/{{ $item->yt }}">
                            <div class="ms-2">{{ $item->yt }}</div>
                        </a>
                    </td>

                    <td class="flex items-center">
                        <i class="fa-solid fa-location-dot w-5"></i>
                        <div class="ms-2">{{ $item->map }}</div>
                    </td>

                </table>

                <iframe class="justify-self-end w-64 h-36 rounded-xl max-md:mt-4 max-[375px]:w-56"
                    src="{{ $item->link_map }}" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        @endforeach
    </footer>

    <script type="module">
        $(document).ready(function() {

            $('.scroll-up').on('click', function(e) {
                e.preventDefault();
                var target = '#top'; 
                $('html, body').animate({
                    scrollTop: $(target).offset().top
                }, 1000);
            });


            // Open Nav Menu
            $("#nav_hidden").click(function() {
                $("#nav_hidden").removeClass("md:hidden").addClass("hidden")
                $("#nav_open").removeClass("hidden").addClass("md:hidden")
                $("#menu_nav_open").removeClass("max-md:hidden").addClass("max-md:block")

                // overflow di saat nav open
                $("#content").addClass("max-md:mt-32")

                // navigasi up and down daftar
                $("#navigasi").addClass("hidden")
            })
            // Close Nav Menu
            $("#nav_open").click(function() {
                $("#nav_open").removeClass("md:hidden").addClass("hidden")
                $("#nav_hidden").removeClass("hidden").addClass("md:hidden")
                $("#menu_nav_open").removeClass("max-md:block").addClass("max-md:hidden")

                // overflow di animasi awan beranda guest
                $("#content").removeClass("max-md:mt-32")

                // navigasi up and down daftar
                $("#navigasi").removeClass("hidden")
            })
        })
    </script>
</body>

</html>
