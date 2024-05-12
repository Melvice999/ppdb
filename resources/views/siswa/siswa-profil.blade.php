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

    <div class="flex justify-center mt-6 mx-10 max-md:block">
        <div class="w-1/2 p-10 bg-white max-md:w-full rounded-md">

            <div class="grid grid-cols-3 max-md:block">

                <div class="flex justify-center items-center">

                    <img src="{{ asset('storage/siswa/' . $user->tahun_daftar . '/' . $user->nik . '/' . $detailUser->pas_foto) }}"
                        alt="foto-siswa" class="w-24 h-36 rounded-3xl max-md:mb-5">
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

                            {{ $user->detailCalonSiswa->prodi }}
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

                    <div class="grid grid-cols-4 border-b border-d-green  border-opacity-60 max-md:block">
                        <div class="col-span-4">
                            Aksi
                            <span class="max-md:hidden">:&nbsp;</span>
                        </div>
                        <div class="col-span-4 flex">

                            <a href="{{ route(
                                match ($user->notifikasi_admin) {
                                    'Pendaftar Baru',
                                    'Siap Ujian',
                                    'Lulus Ujian',
                                    'Tidak Lulus Ujian',
                                    'Berkas Terupload',
                                    'Berkas Terupdate',
                                    'Pendaftaran Selesai'
                                        => 'siswa-profil',
                            
                                    'Masukan Pas Foto Yang Valid' => 'siswa-pengaturan-akun',
                            
                                    'Cetak Formulir' => 'siswa-formulir-pendaftaran',
                            
                                    'Lengkapi Berkas' => 'siswa-upload-berkas',
                            
                                    'Masukan Akta Yang Valid',
                                    'Masukan KK Yang Valid',
                                    'Masukan SHUN Yang Valid',
                                    'Masukan Ijazah Yang Valid',
                                    'Masukan Raport Yang Valid',
                                    'Masukan Transkrip Nilai Yang Valid'
                                        => 'siswa-update-berkas',
                                },
                            ) }}"
                                class="flex">

                                <div
                                    class="flex justify-center items-center py-1 px-2 my-1 rounded border cursor-pointer  {{ $user->notifikasi_admin === 'Tidak Lulus Ujian' ? 'bg-red' : 'bg-d-green' }} text-white hover:bg-white hover:text-d-green {{ $user->notifikasi_admin === 'Selamat anda lulus ujian pendaftaran' ? 'hidden' : '' }}">
                                    @switch($user->notifikasi_admin)
                                        @case('Pendaftar Baru')
                                            Pendaftaran sedang diproses, <br>
                                            tunggu admin menverifikasi data anda
                                        @break

                                        @case('Masukan Pas Foto Yang Valid')
                                            Masukan Pas Foto Yang Valid
                                        @break

                                        @case('Cetak Formulir')
                                            Cetak Formulir
                                        @break

                                        @case('Siap Ujian')
                                            Silahkan ujian di SMK Ma'arif NU Doro, <br> dengan membawa formulir pendaftaran yang
                                            telah dicetak, <br>
                                            setelah ujian selesai hasil ujian akan diumumkan melalui aplikasi ini dan pesan whatsapp
                                        @break

                                        @case('Lulus Ujian')
                                            Lulus ujian
                                        @break

                                        @case('Tidak Lulus Ujian')
                                            Tidak lulus ujian
                                        @break

                                        @case('Lengkapi Berkas')
                                            Upload Berkas
                                        @break

                                        @case('Berkas Terupload')
                                            Berkas terupload <br>
                                            tunggu admin menverifikasi berkas anda
                                        @break

                                        @case('Berkas Terupdate')
                                            Berkas terupdate <br>
                                            tunggu admin menverifikasi berkas anda
                                        @break

                                        @case('Masukan Akta Yang Valid')
                                            Masukan Akta Yang Valid
                                        @break

                                        @case('Masukan KK Yang Valid')
                                            Masukan KK Yang Valid
                                        @break

                                        @case('Masukan SHUN Yang Valid')
                                            Masukan SHUN Yang Valid
                                        @break

                                        @case('Masukan Ijazah Yang Valid')
                                            Masukan Ijazah Yang Valid
                                        @break

                                        @case('Masukan Raport Yang Valid')
                                            Masukan Raport Yang Valid
                                        @break

                                        @case('Masukan Transkrip Nilai Yang Valid')
                                            Masukan Transkrip Nilai Yang Valid
                                        @break

                                        @case('Pendaftaran Selesai')
                                            Pendaftaran Selesai
                                        @break
                                    @endswitch
                                </div>

                            </a>

                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>
@endsection
