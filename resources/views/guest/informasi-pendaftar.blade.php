@extends('layouts.layout')
@section('content')
    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="grid mt-6 ml-10 mr-10 mx-auto place-items-center">
            <div class="w-1/2 text-white bg-d-green rounded-md max-md:w-full mt-6">
                <ul class="p-7">
                    <li> {{ session('success') }} </li>
                </ul>
            </div>
        </div>
    @endif

    <div class="grid mt-6 ml-10 mr-10 mx-auto place-items-center">
        <div class="w-1/2 bg-white px-10 max-md:w-full max-md:px-10 rounded-md max-md:mt-6 whitespace-pre-line text-justify">
            <div class="text-lg font-bold">
                LANGKAH-LANGKAH PPDB ONLINE 2024 SMK MA'ARIF NU DORO
                <hr class="text-d-sky-blue mt-10">
            </div>
            <ol class="list-decimal">
                <li>Masuk ke situs web resmi PPDB online.</li>
                <li>Klik opsi "Daftar" yang terdapat pada halaman utama.
                </li>
                <li>Isi formulir pendaftaran dengan informasi yang akurat dan lengkap.
                </li>
                <li>Lanjutkan dengan melakukan registrasi atau membuat akun pribadi dengan mengisi username dan password.
                </li>
                <li>Lakukan proses login menggunakan akun yang telah dibuat sebelumnya.
                </li>
                <li>Lengkapi persyaratan pendaftaran, seperti mengunggah dokumen seperti Kartu Keluarga (KK), akte kelahiran, dan pas foto.
                </li>
            </ol>
        </div>
    </div>
@endsection()
