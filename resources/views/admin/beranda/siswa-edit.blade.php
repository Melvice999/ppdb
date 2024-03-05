@extends('layouts.admin-layout')
@section('content')
    <div class=" text-2xl font-medium">
        Admin / Beranda / Siswa / Edit
    </div>

    @if (session('success'))
        <div class="grid mt-6 mx-auto place-items-center">
            <div class="w-full text-white bg-d-green rounded-md mb-6">
                <ul class="p-4">
                    <li> {{ session('success') }}
                    </li>
                </ul>
            </div>
        </div>
    @endif

    <div class="grid max-md:place-content-center mt-10 mb-2">
        Edit Biodata Siswa
    </div>

    <div class="w-full grid place-content-center">
        <img src="{{ asset('assets/siswa/pas-foto/foto_profil.png') }}"
            class="w-40 h-60 rounded-xl overflow-hidden mb-3 bg-white" alt="">
    </div>

    <form action="{{ route('admin-beranda-siswa-edit-post', ['id' => $siswa->nik]) }}" method="POST">
        @csrf
        <div class="grid mt-6 max-md:place-items-center">
            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full">
                <label class="w-1/5" for="nik">NIK</label><br>
                <input type="text" name="nik" value="{{ $siswa->nik }}" placeholder="Masukan NIK"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="kk">No KK</label><br>
                <input type="text" name="kk" value="{{ $siswa->kk }}" placeholder="Masukan No KK"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="nama">Nama Lengkap</label><br>
                <input type="text" name="nama" value="{{ $siswa->nama }}" placeholder="Masukan Nama Lengkap"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="tempat_lahir">Tempat Lahir</label><br>
                <input type="text" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}"
                    placeholder="Masukan Tempat Lahir"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="tanggal_lahir">Tanggal Lahir</label><br>
                <input type="date" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="no_hp">No Hp</label><br>
                <input type="text" name="no_hp" value="{{ $siswa->no_hp }}" placeholder="Masukan No Hp"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="provinsi">Provinsi</label><br>
                <input name="provinsi" value="{{ $siswa->provinsi }}" placeholder="Masukan Provinsi"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" required>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="kabupaten">Kabupaten / Kota</label><br>
                <input name="kabupaten" value="{{ $siswa->kabupaten }}" placeholder="Masukan Kabupaten"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" required>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="kecamatan">Kecamatan</label><br>
                <input name="kecamatan" value="{{ $siswa->kecamatan }}" placeholder="Masukan Kecamatan"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" required>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="desa">Desa</label><br>
                <input name="desa" value="{{ $siswa->desa }}" placeholder="Masukan Desa"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" required>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="kode_pos">Kode Pos</label><br>
                <input name="kode_pos" value="{{ $siswa->kode_pos }}" placeholder="Masukan Kode Pos"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" required>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="rt">RT</label><br>
                <input type="text" name="rt" value="{{ $siswa->rt }}" placeholder="Masukan RT"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="rw">RW</label><br>
                <input type="text" name="rw" value="{{ $siswa->rw }}" placeholder="Masukan RW"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="jenis_kelamin">Jenis Kelamin</label><br>
                <select name="jenis_kelamin"
                    class="mt-1 w-full py-2 focus:outline-none border border-d-green rounded-xl ps-2 cursor-pointer">
                    <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}> Laki-laki
                    </option>
                    <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="warga_negara">Warga Negara</label><br>
                <select name="warga_negara"
                    class="mt-1 w-full py-2 focus:outline-none border border-d-green rounded-xl ps-2 cursor-pointer">
                    <option value="WNI" {{ $siswa->warga_negara == 'WNI' ? 'selected' : '' }}> WNI
                    </option>
                    <option value="WNA" {{ $siswa->warga_negara == 'WNA' ? 'selected' : '' }}>WNA
                    </option>
                </select>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="prodi">Program Studi</label><br>
                <select name="prodi"
                    class="mt-1 w-full py-2 focus:outline-none border border-d-green rounded-xl ps-2 cursor-pointer">
                    <option value="TBSM" {{ $siswa->prodi == 'TBSM' ? 'selected' : '' }}> TBSM
                    </option>
                    <option value="TKRO" {{ $siswa->prodi == 'TKRO' ? 'selected' : '' }}>TKRO
                    </option>
                    <option value="TKJ" {{ $siswa->prodi == 'TKJ' ? 'selected' : '' }}>TKJ
                    </option>
                    <option value="AKL" {{ $siswa->prodi == 'AKL' ? 'selected' : '' }}>AKL
                    </option>
                </select>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="batik">Ukuran Batik</label><br>
                <select name="batik"
                    class="mt-1 w-full py-2 focus:outline-none border border-d-green rounded-xl ps-2 cursor-pointer">
                    <option value="S" {{ $siswa->batik == 'S' ? 'selected' : '' }}> S
                    </option>
                    <option value="M" {{ $siswa->batik == 'M' ? 'selected' : '' }}>M
                    </option>
                    <option value="L" {{ $siswa->batik == 'L' ? 'selected' : '' }}>L
                    </option>
                    <option value="XL" {{ $siswa->batik == 'XL' ? 'selected' : '' }}>XL
                    </option>
                    <option value="XXL" {{ $siswa->batik == 'XXL' ? 'selected' : '' }}>XXL
                    </option>
                </select>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="olahraga">Ukuran Olahraga</label><br>
                <select name="olahraga"
                    class="mt-1 w-full py-2 focus:outline-none border border-d-green rounded-xl ps-2 cursor-pointer">
                    <option value="S" {{ $siswa->olahraga == 'S' ? 'selected' : '' }}> S
                    </option>
                    <option value="M" {{ $siswa->olahraga == 'M' ? 'selected' : '' }}>M
                    </option>
                    <option value="L" {{ $siswa->olahraga == 'L' ? 'selected' : '' }}>L
                    </option>
                    <option value="XL" {{ $siswa->olahraga == 'XL' ? 'selected' : '' }}>XL
                    </option>
                    <option value="XXL" {{ $siswa->olahraga == 'XXL' ? 'selected' : '' }}>XXL
                    </option>
                </select>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="wearpack">Ukuran Wearpack</label><br>
                <select name="wearpack"
                    class="mt-1 w-full py-2 focus:outline-none border border-d-green rounded-xl ps-2 cursor-pointer">
                    <option value="S" {{ $siswa->wearpack == 'S' ? 'selected' : '' }}> S
                    </option>
                    <option value="M" {{ $siswa->wearpack == 'M' ? 'selected' : '' }}>M
                    </option>
                    <option value="L" {{ $siswa->wearpack == 'L' ? 'selected' : '' }}>L
                    </option>
                    <option value="XL" {{ $siswa->wearpack == 'XL' ? 'selected' : '' }}>XL
                    </option>
                    <option value="XXL" {{ $siswa->wearpack == 'XXL' ? 'selected' : '' }}>XXL
                    </option>
                </select>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="asal_sekolah">Asal Sekolah</label><br>
                <input type="text" name="asal_sekolah" value="{{ $siswa->asal_sekolah }}"
                    placeholder="Masukan Nama Asal Sekolah"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="tahun_lulus">Tahun Lulus</label><br>
                <input type="text" name="tahun_lulus" value="{{ $siswa->tahun_lulus }}"
                    placeholder="Masukan Tahun Lulus"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="nama_ayah">Nama Ayah</label><br>
                <input type="text" name="nama_ayah" value="{{ $siswa->nama_ayah }}" placeholder="Masukan Nama Ayah"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="nama_ibu">Nama Ibu</label><br>
                <input type="text" name="nama_ibu" value="{{ $siswa->nama_ibu }}" placeholder="Masukan Nama Ibu"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="no_hp_wali">No Hp Wali</label><br>
                <input type="text" name="no_hp_wali" value="{{ $siswa->no_hp_wali }}"
                    placeholder="Masukan No Hp Wali"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="provinsi_wali">Provinsi Wali</label><br>
                <input name="provinsi_wali" value="{{ $siswa->provinsi_wali }}" placeholder="Masukan Provinsi Wali"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" required>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="kabupaten_wali">Kabupaten / Kota Wali</label><br>
                <input name="kabupaten_wali" value="{{ $siswa->kabupaten_wali }}" placeholder="Masukan Kabupaten Wali"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" required>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="kecamatan_wali">Kecamatan Wali</label><br>
                <input name="kecamatan_wali" value="{{ $siswa->kecamatan_wali }}" placeholder="Masukan Kecamatan Wali"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" required>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="desa_wali">Desa Wali</label><br>
                <input name="desa_wali" value="{{ $siswa->desa_wali }}" placeholder="Masukan Desa Wali"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" required>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="kode_pos_wali">Kode Pos Wali</label><br>
                <input name="kode_pos_wali" value="{{ $siswa->kode_pos_wali }}" placeholder="Masukan Kode Pos Wali"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" required>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="rt_wali">RT Wali</label><br>
                <input type="text" name="rt_wali" value="{{ $siswa->rt_wali }}" placeholder="Masukan RT Wali"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="rw_wali">RW Wali</label><br>
                <input type="text" name="rw_wali" value="{{ $siswa->rw_wali }}" placeholder="Masukan RW Wali"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="pekerjaan_wali">Pekerjaan Wali</label><br>
                <input type="text" name="pekerjaan_wali" value="{{ $siswa->pekerjaan_wali }}"
                    placeholder="Masukan Pekerjaan Wali"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="pendidikan_wali">Pendidikan Wali</label><br>
                <input type="text" name="pendidikan_wali" value="{{ $siswa->pendidikan_wali }}"
                    placeholder="Masukan Pendidikan Wali"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="info_sekolah">Info Sekolah</label><br>
                <input type="text" name="info_sekolah" value="{{ $siswa->info_sekolah }}"
                    placeholder="Mendapatkan Informasi Sekolah Melalui"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none">
            </div>

            <div class="text-end w-full max-md:w-full mb-6">
                <button
                    class="mt-6 py-2 px-7 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                    Selesai
                </button>
            </div>
        </div>
    </form>


    <script type="module">
        $(document).ready(function() {
            // Open Nav Menu
            $("#clsError").click(function() {
                $("#clsErrors").addClass("hidden");
            });
        });
    </script>
@endsection
