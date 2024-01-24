@extends('layouts.admin-layout')
@section('content')
    <div class="w-full text-2xl font-medium">Admin / Beranda</div>

    <div class="mt-10">Program Keahlian</div>
    <div class="grid grid-cols-4 w-full gap-10 mt-3 max-md:grid-cols-1 max-lg:grid-cols-2">

        <a href="{{ route('admin-beranda-tbsm') }}" class="grid w-full bg-d-green text-white rounded-lg p-3">
            <div class="flex">
                <i class="fa-solid fa-wrench border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl"> {{ $tbsm }}
                    <div class="text-sm">
                        Teknik dan Bisnis Sepeda Motor
                    </div>
                </div>
            </div>
        </a>

        <a href="{{ route('admin-beranda-tkro') }}" class="grid w-full bg-d-green text-white rounded-lg p-3">
            <div class="flex">
                <i class="fa-solid fa-cogs border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl"> {{ $tkro }}
                    <div class="text-sm">
                        Teknik Kendaraan Ringan Otomotif
                    </div>
                </div>
            </div>
        </a>


        <a href="{{ route('admin-beranda-tkj') }}" class="grid w-full bg-d-green text-white rounded-lg p-3">
            <div class="flex">
                <i class="fa-solid fa-wifi border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl"> {{ $tkj }}
                    <div class="text-sm">
                        Teknik Komputer dan Jaringan
                    </div>
                </div>
            </div>
        </a>

        <a href="{{ route('admin-beranda-akl') }}" class="grid w-full bg-d-green text-white rounded-lg p-3">
            <div class="flex">
                <i class="fa-solid fa-laptop border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl"> {{ $akl }}
                    <div class="text-sm">
                        Akuntansi dan Keuangan Lembaga
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="mt-10">Data Validasi</div>
    <div class="grid grid-cols-2 w-full gap-10 mt-3 max-md:grid-cols-1">

        <a href="{{ route('admin-beranda-tervalidasi') }}" class="grid w-full bg-d-green text-white rounded-lg p-3">
            <div class="flex">
                <i class="fa-solid fa-check border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl"> {{ $status1 }}
                    <div class="text-sm">
                        Tervalidasi
                    </div>
                </div>
            </div>
        </a>

        <a href="{{ route('admin-beranda-belum-tervalidasi') }}" class="grid w-full bg-red text-white rounded-lg p-3">
            <div class="flex">
                <i class="fa-solid fa-exclamation border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl"> {{ $status0 }}
                    <div class="text-sm">
                        Belum Tervalidasi
                    </div>
                </div>
            </div>
        </a>

    </div>
    <div class="my-4 mt-10">
        Statistik Pendaftar
    </div>
    <div class="w-full rounded-lg bg-white">
        <canvas id="pendaftarChart" class="w-auto pt-11 pb-8 px-5"></canvas>
    </div>

    <div class="h-10"></div>
    <script>
        // Ambil referensi canvas
        var ctx = document.getElementById('pendaftarChart').getContext('2d');

        // Data Pendaftar Pertahun
        var data = {
            labels: ['Tahun 2020', 'Tahun 2021', 'Tahun 2022', 'Tahun 2021', 'Tahun 2022'],
            datasets: [{
                // label: display: false,
                data: [500, 800, 1200, 500, 800, ], // Ganti ini dengan data pendaftar aktual
                backgroundColor: 'green',
                borderColor: 'green',
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
                    }
                }
            }
        };

        // Buat Chart
        var myChart = new Chart(ctx, config);
    </script>
@endsection()
