@extends('layouts.layout')
@section('content')
<div class="grid mt-6 ml-10 mr-10 place-items-center">
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full">
        <label for="nik">NIK</label><br>
        <input type="text" name="nik" placeholder="Masukan NIK" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="no_kk">No KK</label><br>
        <input type="text" name="no_kk" placeholder="Masukan No KK" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="nama_lengkap">Nama Lengkap</label><br>
        <input type="text" name="nama_lengkap" placeholder="Masukan Nama Lengkap" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="tempat_lahir">Tempat Lahir</label><br>
        <input type="text" name="tempat_lahir" placeholder="Masukan Tempat Lahir" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="tanggal_lahir">Tanggal Lahir</label><br>
        <input type="date" name="tanggal_lahir" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="no_hp_siswa">No Hp</label><br>
        <input type="text" name="no_hp_siswa" placeholder="Masukan No Hp" maxlength="15" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="desa_siswa">Desa</label><br>
        <input type="text" name="desa_siswa" placeholder="Masukan Nama Desa" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="rt_siswa">RT</label><br>
        <input type="text" name="rt_siswa" placeholder="Masukan RT" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="rw_siswa">RW</label><br>
        <input type="text" name="rw_siswa" placeholder="Masukan RW" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="kec_siswa">Kecamatan</label><br>
        <input type="text" name="kec_siswa" placeholder="Masukan Nama Kecamatan" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="kab_siswa">Kabupaten</label><br>
        <input type="text" name="kab_siswa" placeholder="Masukan Nama Kabupaten" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="jenis_kelamin">Jenis Kelamin</label><br>
        <input type="text" name="jenis_kelamin" placeholder="Pilih Jenis Kelamin" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="warga_negara">Warga Negara</label><br>
        <input type="text" name="warga_negara" placeholder="Pilih Warga Negara" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="kode_pos_siswa">Kode Pos</label><br>
        <input type="text" name="kode_pos_siswa" placeholder="Masukan Kode Pos" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="prodi">Program Studi</label><br>
        <input type="text" name="prodi" placeholder="Pilih Program Studi" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="batik">Ukuran Batik</label><br>
        <input type="text" name="batik" placeholder="Pilih Ukuran Batik" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="olahraga">Ukuran Olahraga</label><br>
        <input type="text" name="olahraga" placeholder="Pilih Ukuran Olahraga" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="wearpack">Ukuran Wearpack</label><br>
        <input type="text" name="wearpack" placeholder="Pilih Ukuran Wearpack" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="asal_sekolah">Asal Sekolah</label><br>
        <input type="text" name="asal_sekolah" placeholder="Masukan Nama Asal Sekolah" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="tahun_lulus">Tahun Lulus</label><br>
        <input type="text" name="tahun_lulus" placeholder="Masukan Tahun Lulus" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="nama_ayah">Nama Ayah</label><br>
        <input type="text" name="nama_ayah" placeholder="Masukan Nama Ayah" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="nama_ibu">Nama Ibu</label><br>
        <input type="text" name="nama_ibu" placeholder="Masukan Nama Ibu" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="no_hp_wali">No Hp Wali</label><br>
        <input type="text" name="no_hp_wali" placeholder="Masukan No Hp Wali" maxlength="15" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="desa_wali">Desa Wali</label><br>
        <input type="text" name="desa_wali" placeholder="Masukan Nama Desa Wali" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="rt_wali">RT Wali</label><br>
        <input type="text" name="rt_wali" placeholder="Masukan RT Wali" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="rw_wali">RW Wali</label><br>
        <input type="text" name="rw_wali" placeholder="Masukan RW Wali" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="kec_wali">Kecamatan Wali</label><br>
        <input type="text" name="kec_wali" placeholder="Masukan Nama Kecamatan Wali" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="kab_wali">Kabupaten Wali</label><br>
        <input type="text" name="kab_wali" placeholder="Masukan Nama Kabupaten Wali" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="kode_pos_wali">Kode Pos Wali</label><br>
        <input type="text" name="kode_pos_wali" placeholder="Masukan Kode Pos Wali" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="pekerjaan_wali">Pekerjaan Wali</label><br>
        <input type="text" name="pekerjaan_wali" placeholder="Masukan Pekerjaan Wali" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="pendidikan_wali">Pendidikan Wali</label><br>
        <input type="text" name="pendidikan_wali" placeholder="Masukan Pendidikan Wali" class="border-b w-full focus:outline-none">
    </div>
    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
        <label for="info_sekolah">Info Sekolah</label><br>
        <input type="text" name="info_sekolah" placeholder="Mendapatkan Informasi Sekolah Melalui" class="border-b w-full focus:outline-none">
    </div>
</div>
@endsection()
