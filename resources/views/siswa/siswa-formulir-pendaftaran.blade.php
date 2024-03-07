@extends('layouts.siswa-layout')
@section('content')
    <div class="flex justify-center mt-6 ml-10 mr-10 max-md:block">
        <div class="w-1/2 p-10 bg-white max-md:w-full rounded-md">
            <div class="grid grid-cols-3  max-md:block">
                <div class="flex justify-center">
                    <img src="{{ asset($berkas && $berkas->nik ? 'storage/siswa/pas-foto/' . $berkas->pas_foto : 'storage/siswa/pas-foto/foto_profil.png') }}" alt="foto-siswa"
                        class="w-24 h-36 rounded-3xl">
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
                            No Hp
                        </div>
                        <div class="max-md:hidden">:</div>
                        <div class="col-span-2">
                            {{ $user->no_hp }}
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
                            PPDB-XXXX-XXXX
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
                    <div class=""> {{ $user->nik }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        KK
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->kk }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Nama
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->nama }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Jenis Kelamin
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->jenis_kelamin }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Tempat Lahir
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->tempat_lahir }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Tanggal Lahir
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ \Carbon\Carbon::parse($user->tanggal_lahir)->format('d-m-Y') }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        No Hp
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->no_hp }} </div>
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
                    <div class=""> {{ $user->desa }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Rt
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->rt }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Rw
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->rw }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kecamatan
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->kecamatan }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kabupaten
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->kabupaten }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Warga Negara
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->warga_negara }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kode Pos
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->kode_pos }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Desa
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->desa }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Rt
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->rt }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Rw
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->rw }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kecamatan
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->kecamatan }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kabupaten
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->kabupaten }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Warga Negara
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->warga_negara }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kode Pos
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->kode_pos }} </div>
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
                        Nama Ayah
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->nama_ayah }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Nama Ibu
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->nama_ibu }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        No Hp Wali
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->no_hp_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Desa
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->desa_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Rt
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->rt_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Rw
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->rw_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kecamatan
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->kecamatan_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kabupaten
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->kabupaten_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Kode Pos
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->kode_pos_wali }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Pekerjaan Wali
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->pekerjaan_wali }} </div>
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
                    <div class=""> {{ $user->batik }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Ukuran Olahraga
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->olahraga }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Ukuran Wearpack
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->wearpack }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Asal Sekolah
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->asal_sekolah }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Tahun Lulus
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->tahun_lulus }} </div>
                </div>
                <div class="grid grid-cols-4 border-b border-d-green border-opacity-60 max-md:block">
                    <div>
                        Informasi Sekolah
                    </div>
                    <div class="max-md:hidden">:</div>
                    <div class=""> {{ $user->info_sekolah }} </div>
                </div>
            </div>
        </div>
    </div>
@endsection
