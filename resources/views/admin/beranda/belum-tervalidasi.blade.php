@extends('layouts.admin-layout')
@section('content')
    <div class=" text-2xl font-medium">Admin / Beranda / Belum Tervalidasi</div>

    <div class="mt-10">
        <div>PPDB Tahun {{ now()->year }}</div>
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
@endsection
