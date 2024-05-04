@extends('layouts.headmaster-layout')
@section('content')
    <div class="w-full text-2xl font-medium">Headmaster / Beranda</div>

    {{-- deklarasi tahun --}}
    @php
        $startYear = now()->year;
        $endYear = $startYear - 4;

        $yearRange = range($endYear, $startYear);

        $labels = json_encode($yearRange);

        use App\Models\CalonSiswa; // Pastikan Anda mengimpor namespace model jika belum melakukannya

        // Hitung jumlah calon siswa untuk setiap tahun
        $pertama = CalonSiswa::where('notifikasi_admin', 'Lulus Ujian')->where('tahun_daftar', $startYear - 4)->count();
        $kedua = CalonSiswa::where('notifikasi_admin', 'Lulus Ujian')->where('tahun_daftar', $startYear - 3)->count();
        $ketiga = CalonSiswa::where('notifikasi_admin', 'Lulus Ujian')->where('tahun_daftar', $startYear - 2)->count();
        $keempat = CalonSiswa::where('notifikasi_admin', 'Lulus Ujian')->where('tahun_daftar', $startYear - 1)->count();
        $kelima = CalonSiswa::where('notifikasi_admin', 'Lulus Ujian')->where('tahun_daftar', $startYear)->count();

        // Format data untuk grafik
        $dataFromDatabase = [$pertama, $kedua, $ketiga, $keempat, $kelima];

        $dataFormatted = json_encode($dataFromDatabase);
    @endphp


    <div class="w-full mt-10">
        PPDB Tahun {{ $endYear }} - {{ $startYear }}
    </div>

    <canvas id="myChart" class="w-full mt-2"></canvas>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! $labels !!},
                datasets: [{
                    label: '',
                    data: {!! $dataFormatted !!},
                    borderWidth: 2,
                    backgroundColor: 'rgba(115, 202, 24, 0.2)',
                    borderColor: 'rgba(115, 202, 24)',

                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
