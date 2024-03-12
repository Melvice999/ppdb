@extends('layouts.headmaster-layout')
@section('content')
    <div class="w-full text-2xl font-medium">Headmaster / Beranda</div>

    {{-- deklarasi tahun --}}
    @php
        $startYear = now()->year;
        $endYear = $startYear - 4;
        $yearRange = range($endYear, $startYear);
        $labels = json_encode($yearRange);
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
                    data: [12, 19, 3, 5, 2, 3],
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
