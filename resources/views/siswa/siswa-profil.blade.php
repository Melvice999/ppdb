@extends('layouts.siswa-layout')
@section('content')
    @if (session('success'))
        <div class="flex justify-center mt-3 mx-10 max-md:block">
            <div class="w-1/2 mt-2 max-md:w-full">
                <div class="grid grid-cols-1 gap-6 max-md:grid-cols-1">
                    <div
                        class="flex justify-center items-center w-full h-10 rounded bg-white max-md:w-full border-d-green border cursor-pointer hover:bg-d-green hover:text-white">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="flex justify-center mt-6 mx-10 max-md:block">
        <div class="w-1/2 p-10 bg-white max-md:w-full rounded-md">

            <div class="grid grid-cols-3 max-md:block">
                <div class="flex justify-center">
                    <img src="{{ asset($berkas && $berkas->nik ? 'storage/siswa/pas-foto/' . $berkas->pas_foto : 'storage/siswa/pas-foto/foto_profil.png') }}"
                        alt="foto-siswa" class="w-24 h-36 rounded-3xl">
                </div>

                <div class="col-span-2">

                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block max-md:mt-5">
                        <div>
                            Nama
                        </div>
                        <div class="max-md:hidden">:</div>
                        <div class="col-span-2">
                            {{ $user->nama }}
                        </div>
                    </div>

                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                        <div>
                            Jurusan
                        </div>
                        <div class="max-md:hidden">:</div>
                        <div class="col-span-2">
                            {{ $user->prodi }}
                        </div>
                    </div>

                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                        <div>
                            Jenis Kelamin
                        </div>
                        <div class="max-md:hidden">:</div>
                        <div class="col-span-2">
                            {{ $user->jenis_kelamin }}
                        </div>
                    </div>

                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                        <div>
                            Status
                        </div>
                        <div class="max-md:hidden">:</div>
                        <div class="col-span-2">
                            {{ $user->status === 1 ? 'Siswa' : 'Calon Siswa' }}
                        </div>
                    </div>

                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                        <div>
                            No
                        </div>
                        <div class="max-md:hidden">:</div>
                        <div class="col-span-2">
                            PPDB-XXXX-XXXX
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div
        class="{{ $berkas && $berkas->akta ? 'hidden' : 'flex' }} justify-center mt-3 mx-10 max-md:{{ $berkas && $berkas->akta ? 'hidden' : 'block' }}">
        <div class="w-1/2 mt-2 max-md:w-full">
            <div class="grid grid-cols-1 gap-6 max-md:grid-cols-1">

                <a href="{{ route('siswa-upload-berkas') }}">
                    <div
                        class="flex justify-center items-center w-full h-10 rounded bg-white max-md:w-full border-d-green border cursor-pointer hover:bg-d-green hover:text-white">
                        Lengkapi Berkas
                    </div>
                </a>
                
            </div>
        </div>
    </div>

    <div class="{{ $berkas && $berkas->akta ? 'flex mt-4' : 'hidden' }} mt-2 justify-center mx-10 max-md:flex">
        <div
            class="w-1/2 bg-white max-md:w-full rounded-md  border-d-green border cursor-pointer hover:bg-d-green hover:text-white">
            <div class="grid grid-cols-1 max-md:block">

                <a href="{{ route('siswa-update-berkas') }}">
                    <div class="flex justify-center items-center w-full h-10 rounded">
                        Lihat Berkas
                    </div>
                </a>

            </div>
        </div>
    </div>

    <div class="flex justify-center mt-1 mx-10 max-md:block">
        <div class="w-1/2 mt-2 max-md:w-full">
            <div class="grid grid-cols-2 gap-6 max-md:grid-cols-1">

                <a href="{{ route('siswa-formulir-pendaftaran') }}">
                    <div
                        class="flex justify-center items-center w-full h-10 rounded bg-white max-md:w-full border-d-green border cursor-pointer hover:bg-d-green hover:text-white">
                        Lihat Formulir
                    </div>
                </a>

                <div
                    class="flex justify-center items-center w-full h-10 rounded bg-white max-md:w-full border-d-green border cursor-pointer hover:bg-d-green hover:text-white max-md:hidden">
                    Cetak Formulir
                </div>

            </div>
        </div>
    </div>

    <div class="hidden justify-center mx-10 max-md:flex">
        <div
            class="w-1/2 mt-2 bg-white max-md:w-full rounded-md  border-d-green border cursor-pointer hover:bg-d-green hover:text-white">
            <div class="grid grid-cols-1 max-md:block">

                <div class="flex justify-center items-center w-full h-10 rounded">
                    Cetak Formulir
                </div>

            </div>
        </div>
    </div>


    <div class="flex justify-center mt-1 mx-10 max-md:block">
        <div
            class="w-1/2 mt-2 bg-white max-md:w-full rounded-md  border-d-green border cursor-pointer hover:bg-d-green hover:text-white">
            <div class="grid grid-cols-1 max-md:block">

                <div class="flex justify-center items-center w-full h-10 rounded">
                    Pengaturan Akun
                </div>

            </div>
        </div>
    </div>
@endsection
