@extends('layouts.admin-layout')
@section('content')
    <div class=" text-2xl font-medium">Admin / Beranda /
        {{ $programStudy == 'admin-beranda-sudah-tervalidasi'
            ? 'Tervalidasi'
            : ($programStudy == 'admin-beranda-belum-tervalidasi'
                ? 'Belum Tervalidasi'
                : '') }}
    </div>

    <div class="mt-10" id="prodi0validate">
        <div>PPDB Tahun {{ now()->year }}
            {{ $programStudy == 'admin-beranda-sudah-tervalidasi'
                ? 'Tervalidasi'
                : ($programStudy == 'admin-beranda-belum-tervalidasi'
                    ? 'Belum Tervalidasi'
                    : '') }}
        </div>
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
                    @foreach ($programStudy == 'admin-beranda-sudah-tervalidasi' ? $status1 : ($programStudy == 'admin-beranda-belum-tervalidasi' ? $status0 : []) as $siswa)
                        <tr class="border-b border-d-green">
                            <td class="py-2 px-4">{{ $siswa->nik }}</td>
                            <td class="py-2 px-4">{{ $siswa->nama }}</td>
                            <td class="py-2 px-4">{{ $siswa->prodi }}</td>
                            <td class="py-2 px-4 text-2xl">
                                <div class="flex justify-center items-center  gap-5">
                                    <i class="fa-solid fa-eye text-blue hover:opacity-70 cursor-pointer"></i>
                                    <i class="fa-solid fa-pen-to-square text-grey hover:opacity-70 cursor-pointer"></i>
                                    @if ($programStudy == 'admin-beranda-belum-tervalidasi')
                                        <i
                                            class="fa-solid fa-square-check text-d-green hover:opacity-70 cursor-pointer"></i>
                                    @endif
                                    <i class="fa-solid fa-square-minus text-red hover:opacity-70 cursor-pointer"></i>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
