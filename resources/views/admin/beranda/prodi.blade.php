@extends('layouts.admin-layout')
@section('content')
    <div class=" text-2xl font-medium">Admin / Beranda /
        {{ $programStudy == 'admin-beranda-tkro'
            ? 'TKRO'
            : ($programStudy == 'admin-beranda-tbsm'
                ? 'TBSM'
                : ($programStudy == 'admin-beranda-tkj'
                    ? 'TKJ'
                    : ($programStudy == 'admin-beranda-akl'
                        ? 'AKL'
                        : ''))) }}
    </div>

    <div class="mt-10">Data Validasi</div>
    <div class="grid grid-cols-2 w-full gap-10 mt-3 max-md:grid-cols-1">

        <div class="grid w-full bg-d-green text-white rounded-lg p-3 cursor-pointer" id="prodi1toggle">
            <div class="flex">
                <i class="fa-solid fa-check border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl">
                    {{ $programStudy == 'admin-beranda-tkro'
                        ? $statusTkro1
                        : ($programStudy == 'admin-beranda-tbsm'
                            ? $statusTbsm1
                            : ($programStudy == 'admin-beranda-tkj'
                                ? $statusTkj1
                                : ($programStudy == 'admin-beranda-akl'
                                    ? $statusAkl1
                                    : ''))) }}
                    <div class="text-sm">
                        Tervalidasi
                    </div>
                </div>
            </div>
        </div>

        <div class="grid w-full bg-red text-white rounded-lg p-3 cursor-pointer" id="prodi0toggle">
            <div class="flex">
                <i class="fa-solid fa-exclamation border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl">
                    {{ $programStudy == 'admin-beranda-tkro'
                        ? $statusTkro0
                        : ($programStudy == 'admin-beranda-tbsm'
                            ? $statusTbsm0
                            : ($programStudy == 'admin-beranda-tkj'
                                ? $statusTkj0
                                : ($programStudy == 'admin-beranda-akl'
                                    ? $statusAkl0
                                    : ''))) }}
                    <div class="text-sm">
                        Belum Tervalidasi
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10 hidden" id="prodi0validate">
        <div>PPDB Tahun {{ now()->year }} Program Keahlian
            {{ $programStudy == 'admin-beranda-tkro'
                ? 'TKRO'
                : ($programStudy == 'admin-beranda-tbsm'
                    ? 'TBSM'
                    : ($programStudy == 'admin-beranda-tkj'
                        ? 'TKJ'
                        : ($programStudy == 'admin-beranda-akl'
                            ? 'AKL'
                            : ''))) }}
            - Belum Tervalidasi</div>
        <div class="overflow-x-auto">
            <table class="bg-white rounded-lg mt-3 table-auto text-center min-w-full">
                <thead>
                    <tr class="border-b border-d-green">
                        <th class="py-2 px-4">NIK</th>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">Prodi</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programStudy == 'admin-beranda-tkro' ? $calonSiswaTkro : ($programStudy == 'admin-beranda-tbsm' ? $calonSiswaTbsm : ($programStudy == 'admin-beranda-tkj' ? $calonSiswaTkj : ($programStudy == 'admin-beranda-akl' ? $calonSiswaAkl : []))) as $siswa)
                        @if ($siswa->status === 0)
                            <tr class="border-b border-d-green">
                                <td class="py-2 px-4">{{ $siswa->nik }}</td>
                                <td class="py-2 px-4">{{ $siswa->nama }}</td>
                                <td class="py-2 px-4">{{ $siswa->prodi }}</td>
                                <td class="py-2 px-4 text-2xl">
                                    <div class="flex justify-center items-center  gap-5">
                                        <i class="fa-solid fa-eye text-blue hover:opacity-70 cursor-pointer"></i>
                                        <i class="fa-solid fa-pen-to-square text-grey hover:opacity-70 cursor-pointer"></i>
                                        <i
                                            class="fa-solid fa-square-check text-d-green hover:opacity-70 cursor-pointer"></i>
                                        <i class="fa-solid fa-square-minus text-red hover:opacity-70 cursor-pointer"></i>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-10 hidden" id="prodi1validate">
        <div>PPDB Tahun {{ now()->year }} Program Keahlian
            {{ $programStudy == 'admin-beranda-tkro'
                ? 'TKRO'
                : ($programStudy == 'admin-beranda-tbsm'
                    ? 'TBSM'
                    : ($programStudy == 'admin-beranda-tkj'
                        ? 'TKJ'
                        : ($programStudy == 'admin-beranda-akl'
                            ? 'AKL'
                            : ''))) }}
            - Sudah Tervalidasi</div>
        <div class="overflow-x-auto">
            <table class="bg-white rounded-lg mt-3 table-auto text-center min-w-full">
                <thead>
                    <tr class="border-b border-d-green">
                        <th class="py-2 px-4">NIK</th>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">Prodi</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programStudy == 'admin-beranda-tkro' ? $calonSiswaTkro : ($programStudy == 'admin-beranda-tbsm' ? $calonSiswaTbsm : ($programStudy == 'admin-beranda-tkj' ? $calonSiswaTkj : ($programStudy == 'admin-beranda-akl' ? $calonSiswaAkl : []))) as $siswa)
                        @if ($siswa->status === 1)
                            <tr class="border-b border-d-green">
                                <td class="py-2 px-4">{{ $siswa->nik }}</td>
                                <td class="py-2 px-4">{{ $siswa->nama }}</td>
                                <td class="py-2 px-4">{{ $siswa->prodi }}</td>
                                <td class="py-2 px-4 text-2xl">
                                    <div class="flex justify-center items-center  gap-5">
                                        <i class="fa-solid fa-eye text-blue hover:opacity-70 cursor-pointer"></i>
                                        <i class="fa-solid fa-pen-to-square text-grey hover:opacity-70 cursor-pointer"></i>
                                        <i class="fa-solid fa-square-minus text-red hover:opacity-70 cursor-pointer"></i>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="module">
        $(document).ready(function() {
            let showValidate = $('#prodi1validate');
            let showNoValidate = $('#prodi0validate');
            let toggleValidate = $('#prodi1toggle');
            let toggleNoValidate = $('#prodi0toggle');

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
