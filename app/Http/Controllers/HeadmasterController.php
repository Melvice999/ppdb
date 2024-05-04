<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\HeadmasterModel;
use App\Models\PenilaianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;


class HeadmasterController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Beranda Kepala Sekolah'
        ];
        return view('headmaster.headmaster-beranda', $data);
    }

    public function formulirTahun()
    {
        $tahun = CalonSiswa::select('tahun_daftar')->groupBy('tahun_daftar')->get();

        $data = [
            'tahun'     => $tahun,
            'title'     => 'Cetak Formulir'
        ];

        return view('headmaster.cetak.formulir.formulir-tahun', $data);
    }

    public function cetakFormulirTahun($id)
    {
        $tkj = CalonSiswa::where('notifikasi_admin', 'Lulus Ujian')
            ->where('tahun_daftar', $id)
            ->where('prodi', 'TKJ')
            ->orderBy('nama', 'asc')
            ->get();

        $tbsm = CalonSiswa::where('notifikasi_admin', 'Lulus Ujian')
            ->where('tahun_daftar', $id)
            ->where('prodi', 'TBSM')
            ->orderBy('nama', 'asc')
            ->get();

        $tkro = CalonSiswa::where('notifikasi_admin', 'Lulus Ujian')
            ->where('tahun_daftar', $id)
            ->where('prodi', 'TKRO')
            ->orderBy('nama', 'asc')
            ->get();

        $akl = CalonSiswa::where('notifikasi_admin', 'Lulus Ujian')
            ->where('tahun_daftar', $id)
            ->where('prodi', 'AKL')
            ->orderBy('nama', 'asc')
            ->get();

        $data = [
            'tahun'     => $id,
            'tkj'       => $tkj,
            'tbsm'      => $tbsm,
            'akl'       => $akl,
            'tkro'      => $tkro,
            'ctkj'      => $tkj->count(),
            'ctbsm'     => $tbsm->count(),
            'ctkro'     => $tkro->count(),
            'cakl'      => $akl->count(),
            'title'     => 'Cetak Formulir'
        ];

        return view('headmaster.cetak.formulir.cetak-formulir-tahun', $data);
    }

    public function cetakFormulirSiswa($id)
    {

        $user = CalonSiswa::where('nik', $id)->where('notifikasi_admin', 'Lulus Ujian')->first();
        $penilaian = PenilaianModel::where('nik', $id)->first();

        $data = [
            'user' => $user,
            'penilaian' => $penilaian,

            'title'     => 'Cetak Formulir'
        ];
        return view('headmaster.cetak.formulir.formulir-siswa', $data);
    }

    public function cetakFormulirSiswaPost($id)
    {
        $user = CalonSiswa::where('nik', $id)->where('notifikasi_admin', 'Lulus Ujian')->first();
        $penilaian = PenilaianModel::where('nik', $id)->first();

        $data = [
            'penilaian' => $penilaian,
            'user'  => $user,
        ];

        // Generate PDF content
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);
        $html = view('siswa.cetak-formulir.siswa-cetak-formulir', $data)->render();

        // Load HTML content
        $dompdf->loadHtml($html);

        // Render PDF (optional: set Paper size and orientation)
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Get PDF content
        $pdfContent = $dompdf->output();

        // Create response with PDF content for download
        $response = new Response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'attachment; filename="formulir_' . $user->nama . '.pdf"');

        return $response;
    }


    public function rekapPpdb()
    {
        $tahun = CalonSiswa::where('notifikasi_admin', 'Lulus Ujian')->select('tahun_daftar')->groupBy('tahun_daftar')->get();

        $data = [
            'tahun'     => $tahun,
            'title'     => 'Cetak Rekap PPDB'
        ];

        return view('headmaster.cetak.rekap.cetak-rekap-ppdb', $data);
    }

    public function cetakRekapTahun($id)
    {
        $user = CalonSiswa::where('tahun_daftar', $id)->where('notifikasi_admin', 'Lulus Ujian')->orderBy('prodi', 'asc')->get();
        $data = [
            'tahun'     => $id,
            'user'     => $user,
            'title'     => 'Cetak Rekap PPDB'
        ];

        return view('headmaster.cetak.rekap.cetak-rekap-tahun', $data);
    }

    public function cetakRekapTahunPost($id)
    {
        $user = CalonSiswa::where('tahun_daftar', $id)->where('notifikasi_admin', 'Lulus Ujian')->orderBy('prodi', 'asc')->get();
        $data = [
            'tahun'     => $id,
            'user'     => $user,
            'title'     => 'Cetak Rekap PPDB'
        ];

        // Generate PDF content
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);
        $html = view('headmaster.cetak.rekap.cetak-rekap-ppdb-pdf-cetak', $data)->render();

        // Load HTML content
        $dompdf->loadHtml($html);

        // Render PDF (optional: set Paper size and orientation)
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Get PDF content
        $pdfContent = $dompdf->output();

        // Create response with PDF content for download
        $response = new Response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'attachment; filename="Rekap_PPDB_Tahun' . $id . '.pdf"');

        return $response;
    }


    public function pusatAkun()
    {
        $headmaster  = Auth::guard('headmaster')->user();
        $email = $headmaster->email;
        $akun = HeadmasterModel::where('email', $email)->first();

        $data = [
            'akun'      => $akun,
            'title'     => 'Pusat Akun',
        ];
        return view('headmaster.headmaster-pusat-akun', $data);
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

        HeadmasterModel::where('id', $id)->update($updateData);

        return redirect()->back()->with('success', $pesan . ' berhasil diubah');
    }

    public function penelusuran(Request $request)
    {
        $keyword = $request->input('search');
        $calonSiswa = CalonSiswa::headmaster($keyword)->where('notifikasi_admin', 'Lulus Ujian')->orderBy('nama', 'asc')->get();

        $data = [
            'hasil' => $request->search,
            'title' => 'Hasil Penelusuran'
        ];
        return view('headmaster.headmaster-penelusuran', $data,  compact('calonSiswa'))->with('success', '');
    }

    public function logout()
    {
        Auth::guard('headmaster')->logout();
        return redirect('auth-headmaster');
    }
}
