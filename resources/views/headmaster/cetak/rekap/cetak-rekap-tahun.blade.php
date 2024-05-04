@extends('layouts.headmaster-layout')
@section('content')
    <div class="">
        <div class="text-center mb-4 flex justify-between max-md:block">
            <div class="w-full flex">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/logo_smk.png'))) }}"
                    alt="SMK Logo" class="w-12 inline-block max-md:hidden">
                <div class="w-full">
                    <h1 class="text-xl font-bold inline-block ml-2">Rekap PPDB SMK Maarif NU Doro Tahun {{ $tahun }}
                    </h1> <br>
                    Jl. Raya Doro-Jolotigo, Doro, Kec. Doro, Kab. Pekalongan Prov. Jawa Tengah
                </div>
            </div>
            <div>
                <form action="{{ route('headmaster-cetak-rekap-tahun-post', ['id' => $tahun]) }}" method="POST">
                    @csrf
                    <button class="bg-d-green text-white px-2 py-1 rounded-lg text-lg max-md:mt-2">
                        Cetak
                    </button>
                </form>
            </div>
        </div>
    </div>

    <hr class="my-4">

    <div class="overflow-x-auto">
        <table class="table-auto w-full border">
            <thead>
                <tr>
                    <th class="border px-2">No</th>
                    <th class="border px-2">No Pendaftaran</th>
                    <th class="border px-2">Nama Lengkap</th>
                    <th class="border px-2">Jurusan</th>
                    <th class="border px-2">Jenis Kelamin</th>
                    <th class="border px-2">Tempat Tanggal Lahir</th>
                    <th class="border px-2">Nomor HP</th>
                    <th class="border px-2">NIK</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->sortBy('no_pendaftaran') as $i => $item)

                    <tr>
                        <td class="border px-2">{{ $i + 1 }}</td>
                        <td class="border px-2">{{ $item->no_pendaftaran }}</td>
                        <td class="border px-2">{{ $item->nama }}</td>
                        <td class="border px-2">{{ $item->prodi }}</td>
                        <td class="border px-2">{{ $item->jenis_kelamin }}</td>
                        <td class="border px-2">{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                        <td class="border px-2">{{ $item->no_hp }}</td>
                        <td class="border px-2">{{ $item->nik }}</td>
                    </tr>
                @endforeach

            </tbody>

        </table>



        @php
            $cakl = App\Models\CalonSiswa::where('tahun_daftar', $tahun)->where('prodi', 'akl')->count();
            $ctbsm = App\Models\CalonSiswa::where('tahun_daftar', $tahun)->where('prodi', 'tbsm')->count();
            $ctkro = App\Models\CalonSiswa::where('tahun_daftar', $tahun)->where('prodi', 'tkro')->count();
            $ctkj = App\Models\CalonSiswa::where('tahun_daftar', $tahun)->where('prodi', 'tkj')->count();
        @endphp

    </div>

    <table class="mt-3">
        <thead>
            <tr>
                <th>Jurusan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pe-10">AKL</td>
                <td> : {{ $cakl }}</td>
            </tr>
            <tr>
                <td class="pe-10">TBSM</td>
                <td> : {{ $ctbsm }}</td>
            </tr>
            <tr>
                <td class="pe-10">TKRO</td>
                <td> : {{ $ctkro }}</td>
            </tr>
            <tr>
                <td class="pe-10">TKJ</td>
                <td> : {{ $ctkj }}</td>
            </tr>
            <tr>
                <td class="pe-10">Jumlah Keseluruhan</td>
                <td>
                    @php
                        $jumlah_keseluruhan = $cakl + $ctbsm + $ctkro + $ctkj;
                    @endphp
                    : {{ $jumlah_keseluruhan }}
                </td>
            </tr>
        </tbody>
    </table>
@endsection
