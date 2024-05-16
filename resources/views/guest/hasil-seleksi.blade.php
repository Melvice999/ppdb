@extends('layouts.guest-layout')
@section('content')
    @if ($hasil_seleksi->hasil_seleksi === 1)
        <div class="grid mt-6 mx-10 place-items-center text-base max-sm:mx-3">
            {{-- {{ $siswa }} --}}

            <div class="w-1/2 px-10 bg-white max-md:w-full max-md:px-10 rounded-md text-justify max-md:mt-7 max-sm:px-3">
                <div class="text-lg font-bold text-center py-4">
                    Hasil Seleksi PPDB {{ now()->year }}
                </div>
                <table class="w-full bg-white rounded-lg table-auto max-md:text-sm">
                    <thead>
                        <tr class="border-y border-d-green">
                            <th class="py-2 px-4">Nama</th>
                            <th class="py-2 px-4">Prodi</th>
                            <th class="py-2 px-4">Tempat, <br class="hidden max-md:block"> Tanggal Lahir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $siswa)
                            <tr class="border-b border-d-green">
                                <td class="py-2 px-4">{{ $siswa->nama }}</td>
                                <td class="py-2 px-4">{{ $siswa->detailCalonSiswa->prodi }}</td>
                                <td class="py-2 px-4">{{ $siswa->tempat_lahir }}, <br class="hidden max-md:block">
                                    {{ date('d-m-Y', strtotime($siswa->tanggal_lahir)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br><br>
            </div>
        </div>
    @endif

    @if ($hasil_seleksi->hasil_seleksi === 0)
        <div class="grid mt-6 mx-10 place-items-center text-base max-sm:mx-3">
            {{-- {{ $siswa }} --}}

            <div class="w-1/2 px-10 bg-white max-md:px-10 max-md:w-full rounded-md text-justify max-md:mt-7 max-sm:px-3">
                <div class="text-center py-4">
                    Hasil Seleksi Belum Tersedia
                </div>
            </div>
        </div>
    @endif
@endsection()
