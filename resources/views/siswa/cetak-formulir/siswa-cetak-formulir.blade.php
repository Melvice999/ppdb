<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir {{ $user->nama }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0px;
            padding: 0px;
        }

        .sen {
            font-family: "Sen", sans-serif;
        }

        .info span:last-child {
            text-align: right;
        }

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

        table {
            width: 80%;
            border: none;
        }

        td {
            padding: 4px;
        }

        table.sen {
            padding: 0;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .border-b {
            border-bottom: 1px solid #000;
            width: 100%;
        }

        .font-bold {
            font-weight: bold;
        }

        .mt-3 {
            margin-top: 3mm;
        }

        .mb-2 {
            margin-bottom: 2mm;
        }

        .flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .items-center {
            align-items: center;
        }
    </style>

</head>

<body style="margin: 0;  max-height: 297mm; max-width: 210mm;">
    <div style="margin: 0;">

        <table class="sen" style="padding: 0;">
            <tr>
                <td class="logo-cell" style="padding: 0;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/logo_smk.png'))) }}"
                        alt="SMK Logo" width="60">
                </td>
                <td>
                    <span style="font-size: 18px; text-align: center; padding: 0;" class="font-bold">PPDB
                        Sekolah Menengah Kejuruan Maarif NU Doro</span> <br>
                    <span style="padding: 0;">Jl. Raya Doro-Jolotigo, Doro, Kec. Doro, Kab.
                        Pekalongan Prov. Jawa Tengah
                    </span>
                </td>
            </tr>
        </table>

        <div class="border-b mb-2" style="margin-top: 10px;"></div>

        <table>
            <td>
                Jalur Pendaftaran
                <span>:</span>
                {{ $detailUser->jalur_pendaftaran }}
            </td>
            <td>
                No Pendaftaran
                <span>:</span>
                {{ $user->no_pendaftaran }}
            </td>
        </table>


        <table style="width: 100%;">
            <tr>
                <td style="width: 20%; vertical-align: top; padding:0 ;">
                    <div class="passport-photo" style="margin-top:40px; ">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(storage_path('app/public/siswa/' . $user->tahun_daftar . '/' . $user->nik . '/' . $detailUser->pas_foto))) }}"
                            alt="Foto Passport">
                    </div>
                </td>
                <td style="width: 80%; vertical-align: top;">
                    <div class="w-full ml-2">
                        <div class="uppercase font-bold" style=" border-bottom: 1px solid #000; width: 100%;">a.
                            identitas calon perserta didik</div>
                        <table class="table-auto" style="width: 100%;">

                            <tr>
                                <td style="width: 40%;">
                                    NIK
                                </td>
                                <td style="width: 60%;">
                                    <span>:</span> {{ $user->nik }}
                                </td>
                            </tr>

                            <tr>
                                <td style="width: 40%;">
                                    Nama Lengkap
                                </td>
                                <td style="width: 40%;">
                                    <span>:</span> {{ $user->nama }}
                                </td>
                            </tr>

                            <tr>
                                <td style="width: 40%;">
                                    Tempat Lahir
                                </td>
                                <td style="width: 40%;">
                                    <span>:</span> {{ $user->tempat_lahir }}
                                </td>
                            </tr>

                            <tr>
                                <td style="width: 40%;">
                                    Tanggal Lahir
                                </td>
                                <td style="width: 40%;">
                                    @php
                                        use Carbon\Carbon;
                                    @endphp
                                    <span>:</span>
                                    {{ Carbon::createFromFormat('Y-m-d', $user->tanggal_lahir)->format('d/m/Y') }}
                                </td>
                            </tr>

                            <tr>
                                <td style="width: 40%;">
                                    No Hp
                                </td>
                                <td style="width: 40%;">
                                    <span>:</span> {{ $user->no_hp }}
                                </td>

                            </tr>

                            <tr>
                                <td style="width: 40%;">
                                    Kecamatan
                                </td>
                                <td style="width: 40%;">
                                    <span>:</span> {{ $user->kecamatan }}
                                </td>
                            </tr>

                            <tr>
                                <td style="width: 40%;">
                                    Desa
                                </td>
                                <td style="width: 40%;">
                                    <span>:</span> {{ $user->desa }}
                                </td>
                            </tr>

                            <tr>
                                <td style="width: 40%;">
                                    Rt/Rw
                                </td>
                                <td style="width: 40%;">
                                    <span>:</span> {{ $user->rt . '/' . $user->rw }}
                                </td>
                            </tr>

                            <tr>
                                <td style="width: 40%;">
                                    Kabupaten
                                </td>
                                <td style="width: 40%;">
                                    <span>:</span> {{ $user->kabupaten }}
                                </td>
                            </tr>

                            <tr>
                                <td style="width: 40%;">
                                    Kode Pos
                                </td>
                                <td style="width: 40%;">
                                    <span>:</span> {{ $user->kode_pos }}
                                </td>
                            </tr>

                            <tr>
                                <td style="width: 40%;">
                                    Jenis Kelamin
                                </td>
                                <td style="width: 40%;">
                                    <span>:</span> {{ $user->jenis_kelamin }}
                                </td>
                            </tr>

                        </table>
                    </div>
            </tr>
        </table>

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
                        <span>:</span>
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
                        <span>:</span> {{ $detailUser->wearpack }}
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
                        <span>:</span>
                        {{ $detailUser->asal_sekolah }}

                    </td>
                </tr>

                <tr>
                    <td>
                        Tahun Lulus
                    </td>
                    <td>
                        <span>:</span> {{ $detailUser->tahun_lulus }}
                    </td>
                </tr>

            </table>
        </div>

        <div class="w-full ms-2 overflow-x-auto mt-3">
            <div class="uppercase border-b font-bold w-full">
                d. identitas orang tua/wali calon perserta didik
            </div>
            <table class="table-auto">

                <tr>
                    <td>
                        Nama Ayah
                    </td>
                    <td>
                        <span>:</span>
                        {{ $detailUser->nama_ayah }}

                    </td>
                </tr>

                <tr>
                    <td>
                        Nama Ibu
                    </td>
                    <td>
                        <span>:</span>
                        {{ $detailUser->nama_ibu }}

                    </td>
                </tr>

                <tr>
                    <td>
                        No Hp Wali
                    </td>
                    <td>
                        <span>:</span> {{ $detailUser->no_hp_wali }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Pekerjaan Wali
                    </td>
                    <td>
                        <span>:</span> {{ $detailUser->pekerjaan_wali }}
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
                            <span>:</span> {{ $penilaian->btq }}

                        </td>

                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            Tes Akademik
                        </td>
                        <td>
                            <span>:</span> {{ $penilaian->akademik }}
                        </td>
                    </tr>


                    <tr>
                        <td>
                            Tinggi Badan
                        </td>
                        <td>
                            <span>:</span> {{ $penilaian->tinggi_badan }}
                        </td>

                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            Berat Badan
                        </td>
                        <td>
                            <span>:</span> {{ $penilaian->berat_badan }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Tatto
                        </td>

                        <td>
                            < :</span>

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
                            <span>:</span>
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
                            <span>:</span>
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
                            <span>:</span>
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
                            <span>:</span>
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
                            <span>:</s <input type="text" class="bg-l-sky-blue" disabled name="lainnya"
                                    value="{{ $penilaian->lainnya }}">
                        </td>
                    </tr>

                </table>
            </div>
        @endif

    </div>
</body>

</html>
