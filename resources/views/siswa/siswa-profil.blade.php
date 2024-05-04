@extends('layouts.siswa-layout')
@section('content')
    @if (session('success'))
        <div class="flex justify-center mt-3 mx-10 max-md:block">
            <div class="w-1/2 mt-2 max-md:w-full">
                <div class="grid grid-cols-1 gap-6 max-md:grid-cols-1">
                    <div
                        class="flex justify-center items-center w-full h-10 rounded max-md:w-full border-d-green border cursor-pointer bg-d-green text-white">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="flex justify-center mt-3 mx-10 max-md:block">
        <div class="w-1/2 mt-2 max-md:w-full">
            <div
                class="flex justify-center items-center w-full px-2 py-1 rounded max-md:w-full border-d-green border cursor-pointer bg-white text-d-green">
                {{ $notifikasi->notifikasi }}

            </div>
        </div>
    </div>

    <div class="flex justify-center mt-6 mx-10 max-md:block">
        <div class="w-1/2 p-10 bg-white max-md:w-full rounded-md">

            <div class="grid grid-cols-3 max-md:block">

                <div class="flex justify-center items-center">

                    <img src="{{ asset('storage/siswa/pas-foto/' . $user->pas_foto) }}" alt="foto-siswa"
                        class="w-24 h-36 rounded-3xl max-md:mb-5">
                </div>

                <div class="col-span-2">

                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                        <div class="col-span-2">
                            No Pendaftaran
                        </div>

                        <div class="col-span-2">
                            <span class="max-md:hidden">:</span>
                            {{ $user->no_pendaftaran }}
                        </div>
                    </div>

                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                        <div class="col-span-2">
                            Nama
                        </div>
                        <div class="col-span-2">
                            <span class="max-md:hidden">:</span>
                            {{ $user->nama }}
                        </div>
                    </div>

                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                        <div class="col-span-2">
                            Jurusan
                        </div>
                        <div class="col-span-2">
                            <span class="max-md:hidden">:</span>

                            {{ $user->prodi }}
                        </div>
                    </div>

                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                        <div class="col-span-2">
                            Jenis Kelamin
                        </div>
                        <div class="col-span-2">
                            <span class="max-md:hidden">:</span>

                            {{ $user->jenis_kelamin }}
                        </div>
                    </div>

                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                        <div class="col-span-2">
                            Aksi
                        </div>
                        <div class="col-span-2 flex">
                            <span class="max-md:hidden">:&nbsp;</span>

                            {{ $notifikasi->notifikasi === 'Selamat anda lulus ujian pendaftaran' ? '-' : '' }}
                            <a href="{{ route(
                                $notifikasi->notifikasi === 'Pendaftaran sedang diproses'
                                    ? 'siswa-profil'
                                    : ($notifikasi->notifikasi === 'Selamat anda lulus ujian pendaftaran'
                                        ? 'siswa-profil'
                                        : ($notifikasi->notifikasi === 'Lengkapi Berkas'
                                            ? 'siswa-upload-berkas'
                                            : ($notifikasi->notifikasi === 'Perbarui Akta Yang Valid' ||
                                            $notifikasi->notifikasi === 'Perbarui KK Yang Valid' ||
                                            $notifikasi->notifikasi === 'Perbarui Pas Foto Yang Valid' ||
                                            $notifikasi->notifikasi === 'Perbarui SHUN Yang Valid' ||
                                            $notifikasi->notifikasi === 'Perbarui Ijazah Yang Valid' ||
                                            $notifikasi->notifikasi === 'Perbarui Raport Yang Valid' ||
                                            $notifikasi->notifikasi === 'Perbarui Transkip Nilai Yang Valid'
                                                ? 'siswa-update-berkas'
                                                : 'siswa-cetak-formulir'))),
                            ) }}"
                                class="flex">

                                <div
                                    class="flex justify-center items-center py-1 px-2 my-1 rounded bg-d-green text-white border cursor-pointer hover:bg-white hover:text-d-green {{ $notifikasi->notifikasi === 'Selamat anda lulus ujian pendaftaran' ? 'hidden' : '' }}">
                                    {{ $notifikasi->notifikasi === 'Pendaftaran sedang diproses'
                                        ? 'Pendaftaran sedang diproses'
                                        : ($notifikasi->notifikasi === 'Selamat anda lulus ujian pendaftaran'
                                            ? ''
                                            : ($notifikasi->notifikasi === 'Lengkapi Berkas'
                                                ? 'Upload Berkas'
                                                : ($notifikasi->notifikasi === 'Perbarui Akta Yang Valid' ||
                                                $notifikasi->notifikasi === 'Perbarui KK Yang Valid' ||
                                                $notifikasi->notifikasi === 'Perbarui Pas Foto Yang Valid' ||
                                                $notifikasi->notifikasi === 'Perbarui SHUN Yang Valid' ||
                                                $notifikasi->notifikasi === 'Perbarui Ijazah Yang Valid' ||
                                                $notifikasi->notifikasi === 'Perbarui Raport Yang Valid' ||
                                                $notifikasi->notifikasi === 'Perbarui Transkip Nilai Yang Valid'
                                                    ? 'Update Berkas'
                                                    : 'Cetak Formulir'))) }}
                                </div>
                            </a>

                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>
@endsection
