@extends('layouts.headmaster-layout')

@section('content')
    <div class="w-full text-2xl font-medium">Headmaster / Cetak Formulir</div>

    <div class="mt-10">Cetak Formulir Berdasarkan Tahun</div>

    <div class="grid grid-cols-4 w-full gap-10 mt-10 max-md:grid-cols-1 max-lg:grid-cols-2">
        @foreach ($tahun as $item)
            @php
                $jumlahPendaftar = App\Models\CalonSiswa::where('tahun_daftar', $item->tahun_daftar)->where('notifikasi_admin', 'Lulus Ujian')->count();
            @endphp

            <a href="{{ route('headmaster-cetak-formulir-tahun', ['id' => $item->tahun_daftar]) }}"
                class="flex justify-center w-full bg-d-green text-white rounded-lg p-3">
                <div class="w-full">
                    <div class="text-5xl max-md:text-2xl">
                        {{ $item->tahun_daftar }}
                    </div>
                    <hr>
                    <div>
                        {{ $jumlahPendaftar }} pendaftar
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
