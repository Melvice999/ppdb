<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rekap PPDB</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            text-align: left;
            padding: 8px;
            border: 1px solid #000;
            font-size: 12px;
        }

        .text-center {
            text-align: center;
        }

        .mb-4 {
            margin-bottom: 20px;
        }

        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .inline-block {
            display: inline-block;
        }

        .btn-cetak {
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .btn-cetak:hover {
            background-color: #0056b3;
        }

        .overflow-x-auto {
            overflow-x: auto;
        }

        .mt-3 {
            margin-top: 20px;
        }

        .pe-10 {
            padding-right: 10px;
        }
    </style>
</head>

<body>

    <div class="header">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="text-align: center; border: 0;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/logo_smk.png'))) }}"
                        alt="SMK Logo" width="60">
                </td>
                <td style="text-align: center; border: 0; padding-left: 10px;">
                    <h1 style="margin: 0;">Rekap PPDB SMK Maarif NU Doro Tahun {{ $tahun }}</h1>
                    <p style="margin: 5px 0;">Jl. Raya Doro-Jolotigo, Doro, Kec. Doro, Kab. Pekalongan Prov. Jawa
                        Tengah</p>
                </td>
            </tr>
        </table>
    </div>
    <hr style="margin-top: 20px; margin-bottom: 20px;">

    <table class="table-auto w-full border">
        <thead>
            <tr>
                <th>No</th>
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
                    <td>{{ $i + 1 }}</td>
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


    <table class="mt-3" style="border:none;">
        <thead>
            <tr>
                <th style="border:none;">Jurusan</th>
                <th style="border:none;">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border:none;" class="pe-10">AKL</td>
                <td style="border:none;"> : {{ $cakl }}</td>
            </tr>
            <tr>
                <td style="border:none;" class="pe-10">TBSM</td>
                <td style="border:none;"> : {{ $ctbsm }}</td>
            </tr>
            <tr>
                <td style="border:none;" class="pe-10">TKRO</td>
                <td style="border:none;"> : {{ $ctkro }}</td>
            </tr>
            <tr>
                <td style="border:none;" class="pe-10">TKJ</td>
                <td style="border:none;"> : {{ $ctkj }}</td>
            </tr>
            <tr>
                <td style="border:none;" class="pe-10">Jumlah Keseluruhan</td>
                <td style="border:none;">
                    @php
                        $jumlah_keseluruhan = $cakl + $ctbsm + $ctkro + $ctkj;
                    @endphp
                    : {{ $jumlah_keseluruhan }}
                </td>
            </tr>
        </tbody>
    </table>

    </div>
</body>

</html>
