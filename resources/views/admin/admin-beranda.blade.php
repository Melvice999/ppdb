<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @import url('https://fonts.cdnfonts.com/css/sen');
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Menggunakan CDN untuk Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>ABC</title>

</head>

<body class="min-h-screen bg-l-sky-blue font-sen">
    <nav
        class="fixed top-0 left-0 h-full px-2 py-2 z-50 bg-d-green text-white w-60 max-md:block max-md:w-full max-md:h-16">
        <header class="relative">
            <div class="flex items-center pb-4 w-11/12">
                <span class="flex items-center justify-center min-w-16">
                    <img src="{{ asset('asset/img/logo_smk.png') }}" alt="" class="w-10 rounded-md me-2">
                </span>

                <img src="{{ asset('asset/img/logo_smk.png') }}" alt="" class="w-10 rounded-md ms-4 hidden"
                    id="logo_close">

                <div class="whitespace-nowrap flex flex-col">
                    <span class="mt-1 text-lg font-semibold">PPDB</span>
                    <span class="-mt-1 block text-sm">SMK Ma'arif
                        Nu Doro</span>
                </div>
            </div>

            <i class="fa-solid fa-bars text-3xl absolute top-2 right-4 invisible max-md:visible"></i>

            <i class="fa-solid fa-circle-chevron-right absolute top-8 -right-6 translate-y-1/2 rotate-180 h-8 w-8 bg-white text-d-green rounded-full flex items-center justify-center text-2xl cursor-pointer max-md:hidden"
                id="nav_toggle"></i>
        </header>

        <div class="flex flex-col justify-between mx-4">

            <ul class="mt-5 max-md:hidden">
                <li class="flex items-center mt-3 h-14 px-4 cursor-pointer bg-l-sky-blue rounded-2xl">
                    <div href="">
                        <i class="fa-solid fa-magnifying-glass min-w-16 text-lg me-3 text-d-green"></i>
                        <input type="text" placeholder="Cari..."
                            class="w-4/6 text-base text-black font-medium outline-none border-none bg-l-sky-blue">
                    </div>
                </li>

                <li
                    class="border border-opacity-50 border-white flex items-center mt-3 h-14 px-4 hover:bg-white hover:text-d-green rounded-2xl">
                    <a href="#" class="flex items-center w-full rounded-md">
                        <i class="fa-solid fa-house min-w-16 text-lg"></i>
                        <span class="whitespace-nowrap">&nbsp;&nbsp;&nbsp; Beranda</span>
                    </a>
                </li>

                <li
                    class="border border-opacity-50 border-white flex items-center mt-3 h-14 px-4 hover:bg-white hover:text-d-green rounded-2xl">
                    <a href="#" class="flex items-center w-full rounded-md">
                        <i class="fa-solid fa-file min-w-16 text-lg"></i>
                        <span class="whitespace-nowrap">&nbsp;&nbsp;&nbsp; Data Siswa</span>
                    </a>
                </li>

                <li
                    class="border border-opacity-50 border-white flex items-center mt-3 h-14 px-4 hover:bg-white hover:text-d-green rounded-2xl">
                    <a href="#" class="flex items-center w-full rounded-md">
                        <i class="fa-solid fa-gear min-w-16 text-lg"></i>
                        <span class="whitespace-nowrap">&nbsp;&nbsp;&nbsp; Edit Informasi</span>
                    </a>
                </li>

                <li class="absolute border border-opacity-50 border-whiter-d-green bottom-5 h-14 px-4 w-4/5 hover:bg-white hover:text-d-green rounded-2xl max-md:w-11/12 max-md:left-5"
                    id="logout">
                    <a href="#" class="rounded-md">
                        <i class="fa-solid fa-right-from-bracket min-w-16 text-lg mt-3"></i>
                        <span class="whitespace-nowrap">&nbsp;&nbsp;&nbsp;
                            Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <section class="absolute top-0 left-60 h-screen py-3 px-14 max-md:top-20 max-md:left-0">
        <div class="w-full text-2xl font-medium pb-10">Admin / Beranda</div>

        <div class="">Program Keahlian</div>
        <div class="grid grid-cols-3 w-full gap-10 mt-3 max-md:grid-cols-1">
            <div class="border p-5 flex items-center">
                <i
                    class="fa-solid fa-wrench border rounded-full p-2 flex items-center justify-center me-3 max-lg:hidden"></i>
                Teknik dan Bisnis Sepeda Motor
            </div>
            <div class="border p-5 flex items-center">
                <i
                    class="fa-solid fa-wifi border rounded-full p-2 flex items-center justify-center me-3 max-lg:hidden"></i>
                Teknik Komputer dan Jaringan
            </div>
            <div class="border p-5 flex items-center ">
                <i
                    class="fa-solid fa-laptop border rounded-full p-2 flex items-center justify-center me-3 max-lg:hidden"></i>
                Akuntansi dan Keuangan Lembaga
            </div>
        </div>


        <div class="mt-4">Data Validasi</div>
        <div class="grid grid-cols-2 w-full gap-10 mt-3 max-md:grid-cols-1">
            <div class="border p-5 flex items-center">
                <i
                    class="fa-solid fa-check border rounded-full p-2 flex items-center justify-center me-3 max-lg:hidden max-md:flex"></i>
                Tervalidasi
            </div>
            <div class="border p-5 flex items-center">
                <i
                    class="fa-solid fa-exclamation border rounded-full p-2 w-9 flex items-center justify-center me-3 max-lg:hidden"></i>
                Belum Tervalidasi
            </div>
        </div>
        <div class="my-4">
            Statistik Pendaftar
        </div>
        <div class="w-full gap-10 max-md:grid-cols-1 border">
         

            <canvas id="pendaftarChart" class="w-full pt-11 pb-8 px-5"></canvas>

        </div>

    </section>
    <script>
        // Ambil referensi canvas
        var ctx = document.getElementById('pendaftarChart').getContext('2d');

        // Data Pendaftar Pertahun
        var data = {
            labels: ['Tahun 2020', 'Tahun 2021', 'Tahun 2022'],
            datasets: [{
                // label: display: false,
                data: [500, 800, 1200], // Ganti ini dengan data pendaftar aktual
                textColor: 'white',
                backgroundColor: 'black',
                borderColor: 'black',
                borderWidth: 1
            }]
        };

        // Konfigurasi Chart
        var config = {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                        labels: {
                            font: {
                                size: 15
                            },
                            color: 'black',

                        }
                    }
                }
            }
        };

        // Buat Chart
        var myChart = new Chart(ctx, config);
    </script>

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
                    $("nav span").addClass("invisible");
                    $("nav input").addClass('hidden');
                    $("nav").removeClass('w-60').addClass('w-24');
                    $("#logout").removeClass("w-4/5").addClass("w-12");
                    $("#logo_close").removeClass("hidden");
                    $("section").removeClass("left-60").addClass("left-20");
                } else {
                    // Open Nav Menu
                    navToggle.removeClass(openToggle).addClass(closeToggle);
                    $("nav span").removeClass("invisible");
                    $("nav input").removeClass('hidden');
                    $("nav").removeClass('w-24').addClass('w-60');
                    $("#logout").removeClass("w-12").addClass("w-4/5");
                    $("#logo_close").addClass("hidden");
                    $("section").removeClass("left-20").addClass("left-60");
                }
            });
        });
    </script>

</body>

</html>

</body>

</html>
