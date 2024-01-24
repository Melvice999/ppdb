@extends('layouts.admin-layout')
@section('content')
    <div class=" text-2xl font-medium">Admin / Beranda / TKRO</div>

    <div class="mt-10">Data Validasi</div>
    <div class="grid grid-cols-2 w-full gap-10 mt-3 max-md:grid-cols-1">

        <div class="grid w-full bg-d-green text-white rounded-lg p-3 cursor-pointer" id="tkro_1toggle">
            <div class="flex">
                <i class="fa-solid fa-check border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl"> {{ $statusc1 }}
                    <div class="text-sm">
                        Tervalidasi
                    </div>
                </div>
            </div>
        </div>

        <div class="grid w-full bg-red text-white rounded-lg p-3 cursor-pointer" id="tkro_0toggle">
            <div class="flex">
                <i class="fa-solid fa-exclamation border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl"> {{ $statusc0 }}
                    <div class="text-sm">
                        Belum Tervalidasi
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10 w-full" id="tkro_0validate">
        <div>PPDB Tahun {{ now()->year }} Program Keahlian TKRO - Belum Tervalidasi</div>
        <table class="bg-white rounded-lg table-auto mt-3">
            <thead>
                <tr class="border-b border-d-green">
                    <th class="py-2 px-4">NIK</th>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">Prodi</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calonSiswa as $siswa)
                    @if ($siswa->status === 0)
                        <tr class="border-b border-d-green">
                            <td class="py-2 px-4">{{ $siswa->nik }}</td>
                            <td class="py-2 px-4">{{ $siswa->nama }}</td>
                            <td class="py-2 px-4">{{ $siswa->prodi }}</td>
                            <td class="py-2 px-4 text-2xl flex gap-5">
                                <i class="fa-solid fa-eye text-blue hover:opacity-70 cursor-pointer"></i>
                                <i class="fa-solid fa-square-check text-d-green hover:opacity-70 cursor-pointer"></i>
                                <i class="fa-solid fa-square-minus text-red hover:opacity-70 cursor-pointer"></i>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-10 w-full" id="tkro_1validate">
        <div>PPDB Tahun {{ now()->year }} Program Keahlian TKRO - Sudah Tervalidasi</div>
        <table class="bg-white rounded-lg table-auto mt-3">
            <thead>
                <tr class="border-b border-d-green">
                    <th class="py-2 px-4">NIK</th>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">Prodi</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calonSiswa as $siswa)
                    @if ($siswa->status === 1)
                        <tr class="border-b border-d-green">
                            <td class="py-2 px-4">{{ $siswa->nik }}</td>
                            <td class="py-2 px-4">{{ $siswa->nama }}</td>
                            <td class="py-2 px-4">{{ $siswa->prodi }}</td>
                            <td class="py-2 px-4 text-2xl flex gap-5">
                                <i class="fa-solid fa-eye text-blue hover:opacity-70 cursor-pointer"></i>
                                <i class="fa-solid fa-square-minus text-red hover:opacity-70 cursor-pointer"></i>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="module">
        $(document).ready(function() {
            let showValidate = $('#tkro_1validate');
            let showNoValidate = $('#tkro_0validate');
            let toggleValidate = $('#tkro_1toggle');
            let toggleNoValidate = $('#tkro_0toggle');

            toggleValidate.click(function() {
                showValidate.removeClass("hidden");
                showNoValidate.addClass("hidden");
            });

            toggleNoValidate.click(function() {
                showNoValidate.removeClass("hidden");
                showValidate.addClass("hidden");
            });
        });
    </script>
@endsection
