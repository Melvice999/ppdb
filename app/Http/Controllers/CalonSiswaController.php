<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BerandaModel;
use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use App\Models\DetailCalonSiswaModel;
use App\Models\OtpModel;
use App\Models\PengaturanModel;
use App\Models\PenilaianModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;


class CalonSiswaController extends Controller
{
    public function index()
    {
        $beranda = BerandaModel::where('status', 1)->get();
        $hasil_seleksi = PengaturanModel::select('hasil_seleksi')->first();
        $pengaturan = PengaturanModel::get();
        $data = [
            'beranda'           => $beranda,
            'pengaturan'        => $pengaturan,
            'hasil_seleksi'     => $hasil_seleksi,
            'title'             => "PPDB SMK Ma'arif NU Doro",
        ];
        return view('guest/beranda', $data);
    }

    public function daftar()
    {
        $pendaftaran = PengaturanModel::select('pendaftaran')->first();

        $beranda = BerandaModel::where('status', 1)->get();
        $hasil_seleksi = PengaturanModel::select('hasil_seleksi')->first();
        $pengaturan = PengaturanModel::get();
        $data = [
            'beranda'           => $beranda,
            'pengaturan'        => $pengaturan,
            'hasil_seleksi'     => $hasil_seleksi,
            'pendaftaran'       => $pendaftaran,
            'title'             => "Formulir Pendaftaran | PPDB SMK Ma'arif NU Doro",
        ];
        return view('guest/daftar', $data);
    }

    public function store(Request $request)
    {
        // Validasi input 
        $request->validate([
            'nik'       => 'min:16|unique:calon_siswa|',
            'no_hp'       => 'unique:calon_siswa|',
            'password'  => 'required|min:6'
        ], [
            'nik.unique'    => 'NIK telah terdaftar',
            'nik.min'       => 'Panjang NIK harus 16 karakter',
            'no_hp.unique'  => 'No whatsapp telah terdaftar',
            'password.min'  => 'Password minimal 6 karakter.',
        ]);

        // no_pendaftaran
        $currentYear = date('Y');
        $lastNoPendaftaran = CalonSiswa::whereYear('created_at', $currentYear)->max('no_pendaftaran');
        // Mendapatkan nomor urut dari nomor pendaftaran terakhir pada tahun ini
        $lastNomorUrut = $lastNoPendaftaran ? intval(substr($lastNoPendaftaran, -3)) : 0;
        // Menambahkan 1 pada nomor urut
        $nomor_urut = $lastNomorUrut + 1;
        // Format nomor urut agar selalu tiga digit
        $nomor_urut_formatted = sprintf('%03d', $nomor_urut);
        // Membuat nomor pendaftaran baru
        $no_pendaftaran = $currentYear . '-' . $nomor_urut_formatted;

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

        $siswa = [
            'nik' => $request->nik,
            'no_pendaftaran' => $no_pendaftaran,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'provinsi' => $textValueProvinsi,
            'kabupaten' => $textValueKabupaten,
            'kecamatan' => $textValueKecamatan,
            'desa' => $textValueDesa,
            'kode_pos' => $textValueKodePos,
            'notifikasi_admin' => 'Pendaftar Baru',
        ];

        CalonSiswa::create($siswa);
        User::Create(['nik' => $request->nik, 'password' => Hash::make($request->password)]);
        PenilaianModel::create(['nik' => $request->nik]);

        return redirect()->to(url('daftar/otp/' . $request->nik . '/' . $request->no_hp));
    }

    public function otp(Request $request)
    {
        $noHp = $request->route('no_hp');
        $nik = $request->route('nik');

        // Mencari calon siswa berdasarkan no hp dan nik
        $calonSiswa = CalonSiswa::where('no_hp', $noHp)->where('nik', $nik)->first();

        // Jika calon siswa tidak ditemukan, tampilkan error 404
        if (!$calonSiswa) {
            abort(404);
        }

        $pendaftaran = PengaturanModel::select('pendaftaran')->first();

        $beranda = BerandaModel::where('status', 1)->get();
        $hasil_seleksi = PengaturanModel::select('hasil_seleksi')->first();
        $pengaturan = PengaturanModel::get();
        $data = [
            'calonSiswa'        => $calonSiswa,
            'beranda'           => $beranda,
            'pengaturan'        => $pengaturan,
            'hasil_seleksi'     => $hasil_seleksi,
            'pendaftaran'       => $pendaftaran,
            'title'             => "Formulir Pendaftaran | PPDB SMK Ma'arif NU Doro",
        ];

        return view('guest/daftar/otp', $data);
    }

    public function otpUpdateNohp(Request $request)
    {
        $nik = $request->nik;
        $CalonSiswa = CalonSiswa::where('nik', $nik)->first();
        $CalonSiswa->no_hp = $request->no_hp_baru;

        $CalonSiswa->update();

        return redirect()->to(url('daftar/otp/' . $nik . '/' . $request->no_hp_baru))->with('success', 'No WhatsApp berhasil diperbarui');
    }

    public function otpRequest(Request $request)
    {
        $nik = $request->nik;
        OtpModel::where('nik', $nik)->delete();

        // start api whatsapp
        $otp = mt_rand(100000, 999999);
        $waktu = now()->toDateTimeString();

        OtpModel::create([
            'nik' => $request->nik,
            'otp' => $otp,
            'waktu' => $waktu,
        ]);

        $target = $request->no_hp;
        $message = "PPDB SMK Maarif NU Doro. 
    Kode OTP Anda adalah :
          
          " . $otp . "

    Kode OTP yang telah Anda terima hanya akan berlaku untuk 10 menit. Mohon untuk tidak memberikan kode ini kepada siapapun. Terima kasih atas kerjasama Anda. ";

        $token = env('FONTTE_API_TOKEN');

        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $message,
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token
            ),
            CURLOPT_SSL_VERIFYPEER => false,
        ));
        curl_exec($ch);

        curl_close($ch);
        // end api whatsapp
        return response()->json(['success' => 'Kode OTP telah dikirim ke nomor WhatsApp ' . $request->no_hp]);
    }

    public function otpPost(Request $request)
    {

        $otp = OtpModel::where('nik', $request->nik)
            ->where('otp', $request->otp)
            ->first();

        if ($otp) {
            // Cek apakah OTP masih berlaku (misalnya, batas waktu 10 menit)
            $waktuOtp = strtotime($otp->waktu);
            $waktuSekarang = time();

            if ($waktuSekarang - $waktuOtp <= 600) { // 600 detik = 10 menit
                $nik = $request->nik;
                $no_hp = $request->no_hp;
                $kodeOtp = $request->otp;
                // OTP valid
                return redirect()->to(url('daftar/detail-calon-siswa/' . $nik . '/' . $no_hp . '/' . $kodeOtp));
            } else {
                // OTP kadaluwarsa
                return redirect()->back()->with('error', 'OTP Kadaluarsa');
            }
        } else {
            // OTP tidak valid
            return redirect()->back()->with('error', 'OTP tidak valid');
        }
    }

    public function detailCalonSiswa(Request $request)
    {
        $otp = OtpModel::where('otp', $request->route('otp'))->select('otp')->first();
        $nik = OtpModel::where('nik', $request->route('nik'))->select('nik')->first();
        $no_hp = CalonSiswa::where('nik', $request->route('nik'))->where('no_hp', $request->route('no_hp'))->select('no_hp')->first();

        if (!$otp) {
            abort(404);
        }
        if (!$nik) {
            abort(404);
        }
        if (!$no_hp) {
            abort(404);
        }

        $calonSiswa = CalonSiswa::where('nik', $request->route('nik'))->first();

        $pendaftaran = PengaturanModel::select('pendaftaran')->first();

        $beranda = BerandaModel::where('status', 1)->get();
        $hasil_seleksi = PengaturanModel::select('hasil_seleksi')->first();
        $pengaturan = PengaturanModel::get();
        $data = [
            'calonSiswa'        => $calonSiswa,
            'nik'               => $nik,
            'beranda'           => $beranda,
            'pengaturan'        => $pengaturan,
            'hasil_seleksi'     => $hasil_seleksi,
            'pendaftaran'       => $pendaftaran,
            'title'             => "Formulir Pendaftaran | PPDB SMK Ma'arif NU Doro",
        ];

        return view('guest/daftar/detail-calon-siswa', $data);
    }

    public function detailCalonSiswaPost(Request $request)
    {
        $request->validate([
            'nik'       => 'min:16|unique:detail_calon_siswa|',
            'pas_foto'  => 'mimes:jpg,jpeg,png|max:1536',
        ], [
            'nik.unique'    => 'NIK Telah terdaftar silahkan login',
            'nik.min'       => 'Panjang NIK minimal 16 karakter',
            'pas_foto.max'  => 'Ukuran file pas foto maksimal 1.5 MB',
            'pas_foto.mimes' => 'Format file pas foto harus .jpg, .jpeg, .png',
        ]);

        $pasFoto = $request->file('pas_foto');
        $pasFotoName = $request->nik . '-Pas-Foto.png';
        $pasFoto->storeAs('siswa/' . date('Y') . '/' . $request->nik, $pasFotoName, 'public');


        $siswa = [
            'nik' => $request->nik,
            'pas_foto' => $pasFotoName,
            'prodi' => $request->prodi,
            'wearpack' => $request->wearpack,
            'asal_sekolah' => $request->asal_sekolah,
            'tahun_lulus' => $request->tahun_lulus,
            'jalur_pendaftaran' => $request->jalur_pendaftaran,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_hp_wali' => $request->no_hp_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
        ];
        DetailCalonSiswaModel::create($siswa);

        return redirect()->to(url('auth-siswa'))->with('success', 'Selamat anda berhasil mendaftar')
            ->with('sukses', 'silahkan login');
    }

    public function informasi()
    {
        $informasi    = PengaturanModel::select('j_informasi', 'informasi')->first();

        $beranda = BerandaModel::where('status', 1)->get();
        $hasil_seleksi = PengaturanModel::select('hasil_seleksi')->first();
        $pengaturan = PengaturanModel::get();
        $data = [
            'beranda'           => $beranda,
            'pengaturan'        => $pengaturan,
            'hasil_seleksi'     => $hasil_seleksi,
            'informasi'         => $informasi,
            'title'             => "Informasi | PPDB SMK Ma'arif NU Doro",
        ];

        return view('guest/informasi-pendaftaran', $data);
    }

    public function hasilSeleksi()
    {
        $siswa = CalonSiswa::where('status', '1')
            ->whereHas('detailCalonSiswa', function ($query) {
                $query->orderBy('prodi', 'desc')->where('tahun_daftar', now()->year);
            })
            ->get();


        $beranda = BerandaModel::where('status', 1)->get();
        $hasil_seleksi = PengaturanModel::select('hasil_seleksi')->first();
        $pengaturan = PengaturanModel::get();
        $data = [
            'beranda'           => $beranda,
            'pengaturan'        => $pengaturan,
            'hasil_seleksi'     => $hasil_seleksi,
            'siswa'             => $siswa,
            'title'             => "Hasil Seleksi | PPDB SMK Ma'arif NU Doro",
        ];
        return view('guest/hasil-seleksi', $data);
    }
}