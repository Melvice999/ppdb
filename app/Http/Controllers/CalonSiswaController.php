<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;

// 
use Illuminate\Support\Facades\Http;

class CalonSiswaController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Halaman Utama PPDB SMK Ma'arif NU Doro",
        ];
        return view("guest/beranda", $data);
    }

    public function daftar()
    {
        $data = [
            "title" => "Formulir Pendaftaran PPDB SMK Ma'arif NU Doro",
        ];
        return view("guest/daftar", $data);
    }

    public function informasi()
    {
        $data = [
            "title" => "Panduan dan Informasi PPDB SMK Ma'arif NU Doro",
        ];
        return view("guest/informasi-pendaftaran", $data);
    }

    public function store(Request $request)
    {
        // Validasi input 
        $request->validate([
            'nik'       => 'min:16|unique:calon_siswa|',
            'kk'        => 'min:16',
        ], [
            'nik.unique'    => 'NIK Telah terdaftar',
            'nik.min'       => 'Panjang NIK minimal 16 karakter',
            'kk.min'        => 'Panjang KK minimal 16 karakter',
        ]);

        // Function to fetch data and extract text value based on ID
        function fetchAndExtractText($url, $idField, $selectedId, $targetTextKey)
        {
            $response = Http::withoutVerifying()->get($url);
            $data = $response->json();

            $filteredArray = array_filter($data['result'], function ($item) use ($selectedId, $idField) {
                return $item[$idField] === $selectedId;
            });

            $selectedItem = reset($filteredArray);
            return $selectedItem[$targetTextKey] ?? null;
        }

        // Fetch data for each level
        $textValueProvinsi = fetchAndExtractText('https://alamat.thecloudalert.com/api/provinsi/get/', 'id', $request->provinsi, 'text');
        $textValueKabupaten = fetchAndExtractText('https://alamat.thecloudalert.com/api/kabkota/get/?d_provinsi_id=' . $request->provinsi, 'id', $request->kabupaten, 'text');
        $textValueKecamatan = fetchAndExtractText('https://alamat.thecloudalert.com/api/kecamatan/get/?d_kabkota_id=' . $request->kabupaten, 'id', $request->kecamatan, 'text');
        $textValueDesa = fetchAndExtractText('https://alamat.thecloudalert.com/api/kelurahan/get/?d_kecamatan_id=' . $request->kecamatan, 'id', $request->desa, 'text');
        $textValueKodePos = fetchAndExtractText('https://alamat.thecloudalert.com/api/kodepos/get/?d_kabkota_id=' . $request->kabupaten . '&d_kecamatan_id=' . $request->kecamatan, 'id', $request->kode_pos, 'text');

        // Fetch data for wali
        $textValueProvinsiWali = fetchAndExtractText('https://alamat.thecloudalert.com/api/provinsi/get/', 'id', $request->provinsi_wali, 'text');
        $textValueKabupatenWali = fetchAndExtractText('https://alamat.thecloudalert.com/api/kabkota/get/?d_provinsi_id=' . $request->provinsi_wali, 'id', $request->kabupaten_wali, 'text');
        $textValueKecamatanWali = fetchAndExtractText('https://alamat.thecloudalert.com/api/kecamatan/get/?d_kabkota_id=' . $request->kabupaten_wali, 'id', $request->kecamatan_wali, 'text');
        $textValueDesaWali = fetchAndExtractText('https://alamat.thecloudalert.com/api/kelurahan/get/?d_kecamatan_id=' . $request->kecamatan_wali, 'id', $request->desa_wali, 'text');
        $textValueKodePosWali = fetchAndExtractText('https://alamat.thecloudalert.com/api/kodepos/get/?d_kabkota_id=' . $request->kabupaten_wali . '&d_kecamatan_id=' . $request->kecamatan_wali, 'id', $request->kode_pos_wali, 'text');

        // Assuming you have already retrieved $textValueProvinsi, $textValueKabupaten, etc.

        $data = [
            'nik' => $request->nik,
            'kk' => $request->kk,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'warga_negara' => $request->warga_negara,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'provinsi' => $textValueProvinsi,
            'kabupaten' => $textValueKabupaten,
            'kecamatan' => $textValueKecamatan,
            'desa' => $textValueDesa,
            'kode_pos' => $textValueKodePos,
            'prodi' => $request->prodi,
            'batik' => $request->batik,
            'olahraga' => $request->olahraga,
            'wearpack' => $request->wearpack,
            'asal_sekolah' => $request->asal_sekolah,
            'tahun_lulus' => $request->tahun_lulus,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_hp_wali' => $request->no_hp_wali,
            'rt_wali' => $request->rt_wali,
            'rw_wali' => $request->rw_wali,
            'provinsi_wali' => $textValueProvinsiWali,
            'kabupaten_wali' => $textValueKabupatenWali,
            'kecamatan_wali' => $textValueKecamatanWali,
            'desa_wali' => $textValueDesaWali,
            'kode_pos_wali' => $textValueKodePosWali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'info_sekolah' => $request->info_sekolah,
        ];

        CalonSiswa::create($data);

        // Redirect ke halaman yang sesuai
        return redirect()->to(url('/informasi-pendaftar'))->with('success', 'Data berhasil disimpan');
    }
}
