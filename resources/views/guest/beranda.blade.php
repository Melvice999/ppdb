@extends('layouts.layout')
@section('content')
    {{-- header --}}
    <div class="overflow-hidden">

        <div class="bg-d-sky-blue max-md:h-64">
            {{-- animasi awan --}}
            <div class="awan">
                <img src="{{ asset('asset/img/awan.png') }}" alt="" style="animation: awan 20s linear infinite;">
                <img src="{{ asset('asset/img/awan.png') }}" alt="" style="animation: awan 40s linear infinite;">
                <img src="{{ asset('asset/img/awan.png') }}" alt="" style="animation: awan 28s linear infinite;">
                <img src="{{ asset('asset/img/awan.png') }}" alt="" style="animation: awan 16s linear infinite;">
            </div>

            {{-- logo --}}
            <div class="absolute top-16 uppercase sm:left-10 md:left-36 lg:left-56 xl:left-80 2xl:left-96">
                <div class="flex">
                    <div class="m-5 max-md:hidden">
                        <img src="{{ asset('asset/img/logo_smk.png') }}" alt="" width="100">
                    </div>
                    <div
                        class="font-aldrich my-auto tracking-widest text-xl font-bold text-d-green max-md:text-lg max-md:mt-5 max-md:ml-5">
                        Penerimaan Peserta Didik Baru <br>
                        SMK Ma’arif NU Doro
                    </div>
                </div>
            </div>

            {{-- tombol daftar dan masuk --}}
            <div class="border-d-green text-d-green">
                <div class="absolute top-52 sm:left-20 md:left-28 max-md:top-44 lg:left-48 xl:left-64 2xl:left-96">
                    <div class="flex ml-20 sm:gap-10 lg:gap-36 max-md:block">
                        <a href="daftar"
                            class="px-16 py-3 border-2 rounded border-d-green bg-white cursor-pointer max-md:block">
                            Daftar
                        </a>
                        <a href="{{ route('auth-siswa.index') }}"
                            class="px-16 py-3 border-2 rounded border-d-green bg-white cursor-pointer max-md:mt-4 max-md:block">
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex mt-16 ml-10 mr-10 gap-9 text-center max-md:block max-md:mt-6">
        <div class="w-1/2 px-10 bg-white max-md:w-full max-md:px-10 rounded-md whitespace-pre-line text-justify">
            <div class="text-lg font-bold">
                Informasi PPDB SMK Ma'arif NU Doro 2024/2025
                <hr class="text-d-sky-blue mt-10">
            </div>
            <div>
                Pendaftaran dapat dilakukan secara online melalui website ini, atau dapat langsung datang ke SMK Ma'arif NU
                Doro
                setiap hari kerja, mulai pukul 08.00 s.d 14.00 WIB.

                Jadwal Pendaftaran :
                Gelombang 1 : ...
                Test Gelombang 1 : ...
                Pengumuman Gelombang 1 : ...

                Gelombang 2 : ...
                Test Gelombang 2 : ...
                Pengumuman Gelombang 2 : ...

                Gelombang 3 : ...
                Test Gelombang 3 : ...
                Pengumuman Gelombang 3 : ...

                Biaya pendaftaran (...)

                Sebelum mendaftar, pastikan calon siswa telah menyiapkan data yang akan diisi pada formulir pendaftaran.
                Pastikan program keahlian/jurusan yang akan dipilih.

                Untuk informasi lebih lanjut dapat menghubungi kontak di bawah ini.

                SMK Ma'arif NU Doro
                Jl. Raya Doro-Jolotigo, Doro, Pekalongan, Jawa Tengah
                Telp. 08XX-XXXX-XXXX
                Email. smkmaarifnudoro@gmail.com
            </div>
        </div>

        <div
            class="w-1/2 bg-white px-10 max-md:w-full max-md:px-10 rounded-md max-md:mt-6 whitespace-pre-line text-justify">
            <div class="text-lg font-bold">
                LANGKAH-LANGKAH PPDB 2024 SMK MA'ARIF NU DORO
                <hr class="text-d-sky-blue mt-10">
            </div>
            <div>
                <ol class="list-decimal">
                    <li>Sebelum melakukan pendaftaran, pastikan calon peserta didik menyiapkan kelengkapan data yang akan
                        digunakan saat pendaftaran.</li>
                    <li>Pendaftaran dapat dilakukan secara online melalui website (smkmaarifnudoro.sch.id) atau datang
                        langsung ke SMK Ma'arif NU Doro.
                    </li>
                    <li>Jika telah menyelesaikan pendaftaran secara online, segera datang ke sekolah untuk mencetak formulir
                        dan melihat waktu/jadwal test selanjutnya.
                    </li>
                    <li>Jika telah mendaftar dan mengetahul jadwal test, maka diharapkan untuk hadir pada waktu tersebut,
                        jika tidak hadir maka dianggap gugur atau tidak lulus.
                    </li>
                    <li>Bagi calon peserta didik yang telah dianggap LULUS, maka diwajibkan melakukan pendafatan ulang pada
                        waktu/jadwal.
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="flex mt-16 ml-10 mr-10 gap-9 text-center max-md:block max-md:mt-6">
        <div class="w-1/2 px-10 bg-white max-md:w-full max-md:px-10 rounded-md whitespace-pre-line text-justify">
            <div class="text-lg font-bold">
                Informasi PPDB SMK Ma'arif NU Doro 2024/2025
                <hr class="text-d-sky-blue mt-10">
            </div>
            <div>
                Pendaftaran dapat dilakukan secara online melalui website ini, atau dapat langsung datang ke SMK Ma'arif NU
                Doro setiap hari kerja, mulai pukul 08.00 s.d 14.00 WIB.
            </div>
        </div>
        <div
            class="w-1/2 bg-white px-10 max-md:w-full max-md:px-10 rounded-md max-md:mt-6 whitespace-pre-line text-justify">
            <div class="text-lg font-bold"> Informasi PPDB SMK Ma'arif NU Doro 2024/2025
                <hr class="text-d-sky-blue mt-10">
            </div>
            <div> Pendaftaran dapat dilakukan secara online melalui website ini, atau dapat langsung datang ke SMK Ma'arif
                NU Doro setiap hari kerja, mulai pukul 08.00 s.d 14.00 WIB.
            </div>
        </div>
    </div>
@endsection()
