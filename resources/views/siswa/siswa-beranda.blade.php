<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Laravel</title>

    <!-- Styles -->
    <style>
        /* Font */
        @import url('https://fonts.googleapis.com/css2?family=Aldrich&display=swap');
        @import url('https://fonts.cdnfonts.com/css/sen');

        /* Agar input type number tidak ada up and down */
        @layer base {

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        }
    </style>
</head>

<body class="font-sen bg-l-sky-blue">
    {{-- @include('navbar.navbar') --}}
    <div class="flex justify-between items-center p-3 bg-d-green text-d-green fixed bottom-0 left-0 right-0 w-full">

        <a href="#" class="ms-40 max-md:m-0 py-1 px-3 bg-white rounded-full"><i class="fa-solid fa-house"></i> </a>
        <a href="#" class="py-1 px-3 bg-white rounded-full"><i class="fa-solid fa-file"></i> Formulir
            Pendaftaran</a>
        <a href="#" class="me-40 max-md:m-0 py-1 px-3 bg-white rounded-full"><i class="fa-solid fa-user"></i> </a>
    </div>

    {{-- @yield('content')  --}}
    <div class="flex justify-center mt-6 ml-10 mr-10 max-md:block">
        <div class="w-1/2 p-10 bg-white max-md:w-full rounded-md">
            <div class="grid grid-cols-3  max-md:block">
                <div>
                    <img src="{{ asset('asset/siswa/pas-foto/foto_profil.png') }}" alt="foto-siswa"
                        class="w-24 h-36 rounded-3xl">
                </div>

                <div class="col-span-2">
                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block max-md:mt-5">
                        <div>
                            Nama
                        </div>
                        <div class="max-md:hidden">:</div>
                        <div class="col-span-2">
                            {{ $users->nama }}
                        </div>
                    </div>
                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                        <div>
                            Jurusan
                        </div>
                        <div class="max-md:hidden">:</div>
                        <div class="col-span-2">
                            {{ $users->prodi }}
                        </div>
                    </div>
                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                        <div>
                            No Hp
                        </div>
                        <div class="max-md:hidden">:</div>
                        <div class="col-span-2">
                            {{ $users->no_hp }}
                        </div>
                    </div>
                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                        <div>
                            Status
                        </div>
                        <div class="max-md:hidden">:</div>
                        <div class="col-span-2">
                            Calon Siswa
                        </div>
                    </div>
                    <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                        <div>
                            No
                        </div>
                        <div class="max-md:hidden">:</div>
                        <div class="col-span-2">
                            PPDB-001-2024
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center  text-center mt-6 ml-10 mr-10 max-md:block">
        <div class="w-1/2 px-10 py-2 bg-white max-md:w-full rounded-md">
            <div>
                <span class="font-bold text-lg">Identitas Siswa</span>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-1 ml-10 mr-10 max-md:block">
        <div class="w-1/2 px-10 pb-10 pt-4 bg-white max-md:w-full rounded-md">
            <div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        NIK
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->nik }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        KK
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->kk }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Nama
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->nama }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Jenis Kelamin
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->jenis_kelamin }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Tempat Lahir
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->tempat_lahir }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Tanggal Lahir
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->tanggal_lahir }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        No Hp
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->no_hp }} </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center  text-center mt-6 ml-10 mr-10 max-md:block">
        <div class="w-1/2 px-10 py-2 bg-white max-md:w-full rounded-md">
            <div>
                <span class="font-bold text-lg">Alamat Siswa</span>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-1 ml-10 mr-10 max-md:block">
        <div class="w-1/2 px-10 pb-10 pt-4 bg-white max-md:w-full rounded-md">
            <div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Desa
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->desa }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Rt
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->rt }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Rw
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->rw }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kecamatan
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->kecamatan }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kabupaten
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->kabupaten }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Warga Negara
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->warga_negara }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kode Pos
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->kode_pos }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Desa
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->desa }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Rt
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->rt }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Rw
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->rw }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kecamatan
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->kecamatan }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kabupaten
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->kabupaten }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Warga Negara
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->warga_negara }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kode Pos
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->kode_pos }} </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center  text-center mt-6 ml-10 mr-10 max-md:block">
        <div class="w-1/2 px-10 py-2 bg-white max-md:w-full rounded-md">
            <div>
                <span class="font-bold text-lg">Data Wali</span>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-1 ml-10 mr-10 max-md:block">
        <div class="w-1/2 px-10 pb-10 pt-4 bg-white max-md:w-full rounded-md">
            <div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        nama_ayah
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->nama_ayah }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        nama_ibu
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->nama_ibu }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        no_hp_wali
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->no_hp_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Desa
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->desa_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Rt
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->rt_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Rw
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->rw_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kecamatan
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->kecamatan_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kabupaten
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->kabupaten_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kode Pos
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->kode_pos_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        pekerjaan_wali
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->pekerjaan_wali }} </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center  text-center mt-6 ml-10 mr-10 max-md:block">
        <div class="w-1/2 px-10 py-2 bg-white max-md:w-full rounded-md">
            <div>
                <span class="font-bold text-lg">Informasi Lainnya</span>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-1 ml-10 mr-10 max-md:block">
        <div class="w-1/2 px-10 pb-10 pt-4 bg-white max-md:w-full rounded-md">
            <div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Ukuran Batik
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->batik }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Ukuran Olahraga
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->olahraga }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Ukuran Wearpack
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->wearpack }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Asal Sekolah
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->asal_sekolah }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Tahun Lulus
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->tahun_lulus }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Informasi Sekolah
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $users->info_sekolah }} </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-10"></div>
</body>

</html>
