<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\AkunSiswa;
use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use App\Models\PengaturanModel;
use App\Models\BerandaModel;
use App\Models\BerkasSiswa;
use App\Models\DetailCalonSiswaModel;
use App\Models\OtpModel;
use App\Models\PenilaianModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // jika ingin menambahkan tahun tinggal tambahkan addYear()-> untuk 1x tahunnya
        // now()->addYear()->year
        $tahun_daftar = now()->year;

        $jumlahPendaftarTBSM = DetailCalonSiswaModel::where('prodi', 'TBSM')
            ->whereHas('calonSiswa', function ($query) use ($tahun_daftar) {
                $query->whereYear('tahun_daftar', $tahun_daftar);
            })
            ->count();

        $jumlahPendaftarTKRO = DetailCalonSiswaModel::where('prodi', 'TKRO')
            ->whereHas('calonSiswa', function ($query) use ($tahun_daftar) {
                $query->whereYear('tahun_daftar', $tahun_daftar);
            })
            ->count();

        $jumlahPendaftarTKJ = DetailCalonSiswaModel::where('prodi', 'TKJ')
            ->whereHas('calonSiswa', function ($query) use ($tahun_daftar) {
                $query->whereYear('tahun_daftar', $tahun_daftar);
            })
            ->count();

        $jumlahPendaftarAKL = DetailCalonSiswaModel::where('prodi', 'AKL')
            ->whereHas('calonSiswa', function ($query) use ($tahun_daftar) {
                $query->whereYear('tahun_daftar', $tahun_daftar);
            })
            ->count();

        $data = [
            'tbsm' => $jumlahPendaftarTBSM,
            'tkro' => $jumlahPendaftarTKRO,
            'tkj' => $jumlahPendaftarTKJ,
            'akl' => $jumlahPendaftarAKL,

            'status0'   => CalonSiswa::where('status', 0)->whereHas('detailCalonSiswa', function ($query) use ($tahun_daftar) {
                $query->whereYear('tahun_daftar', $tahun_daftar);
            })->count(),
            'status1'   => CalonSiswa::where('status', 1)->whereHas('detailCalonSiswa', function ($query) use ($tahun_daftar) {
                $query->whereYear('tahun_daftar', $tahun_daftar);
            })->count(),
            'title'     => 'Beranda Admin',
        ];

        return view('admin.admin-beranda', $data);
    }

    public function berandaProdi(Request $request)
    {
        $programStudy   = $request->route()->getName();

        $tahun_daftar = now()->year;

        $calonSiswaTbsm = DetailCalonSiswaModel::orderBy('updated_at', 'DESC')->where('prodi', 'TBSM')
            ->whereHas('calonSiswa', function ($query) use ($tahun_daftar) {
                $query->whereYear('tahun_daftar', $tahun_daftar);
            })->get();

        $calonSiswaTkro = DetailCalonSiswaModel::orderBy('updated_at', 'DESC')->where('prodi', 'TKRO')
            ->whereHas('calonSiswa', function ($query) use ($tahun_daftar) {
                $query->whereYear('tahun_daftar', $tahun_daftar);
            })->get();

        $calonSiswaTkj = DetailCalonSiswaModel::orderBy('updated_at', 'DESC')->where('prodi', 'TKJ')
            ->whereHas('calonSiswa', function ($query) use ($tahun_daftar) {
                $query->whereYear('tahun_daftar', $tahun_daftar);
            })->get();

        $calonSiswaAkl = DetailCalonSiswaModel::orderBy('updated_at', 'DESC')->where('prodi', 'AKL')
            ->whereHas('calonSiswa', function ($query) use ($tahun_daftar) {
                $query->whereYear('tahun_daftar', $tahun_daftar);
            })->get();

        $statusTbsm0 = CalonSiswa::where('status', 0)
            ->whereHas('detailCalonSiswa', function ($query) {
                $query->where('prodi', 'TBSM')->whereYear('tahun_daftar', now()->year);
            })
            ->count();

        $statusTkro0 = CalonSiswa::where('status', 0)
            ->whereHas('detailCalonSiswa', function ($query) {
                $query->where('prodi', 'TKRO')->whereYear('tahun_daftar', now()->year);
            })
            ->count();

        $statusTkj0 = CalonSiswa::where('status', 0)
            ->whereHas('detailCalonSiswa', function ($query) {
                $query->where('prodi', 'TKJ')->whereYear('tahun_daftar', now()->year);
            })
            ->count();

        $statusAkl0 = CalonSiswa::where('status', 0)
            ->whereHas('detailCalonSiswa', function ($query) {
                $query->where('prodi', 'AKL')->whereYear('tahun_daftar', now()->year);
            })
            ->count();


        $statusTbsm1 = CalonSiswa::where('status', 1)
            ->whereHas('detailCalonSiswa', function ($query) {
                $query->where('prodi', 'TBSM')->whereYear('tahun_daftar', now()->year);
            })
            ->count();

        $statusTkro1 = CalonSiswa::where('status', 1)
            ->whereHas('detailCalonSiswa', function ($query) {
                $query->where('prodi', 'TKRO')->whereYear('tahun_daftar', now()->year);
            })
            ->count();

        $statusTkj1 = CalonSiswa::where('status', 1)
            ->whereHas('detailCalonSiswa', function ($query) {
                $query->where('prodi', 'TKJ')->whereYear('tahun_daftar', now()->year);
            })
            ->count();

        $statusAkl1 = CalonSiswa::where('status', 1)
            ->whereHas('detailCalonSiswa', function ($query) {
                $query->where('prodi', 'AKL')->whereYear('tahun_daftar', now()->year);
            })
            ->count();

        $siswa = CalonSiswa::get();


        // $status0        = CalonSiswa::where('status', 0)->where('tahun_daftar', now()->year);
        // $status1        = CalonSiswa::where('status', 1)->where('tahun_daftar', now()->year);

        $data = [
            'siswa'             => $siswa,
            'title'             => 'Beranda Admin',
            'calonSiswaTbsm'    => $calonSiswaTbsm,
            'calonSiswaTkro'    => $calonSiswaTkro,
            'calonSiswaTkj'     => $calonSiswaTkj,
            'calonSiswaAkl'     => $calonSiswaAkl,
            'statusTbsm0'       => $statusTbsm0,
            'statusTbsm1'       => $statusTbsm1,
            'statusTkro0'       => $statusTkro0,
            'statusTkro1'       => $statusTkro1,
            'statusTkj0'        => $statusTkj0,
            'statusTkj1'        => $statusTkj1,
            'statusAkl0'        => $statusAkl0,
            'statusAkl1'        => $statusAkl1,
            // 'status0'           => $status0,
            // 'status1'           => $status1,
        ];
        return view('admin.beranda.prodi', ['programStudy' => $programStudy], $data);
    }

    public function berandaValidate(Request $request)
    {
        $tahun_daftar = now()->year;

        $programStudy   = $request->route()->getName();

        $status0 =  CalonSiswa::orderBy('updated_at', 'DESC')->where('status', 0)->whereHas('detailCalonSiswa', function ($query) use ($tahun_daftar) {
            $query->whereYear('tahun_daftar', $tahun_daftar);
        })->get();
        $status1 =  CalonSiswa::orderBy('updated_at', 'DESC')->where('status', 1)->whereHas('detailCalonSiswa', function ($query) use ($tahun_daftar) {
            $query->whereYear('tahun_daftar', $tahun_daftar);
        })->get();

        $data = [
            'title'     => 'Beranda Admin',
            'status0'   => $status0,
            'status1'   => $status1,
        ];
        return view('admin.beranda.validate', ['programStudy' => $programStudy], $data);
    }

    public function berandaSiswaEdit($id)
    {
        $siswa = CalonSiswa::where('nik', $id)->first();
        $berkas = BerkasSiswa::where('nik', $id)->first();
        $penilaian = PenilaianModel::where('nik', $id)->first();
        $data = [
            'penilaian'         => $penilaian,
            'siswa'             => $siswa,
            'berkas'            => $berkas,
            'title'             => 'Beranda Admin',
        ];
        return view('admin.beranda.siswa-edit', $data);
    }

    public function postBerandaSiswaEdit(Request $request, $id)
    {

        if ($request->notifikasi_admin == 'Masukan Pas Foto Yang Valid') {
            $target = $request->no_hp;
            $message = "Harap Masukan Pas Foto Yang Valid.
        1. Pas Foto Ukuran 3x4 
        2. Ukuran Maksimal 1.5 MB. 
        3. Format .jpg, .jpeg, .png.
        4. Background Berwarna Merah.
            ";

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
        }

        if ($request->notifikasi_admin == 'Cetak Formulir') {
            $target = $request->no_hp;
            $message = "Harap Masuk ke Akun PPDB SMK Ma'arif NU Doro dan Cetak Formulir Pendaftaran.

        Setelah mencetak formulir pendaftaran dari akun PPDB SMK Ma'arif NU Doro, selanjutnya silakan mengikuti ujian PPDB di SMK Ma'arif NU Doro dengan membawa formulir pendaftaran yang telah dicetak.
        ";

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
        }

        if ($request->notifikasi_admin == 'Tidak Lulus Ujian') {
            $target = $request->no_hp;
            $message = "Maaf, kami ingin memberitahukan bahwa Anda belum berhasil lolos dalam ujian PPDB SMK Ma'arif NU Doro. 
        Meskipun demikian, jangan putus asa dan tetap semangat untuk mencoba di masa yang akan datang. 
        Terima kasih atas partisipasi Anda.
            ";

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
        }

        if ($request->notifikasi_admin == 'Lengkapi Berkas') {
            $target = $request->no_hp;
            $message = " Selamat! Kami senang memberitahukan bahwa Anda telah LULUS ujian PPDB SMK SMK Ma'arif NU Doro.

        Langkah berikutnya adalah melengkapi berkas pendaftaran pada akun PPDB SMK Ma'arif NU Doro.

        Pastikan untuk menyertakan dokumen-dokumen berikut dalam format PDF dan tidak melebihi ukuran 1.5MB:

        1. Akta Kelahiran,
        2. Kartu Keluarga (KK),
        3. Surat Keterangan Hasil Ujian Nasional (SHUN),
        4. Ijazah terakhir,
        5. Raport terakhir,
        6. Transkrip Nilai,

        Terima kasih atas kerjasamanya, dan kami tunggu segera kiriman berkas pendaftarannya!.
            ";

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
        }

        if ($request->notifikasi_admin == 'Masukan Akta Yang Valid' || $request->notifikasi_admin == 'Masukan KK Yang Valid' || $request->notifikasi_admin == 'Masukan SHUN Yang Valid' || $request->notifikasi_admin == 'Masukan Ijazah Yang Valid' || $request->notifikasi_admin == 'Masukan Raport Yang Valid' || $request->notifikasi_admin == 'Masukan Transkrip Nilai Yang Valid') {

            if ($request->notifikasi_admin == 'Masukan Akta Yang Valid') {
                $value = 'Akta';
            } elseif ($request->notifikasi_admin == 'Masukan KK Yang Valid') {
                $value = 'Kartu Keluarga';
            } elseif ($request->notifikasi_admin == 'Masukan SHUN Yang Valid') {
                $value = 'Surat Keterangan Hasil Ujian Nasional';
            } elseif ($request->notifikasi_admin == 'Masukan Ijazah Yang Valid') {
                $value = 'Ijazah';
            } elseif ($request->notifikasi_admin == 'Masukan Raport Yang Valid') {
                $value = 'Raport';
            } elseif ($request->notifikasi_admin == 'Masukan Transkrip Nilai Yang Valid') {
                $value = 'Transkrip Nilai';
            } else {
                // Notifikasi tidak dikenali
                $value = 'Notifikasi tidak dikenali';
            }

            $message = "Mohon unggah $value yang valid.";


            $target = $request->no_hp;
            $message = "Masukan " . $value . "yang valid.
        Ketentuan:
        1. Berkas berformat PDF
        2. Ukuran maksimal 1.5 MB.
        ";

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
        }

        if ($request->notifikasi_admin == 'Pendaftaran Selesai') {
            $target = $request->no_hp;
            $message = "Pendaftaran PPDB SMK Maarif NU Doro selesai. Terima kasih atas partisipasi Anda.
            ";

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
        }

        if ($request->notifikasi_admin === "Lulus Ujian" || $request->notifikasi_admin === "Tidak Lulus Ujian" || $request->notifikasi_admin === "Lengkapi Berkas") {
            $request->validate([
                'btq'       => 'required',
                'akademik'  => 'required',
                'berat_badan'  => 'required',
                'tinggi_badan'  => 'required',
            ], [
                'btq.required'       => 'Nilai BTQ wajib diisi',
                'akademik.required'  => 'Nilai Akademik wajib diisi',
                'berat_badan.required'  => 'Nilai Berat Badan wajib diisi',
                'tinggi_badan.required'  => 'Nilai Tinggi Badan wajib diisi',
            ]);
        }

        if ($request->notifikasi_admin === "Pendaftaran Selesai") {
            CalonSiswa::where('nik', $id)->update([
                'status' => 1
            ]);
        }

        $request->validate([
            'nik'       => 'min:16|max:16',
        ], [
            'nik.min'       => 'Panjang NIK harus 16 karakter',
            'nik.max'       => 'Panjang NIK harus 16 karakter',
        ]);

        PenilaianModel::where('nik', $id)->update([
            'btq' =>  $request->btq,
            'akademik' =>  $request->akademik,
            'berat_badan' =>  $request->berat_badan,
            'tinggi_badan' =>  $request->tinggi_badan,
            'tatto' =>  $request->tatto,
            'tindik' =>  $request->tindik,
            'tangan' =>  $request->tangan,
            'kaki' =>  $request->kaki,
            'riwayat_penyakit' =>  $request->riwayat_penyakit,
            'lainnya' =>  $request->lainnya,
        ]);

        if ($request->reset_password !== null) {

            $request->validate([
                'reset_password'  => 'min:6'
            ], [
                'reset_password.min'          => 'Password minimal 6 karakter.',
            ]);

            $new_password = $request->reset_password;
            CalonSiswa::where('nik', $id)->update([
                'password' => Hash::make($new_password),
            ]);
        }

        CalonSiswa::where('nik', $id)->update([
            'no_pendaftaran' => $request->no_pendaftaran,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'provinsi' => $request->provinsi,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'kode_pos' => $request->kode_pos,
            'notifikasi_admin' => $request->notifikasi_admin,
        ]);

        DetailCalonSiswaModel::where('nik', $id)->update([
            'jalur_pendaftaran' => $request->jalur_pendaftaran,
            'prodi' => $request->prodi,
            'wearpack' => $request->wearpack,
            'asal_sekolah' => $request->asal_sekolah,
            'tahun_lulus' => $request->tahun_lulus,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_hp_wali' => $request->no_hp_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function berandaSiswaUnvertifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        // delete no pendaftaran
        $siswa = CalonSiswa::where('nik', $id);
        $nama = $siswa->where('nik', $id)->first();

        CalonSiswa::where('nik', $id)->update(['notifikasi_admin' => 'Berkas Terupdate']);
        $siswa->update(['status' => 0]);

        return redirect()->back()->with('success', 'Status ' . $nama->nama . ' berhasil diperbarui');
    }

    public function berandaSiswaVertifikasi(Request $request, $id)
    {
        $siswa = CalonSiswa::where('nik', $id)->first();
        if ($siswa->notifikasi_admin !== 'Pendaftaran Selesai') {
            return redirect()->back()->with('error', 'Pendaftaran ' . $siswa->nama . ' Belum Selesai');
        }
        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        $nama = $siswa->where('nik', $id)->first();

        $siswa->update(['status' => 1]);
        return redirect()->back()->with('success', 'Status ' . $nama->nama . ' berhasil diperbarui');
    }

    public function berandaSiswaDelete($id)
    {
        $berkasSiswa = BerkasSiswa::where('nik', $id)->first();
        $user = CalonSiswa::where('nik', $id)->first();

        // Periksa apakah data ada sebelum mencoba untuk menghapusnya
        if ($berkasSiswa) {
            if (Storage::exists('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $berkasSiswa->akta)) {
                Storage::delete('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $berkasSiswa->akta);
            }

            if (Storage::exists('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $berkasSiswa->kk)) {
                Storage::delete('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $berkasSiswa->kk);
            }

            if (Storage::exists('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $user->detailCalonSiswa->pas_foto)) {
                Storage::delete('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $user->detailCalonSiswa->pas_foto);
            }

            if (Storage::exists('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $berkasSiswa->shun)) {
                Storage::delete('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $berkasSiswa->shun);
            }

            if (Storage::exists('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $berkasSiswa->ijazah)) {
                Storage::delete('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $berkasSiswa->ijazah);
            }

            if (Storage::exists('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $berkasSiswa->raport)) {
                Storage::delete('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $berkasSiswa->raport);
            }

            if (Storage::exists('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $berkasSiswa->transkrip_nilai)) {
                Storage::delete('public/siswa/' . $user->tahun_daftar . '/' . $user->nik  . '/' . $berkasSiswa->transkrip_nilai);
            }
        }

        BerkasSiswa::where('nik', $id)->delete();
        PenilaianModel::where('nik', $id)->delete();
        DetailCalonSiswaModel::where('nik', $id)->delete();
        OtpModel::where('nik', $id)->delete();
        CalonSiswa::where('nik', $id)->delete();

        // Atur ulang nilai auto-increment
        DB::statement('ALTER TABLE calon_siswa AUTO_INCREMENT = 1;');
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function pengaturan()
    {
        $pengaturan         = PengaturanModel::get();
        $data = [
            'pengaturan'        => $pengaturan,
            'title'             => 'Pengaturan Admin',
        ];

        return view('admin.admin-pengaturan', $data);
    }

    public function pengaturanBeranda()
    {
        $beranda    = BerandaModel::get();
        $data = [
            'beranda'   => $beranda,
            'title'     => 'Pengaturan Admin',
        ];
        return view('admin.pengaturan.beranda.edit-beranda', $data);
    }

    public function pengaturanTambahBeranda()
    {
        $beranda    = BerandaModel::get();
        $data = [
            'beranda'   => $beranda,
            'title'     => 'Pengaturan Admin',
        ];
        return view('admin.pengaturan.beranda.tambah-beranda', $data);
    }

    public function pengaturanCreateBeranda(Request $request)
    {
        $request->validate([
            'judul'     => 'required|unique:beranda',
            'konten'    => 'required',
        ]);
        $beranda = new BerandaModel();
        $beranda->judul = $request->input('judul');
        $beranda->konten = $request->input('konten');
        $beranda->save();

        return redirect()->route('admin-pengaturan-beranda')->with('success', 'Beranda berhasil disimpan!');
    }

    public function pengaturanUpdateBeranda($id)
    {
        $beranda    = BerandaModel::find($id);
        $data = [
            'beranda'   => $beranda,
            'title'     => 'Pengaturan Admin',
        ];
        return view('admin.pengaturan.beranda.update-beranda', $data);
    }

    public function postPengaturanUpdateBeranda(Request $request, $id)
    {
        BerandaModel::where('id', $id)->update([
            'judul' => $request->judul,
            'konten' => $request->konten
        ]);
        return redirect()->back()->with('success', 'Beranda berhasil diupdate!');
    }

    public function postPengaturanUpdateStatusFalseBeranda($id)
    {
        $beranda = BerandaModel::where('id', $id);
        $beranda->update(['status' => 1]);
        $j_beranda = $beranda->first();
        return redirect()->back()->with('success', 'Status ' . $j_beranda->judul . ' berhasil diperbarui');
    }

    public function postPengaturanUpdateStatusTrueBeranda($id)
    {
        $beranda = BerandaModel::where('id', $id);
        $beranda->update(['status' => 0]);
        $j_beranda = $beranda->first();
        return redirect()->back()->with('success', 'Status ' . $j_beranda->judul . ' berhasil diperbarui');
    }

    public function pengaturanHapusBeranda($id)
    {
        $beranda = BerandaModel::where('id', $id);
        $beranda->delete();
        $j_beranda = $beranda->first();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function pengaturanUpdate(Request $request, $id)
    {
        $pengaturan = PengaturanModel::findOrFail($id);
        $columnToUpdate = $request->input('update_column');
        $pengaturan->$columnToUpdate = !$pengaturan->$columnToUpdate;
        $pengaturan->save();
        return redirect()->back();
    }

    public function pengaturanKontak()
    {
        $pengaturan    = PengaturanModel::get();
        $id = PengaturanModel::first();
        $data = [
            'id'            => $id->id,
            'pengaturan'    => $pengaturan,
            'title'         => 'Pengaturan Admin',
        ];
        return view('admin.pengaturan.kontak.edit-kontak', $data);
    }

    public function postPengaturanKontak(Request $request, $id)
    {
        $input = $request->input('link_map');
        preg_match('/src="([^"]+)"/', $input, $matches);
        $url = $matches[1];

        $pengaturan    = PengaturanModel::get();

        PengaturanModel::where('id', $id)
            ->update([
                'wa'        => $request->wa,
                'ig'        => $request->ig,
                'fb'        => $request->fb,
                'yt'        => $request->yt,
                'web'       => $request->web,
                'map'       => $request->map,
                'link_map'  => $url,
            ]);

        $data = [
            'pengaturan'    => $pengaturan,
            'title'         => 'Pengaturan Admin',
        ];
        return redirect()->back()->with('success', 'Kontak berhasil diupdate!');
    }

    public function pengaturanInformasi()
    {
        $informasi    = PengaturanModel::select('j_informasi', 'informasi', 'id')->first();

        $data = [
            'informasi'    => $informasi,
            'title'         => 'Pengaturan Admin',
        ];
        return view('admin.pengaturan.informasi.edit-informasi', $data);
    }

    public function pengaturanInformasiPost(Request $request, $id)
    {
        $informasi    = PengaturanModel::where('id', $id)->first();

        $informasi->update([
            'j_informasi' => $request->j_informasi,
            'informasi' => $request->informasi
        ]);

        return redirect()->back()->with('success', 'Informasi berhasil diupdate!');
    }

    public function pusatAkun()
    {
        $admin  = Auth::guard('admin')->user();
        $email = $admin->email;
        $akun = AdminModel::where('email', $email)->first();

        $data = [
            'akun'      => $akun,
            'title'     => 'Pusat Akun',
        ];
        return view('admin.admin-pusat-akun', $data);
    }

    public function pusatAkunPost(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'email' => 'required|email|ends_with:@gmail.com',
            'password' => 'nullable|confirmed|min:5',
        ], [
            'email.email'           => 'Harus diisi dengan email.',
            'email.ends_with'       => 'Email harus @gmail.com.',
            'password.confirmed'    => 'Password tidak cocok.',
            'password.min'          => 'Password minimal 5 karakter.',
        ]);

        $updateData = [];

        if ($request->filled('email')) {
            $updateData['email'] = $request->email;
            $pesan = 'Email';
        }

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
            $pesan = 'Password';
        }

        AdminModel::where('id', $id)->update($updateData);

        return redirect()->back()->with('success', $pesan . ' berhasil diubah');
    }

    public function penelusuran(Request $request)
    {
        $keyword = $request->input('search');
        $calonSiswa = CalonSiswa::admin($keyword)->orderBy('nama', 'asc')->get();

        $data = [
            'hasil' => $request->search,
            'title' => 'Hasil Penelusuran'
        ];
        return view('admin.admin-penelusuran', $data,  compact('calonSiswa'))->with('success', '');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('auth-admin');
    }
}
