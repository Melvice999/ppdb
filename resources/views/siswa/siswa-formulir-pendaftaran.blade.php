@extends('layouts.siswa-layout')
@section('content')
    <style>
        .passport-photo {
            width: 40mm;
            /* Lebar foto passport */
            height: 50mm;
            /* Tinggi foto passport */
            border: 1px solid #000;
            /* Garis tepi hitam */
            border-radius: 5px;
            /* Sudut bulat */
            overflow: hidden;
            /* Memastikan gambar tidak melebihi area yang ditentukan */
        }

        .passport-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Memastikan gambar memenuhi area dengan proporsi yang tepat */
        }
    </style>

    <div
        class="flex justify-center mt-2 mx-10 max-md:block {{ $user->notifikasi_admin === 'Cetak Formulir' || $user->notifikasi_admin === 'Siap Ujian' ? '' : 'hidden max-md:hidden' }}">
        <div class="flex justify-end w-1/2 max-md:w-full">
            <a href="{{ route('siswa-cetak-formulir') }}">
                <div class="border bg-d-green text-white px-2 py-1 rounded cursor-pointer">
                    Cetak
                </div>
            </a>
        </div>
    </div>

    <div class="flex justify-center mt-2 mx-10 max-md:block">
        <div class="header w-1/2  max-md:w-full rounded-md overflow-x-auto">
            <table style="width: 100%; border-collapse: collapse;">
                <tr class="">
                    <td style="text-align: center; border: 0;">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/logo_smk.png'))) }}"
                            alt="SMK Logo" width="60">
                    </td>
                    <td style="text-align: center; border: 0; padding-left: 10px;">
                        <h1 class="font-bold max-md:text-sm" style="margin: 0;">PPDB SMK Maarif NU Doro</h1>
                        <p class="max-md:text-xs" style="margin: 5px 0;">Jl. Raya Doro-Jolotigo, Doro, Kec. Doro, Kab.
                            Pekalongan Prov.
                            Jawa
                            Tengah</p>
                    </td>
                </tr>
            </table>
            <div class="w-full border-t mt-3 mb-2">

            </div>
        </div>
    </div>

    <div class="flex justify-center mx-10 max-md:block max-md:text-xs max-md:mx-0">
        <div class="w-1/2 px-10 max-md:w-full rounded-md max-md:mt-3">
            <div class="w-full">

                <div class="flex justify-between max-md:block max-md:text-center max-md:mb-1">
                    <div>Jalur Pendaftaran : {{ $detailUser->jalur_pendaftaran }}</div>
                    <div>No Pendaftaran : {{ $user->no_pendaftaran }}</div>

                </div>

                <div class="flex items-center max-md:block">
                    <div class="flex justify-center items-center">
                        <div class="passport-photo">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(storage_path('app/public/siswa/' . $user->tahun_daftar . '/' . $user->nik . '/' . $detailUser->pas_foto))) }}"
                                alt="Foto Passport">
                        </div>
                    </div>

                    <div class="w-full ms-2 max-md:mt-3">
                        <div class="uppercase border-b font-bold w-full">
                            a. identitas calon perserta didik
                        </div>
                        <table class="table-auto">

                            <tr>
                                <td>
                                    NIK
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span> {{ $user->nik }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Nama Lengkap
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span> {{ $user->nama }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Tempat Lahir
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span> {{ $user->tempat_lahir }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Tanggal Lahir
                                </td>
                                <td>
                                    @php
                                        use Carbon\Carbon;
                                    @endphp
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                    {{ Carbon::createFromFormat('Y-m-d', $user->tanggal_lahir)->format('d/m/Y') }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    No Hp
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span> {{ $user->no_hp }}
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    Kecamatan
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span> {{ $user->kecamatan }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Desa
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span> {{ $user->desa }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Rt/Rw
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                    {{ $user->rt . '/' . $user->rw }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Kabupaten
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span> {{ $user->kabupaten }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Kode Pos
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span> {{ $detailUser->kode_pos }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Jenis Kelamin
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span> {{ $user->jenis_kelamin }}
                                </td>
                            </tr>

                        </table>
                    </div>

                </div>

                <div class="w-full ms-2 overflow-x-auto mt-3">
                    <div class="uppercase border-b font-bold w-full">
                        b. pilihan program keahlian
                    </div>
                    <table class="table-auto">

                        <tr>
                            <td>
                                Program Keahlian
                            </td>
                            <td>
                                <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                {{ $detailUser->prodi == 'TKRO'
                                    ? 'Teknik Kendaraan Ringan Otomotif'
                                    : ($detailUser->prodi == 'TKJ'
                                        ? 'Teknik Komputer dan Jaringan'
                                        : ($detailUser->prodi == 'AKL'
                                            ? 'Akuntansi dan Keuangan Lembaga'
                                            : ($detailUser->prodi == 'TBSM'
                                                ? 'Teknik dan Bisnis Sepeda Motor'
                                                : 'Prodi Tidak Diketahui'))) }}

                            </td>
                        </tr>

                        <tr>
                            <td>
                                Ukuran Wearpack / Baju
                            </td>
                            <td>
                                <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span> {{ $detailUser->wearpack }}
                            </td>
                        </tr>

                    </table>
                </div>

                <div class="w-full ms-2 overflow-x-auto mt-3">
                    <div class="uppercase border-b font-bold w-full">
                        c. identitas asal sekolah calon perserta didik
                    </div>
                    <table class="table-auto">

                        <tr>
                            <td>
                                Nama Sekolah Asal
                            </td>
                            <td>
                                <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                {{ $detailUser->asal_sekolah }}

                            </td>
                        </tr>

                        <tr>
                            <td>
                                Tahun Lulus
                            </td>
                            <td>
                                <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span> {{ $detailUser->tahun_lulus }}
                            </td>
                        </tr>

                    </table>
                </div>

                <div class="w-full ms-2 overflow-x-auto mt-3">
                    <div class="uppercase border-b font-bold w-full">
                        c. identitas orang tua/wali calon perserta didik
                    </div>
                    <table class="table-auto">

                        <tr>
                            <td>
                                Nama Ayah
                            </td>
                            <td>
                                <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                {{ $detailUser->nama_ayah }}

                            </td>
                        </tr>

                        <tr>
                            <td>
                                Nama Ibu
                            </td>
                            <td>
                                <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                {{ $detailUser->nama_ibu }}

                            </td>
                        </tr>

                        <tr>
                            <td>
                                No Hp Wali
                            </td>
                            <td>
                                <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span> {{ $detailUser->no_hp_wali }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Pekerjaan Wali
                            </td>
                            <td>
                                <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span> {{ $detailUser->pekerjaan_wali }}
                            </td>
                        </tr>

                    </table>
                </div>

                @if ($penilaian && $penilaian->btq)
                    <div class="w-full ms-2 overflow-x-auto mt-3">
                        <div class="uppercase border-b font-bold w-full">
                            e. test
                        </div>
                        <table class="table-auto">

                            <tr>
                                <td>
                                    Tes BTQ
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                    {{ $penilaian->btq }}

                                </td>

                                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    Tes Akademik
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                    {{ $penilaian->akademik }}
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    Tinggi Badan
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                    {{ $penilaian->tinggi_badan }}
                                </td>

                                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    Berat Badan
                                </td>
                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                    {{ $penilaian->berat_badan }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Tatto
                                </td>

                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>

                                    <div
                                        style="display: inline-block; width: 18px; height: 18px; border: 1px solid #000; position: relative;">
                                        <div
                                            style="width: 100%; height: 100%; background-color: #fff; display: none; position: absolute; top: 0; left: 0;">
                                        </div>

                                        @if ($penilaian->tatto == 1)
                                            <span
                                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">✔</span>
                                        @endif
                                    </div>
                                </td>

                                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    Tindik
                                </td>

                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                    <div
                                        style="display: inline-block; width: 18px; height: 18px; border: 1px solid #000; position: relative;">
                                        <div
                                            style="width: 100%; height: 100%; background-color: #fff; display: none; position: absolute; top: 0; left: 0;">
                                        </div>

                                        @if ($penilaian->tindik == 1)
                                            <span
                                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">✔</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Tangan
                                </td>

                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                    <div
                                        style="display: inline-block; width: 18px; height: 18px; border: 1px solid #000; position: relative;">
                                        <div
                                            style="width: 100%; height: 100%; background-color: #fff; display: none; position: absolute; top: 0; left: 0;">
                                        </div>

                                        @if ($penilaian->tangan == 1)
                                            <span
                                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">✔</span>
                                        @endif
                                    </div>
                                </td>

                                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    Kaki
                                </td>

                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                    <div
                                        style="display: inline-block; width: 18px; height: 18px; border: 1px solid #000; position: relative;">
                                        <div
                                            style="width: 100%; height: 100%; background-color: #fff; display: none; position: absolute; top: 0; left: 0;">
                                        </div>

                                        @if ($penilaian->kaki == 1)
                                            <span
                                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">✔</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Riwayat Penyakit
                                </td>

                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                    <div
                                        style="display: inline-block; width: 18px; height: 18px; border: 1px solid #000; position: relative;">
                                        <div
                                            style="width: 100%; height: 100%; background-color: #fff; display: none; position: absolute; top: 0; left: 0;">
                                        </div>

                                        @if ($penilaian->riwayat_penyakit == 1)
                                            <span
                                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">✔</span>
                                        @endif
                                    </div>
                                </td>

                                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    Lainnya
                                </td>

                                <td>
                                    <span class="max-md:hidden">&nbsp;&nbsp;&nbsp;:</span>
                                    <input type="text" class="bg-l-sky-blue" disabled name="lainnya"
                                        value="{{ $penilaian->lainnya }}">
                                </td>
                            </tr>

                        </table>
                    </div>
                @endif


            </div>


        </div>
    </div>
@endsection
