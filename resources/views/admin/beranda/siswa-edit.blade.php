@extends('layouts.admin-layout')
@section('content')

    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    <div class=" text-2xl font-medium">
        Admin / Beranda / Siswa / Edit
    </div>
    @if ($errors->any())
        <div class="grid mt-6 mx-auto place-items-center">
            <div class="w-full text-white bg-red rounded-md mb-6">
                <ul class="p-4">
                    @foreach ($errors->all() as $error)
                        <li class="list-disc list-inside">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

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
    <div class=" mt-10 mb-2">
        <span
            class="{{ $siswa->notifikasi_admin === 'Pendaftar Baru' ? 'bg-[#FFD700] text-black' : ($siswa->notifikasi_admin === 'Berkas Terupload' ? 'bg-[#008000] text-white' : ($siswa->notifikasi_admin === 'Berkas Update' ? 'bg-[#0000FF] text-white' : ($siswa->notifikasi_admin === 'Tidak Lulus Ujian' ? 'bg-red text-white' : ($siswa->notifikasi_admin === 'Siap Ujian' ? 'bg-[#FFA500] text-black' : 'bg-[#808080] text-white')))) }} rounded py-1 px-1">
            {{ $siswa->notifikasi_admin }}
        </span>

    </div>
    <img src="{{ asset('storage/siswa/' . $siswa->tahun_daftar . '/' . $siswa->nik . '/' . $siswa->detailCalonSiswa->pas_foto) }}"
        class="hidden rounded-xl overflow-hidden mb-3 bg-white max-h-80" alt="" id="pas_foto">
    <embed
        src="{{ asset($berkas && $berkas->nik ? 'storage/siswa/' . $siswa->tahun_daftar . '/' . $siswa->nik . '/' . $berkas->akta : 'assets/img/not-found.png') }}"
        type="application/pdf" class="hidden object-cover {{ $berkas && $berkas->nik ? 'w-full h-full' : 'w-full h-2/5' }}"
        id="akta" />
    <embed
        src="{{ asset($berkas && $berkas->nik ? 'storage/siswa/' . $siswa->tahun_daftar . '/' . $siswa->nik . '/' . $berkas->kk : 'assets/img/not-found.png') }}"
        type="application/pdf" class="hidden object-cover {{ $berkas && $berkas->nik ? 'w-full h-full' : 'w-full h-2/5' }}"
        id="kk" />
    <embed
        src="{{ asset($berkas && $berkas->nik ? 'storage/siswa/' . $siswa->tahun_daftar . '/' . $siswa->nik . '/' . $berkas->shun : 'assets/img/not-found.png') }}"
        type="application/pdf" class="hidden object-cover {{ $berkas && $berkas->nik ? 'w-full h-full' : 'w-full h-2/5' }}"
        id="shun" />
    <embed
        src="{{ asset($berkas && $berkas->nik ? 'storage/siswa/' . $siswa->tahun_daftar . '/' . $siswa->nik . '/' . $berkas->ijazah : 'assets/img/not-found.png') }}"
        type="application/pdf" class="hidden object-cover {{ $berkas && $berkas->nik ? 'w-full h-full' : 'w-full h-2/5' }}"
        id="ijazah" />
    <embed
        src="{{ asset($berkas && $berkas->nik ? 'storage/siswa/' . $siswa->tahun_daftar . '/' . $siswa->nik . '/' . $berkas->raport : 'assets/img/not-found.png') }}"
        type="application/pdf" class="hidden object-cover {{ $berkas && $berkas->nik ? 'w-full h-full' : 'w-full h-2/5' }}"
        id="raport" />
    <embed
        src="{{ asset($berkas && $berkas->nik ? 'storage/siswa/' . $siswa->tahun_daftar . '/' . $siswa->nik . '/' . $berkas->transkip_nilai : 'assets/img/not-found.png') }}"
        type="application/pdf" class="hidden object-cover {{ $berkas && $berkas->nik ? 'w-full h-full' : 'w-full h-2/5' }}"
        id="transkip_nilai" />


    <form action="{{ route('admin-beranda-siswa-edit-post', ['id' => $siswa->nik]) }}" method="POST">
        @csrf
        <div class="grid mt-6 max-md:place-items-center">
            <div class="text-end w-full max-md:w-full mb-6">
                <button class="mt-6 py-2 px-7 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                    Simpan
                </button>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full">
                {{-- <label class="w-1/5" for="email">Email</label><br> --}}

                <div class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none cursor-pointer flex justify-between"
                    id="togglePasFoto">
                    <div class="p-2"> Lihat Foto</div>
                </div>

                <div class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none cursor-pointer"
                    id="toggleAkta">
                    <div class="p-2"> Lihat Akta</div>
                </div>
                <div class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none cursor-pointer"
                    id="toggleKk">
                    <div class="p-2"> Lihat KK</div>
                </div>

            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full">
                <div class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none cursor-pointer"
                    id="toggleShun">
                    <div class="p-2"> Lihat SHUN</div>
                </div>
                <div class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none cursor-pointer"
                    id="toggleIjazah">
                    <div class="p-2"> Lihat Ijazah</div>
                </div>

            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full">
                <div class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none cursor-pointer"
                    id="toggleRaport">
                    <div class="p-2"> Lihat Raport</div>
                </div>
                <div class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none cursor-pointer"
                    id="toggleTranskipNilai">
                    <div class="p-2"> Lihat Transkip Nilai</div>
                </div>

            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="notifikasi">Aksi</label><br>
                <div class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
                    <select name="notifikasi_admin" id="" class="w-full p-2 cursor-pointer">

                        <option class="{{ $siswa->notifikasi_admin == 'Pendaftar Baru' ? '' : 'hidden' }}"
                            value="Pendaftar Baru" {{ $siswa->notifikasi_admin == 'Pendaftar Baru' ? 'selected' : '' }}>
                            Pendaftar Baru
                        </option>

                        <option
                            class="{{ $siswa->notifikasi_admin == 'Pendaftar Baru' || $siswa->notifikasi_admin == 'Tidak Lulus Ujian' ? '' : 'hidden' }}"
                            value="Cetak Formulir" {{ $siswa->notifikasi_admin == 'Cetak Formulir' ? 'selected' : '' }}>
                            Cetak
                            Formulir
                        </option>

                        <option class="{{ $siswa->notifikasi_admin == 'Formulir Tercetak' ? '' : 'hidden' }}"
                            value="Siap Ujian" {{ $siswa->notifikasi_admin == 'Siap Ujian' ? 'selected' : '' }}>Siap
                            Ujian
                        </option>

                        <option
                            class="{{ $siswa->notifikasi_admin == 'Siap Ujian' || $siswa->notifikasi_admin == 'Tidak Lulus Ujian' ? '' : 'hidden' }}"
                            value="Lengkapi Berkas" {{ $siswa->notifikasi_admin == 'Lulus Ujian' || $siswa->notifikasi_admin == 'Lengkapi Berkas' ? 'selected' : '' }}>
                            Lulus
                            Ujian & Lengkapi Berkas
                        </option>

                        <option class="{{ $siswa->notifikasi_admin == 'Siap Ujian' ? '' : 'hidden' }}"
                            value="Tidak Lulus Ujian"
                            {{ $siswa->notifikasi_admin == 'Tidak Lulus Ujian' || $siswa->notifikasi_admin == 'Lulus Ujian' ? 'selected' : '' }}>
                            Tidak Lulus
                            Ujian
                        </option>

                        <option class="{{ $siswa->notifikasi_admin == 'Lulus Ujian' ? '' : 'hidden' }}"
                            value="Lengkapi Berkas" {{ $siswa->notifikasi_admin == 'Lengkapi Berkas' ? 'selected' : '' }}>
                            Lengkapi Berkas
                        </option>

                        <option
                            class="{{ $siswa->notifikasi_admin == 'Berkas Terupload' || $siswa->notifikasi_admin == 'Berkas Terupdate' ? '' : 'hidden' }}"
                            value="Masukan Akta Yang Valid"
                            {{ $siswa->notifikasi_admin == 'Masukan Akta Yang Valid' ? 'selected' : '' }}>Masukan Akta Yang
                            Valid
                        </option>

                        <option
                            class="{{ $siswa->notifikasi_admin == 'Berkas Terupload' || $siswa->notifikasi_admin == 'Berkas Terupdate' ? '' : 'hidden' }}"
                            value="Masukan KK Yang Valid"
                            {{ $siswa->notifikasi_admin == 'Masukan KK Yang Valid' ? 'selected' : '' }}>Masukan KK Yang
                            Valid
                        </option>

                        <option
                            class="{{ $siswa->notifikasi_admin == 'Berkas Terupload' || $siswa->notifikasi_admin == 'Berkas Terupdate' ? '' : 'hidden' }}"
                            value="Masukan SHUN Yang Valid"
                            {{ $siswa->notifikasi_admin == 'Masukan SHUN Yang Valid' ? 'selected' : '' }}>Masukan SHUN Yang
                            Valid
                        </option>

                        <option
                            class="{{ $siswa->notifikasi_admin == 'Berkas Terupload' || $siswa->notifikasi_admin == 'Berkas Terupdate' ? '' : 'hidden' }}"
                            value="Masukan Ijazah Yang Valid"
                            {{ $siswa->notifikasi_admin == 'Masukan Ijazah Yang Valid' ? 'selected' : '' }}>Masukan Ijazah
                            Yang Valid
                        </option>

                        <option
                            class="{{ $siswa->notifikasi_admin == 'Berkas Terupload' || $siswa->notifikasi_admin == 'Berkas Terupdate' ? '' : 'hidden' }}"
                            value="Masukan Raport Yang Valid"
                            {{ $siswa->notifikasi_admin == 'Masukan Raport Yang Valid' ? 'selected' : '' }}>Masukan Raport
                            Yang Valid
                        </option>

                        <option
                            class="{{ $siswa->notifikasi_admin == 'Berkas Terupload' || $siswa->notifikasi_admin == 'Berkas Terupdate' ? '' : 'hidden' }}"
                            value="Masukan Transkip Nilai Yang Valid"
                            {{ $siswa->notifikasi_admin == 'Masukan Transkip Nilai Yang Valid' ? 'selected' : '' }}>Masukan
                            Transkip Nilai Yang Valid
                        </option>

                        <option class="{{ $siswa->notifikasi_admin == 'Pendaftar Baru' ? '' : 'hidden' }}"
                            value="Masukan Pas Foto Yang Valid"
                            {{ $siswa->notifikasi_admin == 'Masukan Pas Foto Yang Valid' ? 'selected' : '' }}>Masukan Pas
                            Foto Yang Valid
                        </option>

                        <option
                            class="{{ $siswa->notifikasi_admin == 'Berkas Terupload' || $siswa->notifikasi_admin == 'Berkas Terupdate' ? '' : 'hidden' }}"
                            value="Pendaftaran Selesai"
                            {{ $siswa->notifikasi_admin == 'Pendaftaran Selesai' || $siswa->notifikasi_admin == 'Berkas Terupload' ? 'selected' : '' }}>
                            Pendaftaran Selesai
                        </option>

                    </select>
                </div>
            </div>

            <div
                class="overflow-x-auto w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <table class="w-full">
                    <tr>
                        <td class="px-3">
                            Tes BTQ
                        </td>
                        <td>:</td>
                        <td class="px-3">
                            <select name="btq">
                                <option value="">Masukan Penilaian</option>
                                <option value="Lancar" {{ $penilaian->btq == 'Lancar' ? 'selected' : '' }}>Lancar</option>
                                <option value="Sedang" {{ $penilaian->btq == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                <option value="Kurang" {{ $penilaian->btq == 'Kurang' ? 'selected' : '' }}>Kurang</option>
                            </select>
                        </td>

                        <td class="px-3">
                            Tes Akademik
                        </td>
                        <td>:</td>
                        <td class="px-3">
                            <input type="number" class="border border-d-green ps-2 rounded-xl focus:outline-none"
                                name="akademik" value="{{ $penilaian->akademik }}">
                        </td>
                    </tr>

                    <tr>
                        <td class="px-3">
                            Tinggi Badan
                        </td>
                        <td>:</td>
                        <td class="px-3">
                            <input type="number" class="border border-d-green ps-2 rounded-xl focus:outline-none"
                                name="tinggi_badan" value="{{ $penilaian->tinggi_badan }}">
                        </td>

                        <td class="px-3">
                            Berat Badan
                        </td>
                        <td>:</td>
                        <td class="px-3">
                            <input type="number" class="border border-d-green ps-2 rounded-xl focus:outline-none"
                                name="berat_badan" value="{{ $penilaian->berat_badan }}">
                        </td>
                    </tr>


                    <tr>
                        <td class="px-3">
                            Tatto
                        </td>
                        <td>:</td>
                        <td class="px-3">
                            <input type="checkbox" name="tatto" value="1"
                                @if ($penilaian->tatto == 1) checked @endif>
                        </td>

                        <td class="px-3">
                            Tindik
                        </td>
                        <td>:</td>
                        <td class="px-3">
                            <input type="checkbox" name="tindik" value="1"
                                @if ($penilaian->tindik == 1) checked @endif>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-3">
                            Tangan
                        </td>
                        <td>:</td>
                        <td class="px-3">
                            <input type="checkbox" name="tangan" value="1"
                                @if ($penilaian->tangan == 1) checked @endif>
                        </td>

                        <td class="px-3">
                            Kaki
                        </td>
                        <td>:</td>
                        <td class="px-3">
                            <input type="checkbox" name="kaki" value="1"
                                @if ($penilaian->kaki == 1) checked @endif>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-3">
                            Riwayat Penyakit
                        </td>
                        <td>:</td>
                        <td class="px-3">
                            <input type="checkbox" name="riwayat_penyakit" value="1"
                                @if ($penilaian->riwayat_penyakit == 1) checked @endif>
                        </td>

                        <td class="px-3">
                            Lainnya
                        </td>
                        <td>:</td>
                        <td class="px-3">
                            <input type="text" class="border border-d-green ps-2 rounded-xl focus:outline-none"
                                name="lainnya" value="{{ $penilaian->lainnya }}">
                        </td>
                    </tr>

                </table>
            </div>


            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="no_pendaftaran">No Pendaftaran</label><br>
                <input type="text" name="no_pendaftaran" value="{{ $siswa->no_pendaftaran }}"
                    placeholder="Masukan No Pendaftaran"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="nik">NIK</label><br>
                <input type="number" name="nik" value="{{ $siswa->nik }}" placeholder="Masukan NIK"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
            </div>


            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="reset_password">Reset Password</label><br>
                <input type="text" name="reset_password" placeholder="Masukan Password Baru"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
            </div>


            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="nama">Nama Lengkap</label><br>
                <input type="text" name="nama" value="{{ $siswa->nama }}" placeholder="Masukan Nama Lengkap"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="jalur_pendaftaran">Jalur Pendaftaran</label><br>
                <select name="jalur_pendaftaran"
                    class="mt-1 w-full py-2 focus:outline-none border border-d-green rounded-xl ps-2 cursor-pointer">
                    <option value="Reguler" {{ $siswa->jalur_pendaftaran == 'Reguler' ? 'selected' : '' }}> Reguler
                    </option>
                    <option value="Prestasi" {{ $siswa->jalur_pendaftaran == 'Prestasi' ? 'selected' : '' }}>Prestasi
                    </option>
                </select>
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="tempat_lahir">Tempat Lahir</label><br>
                <input type="text" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}"
                    placeholder="Masukan Tempat Lahir"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="tanggal_lahir">Tanggal Lahir</label><br>
                <input type="date" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="no_hp">No Hp</label><br>
                <input type="number" name="no_hp" value="{{ $siswa->no_hp }}" placeholder="Masukan No Hp"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
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
                <input type="number" name="rt" value="{{ $siswa->rt }}" placeholder="Masukan RT"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="rw">RW</label><br>
                <input type="number" name="rw" value="{{ $siswa->rw }}" placeholder="Masukan RW"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
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
                <label class="w-1/5" for="wearpack">Ukuran Wearpack/Baju</label><br>
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
                <input type="text" name="asal_sekolah" value="{{ $siswa->detailCalonSiswa->asal_sekolah }}"
                    placeholder="Masukan Nama Asal Sekolah"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="tahun_lulus">Tahun Lulus</label><br>
                <input type="number" name="tahun_lulus" value="{{ $siswa->detailCalonSiswa->tahun_lulus }}"
                    placeholder="Masukan Tahun Lulus"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="nama_ayah">Nama Ayah</label><br>
                <input type="text" name="nama_ayah" value="{{ $siswa->detailCalonSiswa->nama_ayah }}"
                    placeholder="Masukan Nama Ayah"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="nama_ibu">Nama Ibu</label><br>
                <input type="text" name="nama_ibu" value="{{ $siswa->detailCalonSiswa->nama_ibu }}"
                    placeholder="Masukan Nama Ibu"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="no_hp_wali">No Hp Wali</label><br>
                <input type="number" name="no_hp_wali" value="{{ $siswa->detailCalonSiswa->no_hp_wali }}"
                    placeholder="Masukan No Hp Wali"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
            </div>

            <div class="w-full flex items-center border-b border-d-green gap-3 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label class="w-1/5" for="pekerjaan_wali">Pekerjaan Wali</label><br>
                <input type="text" name="pekerjaan_wali" value="{{ $siswa->detailCalonSiswa->pekerjaan_wali }}"
                    placeholder="Masukan Pekerjaan Wali"
                    class="py-2 border border-d-green w-full ps-2 rounded-xl focus:outline-none" autocomplete="off">
            </div>

        </div>
    </form>




    <script type="module">
        $(document).ready(function() {

            $('#togglePasFoto').click(function() {
                $('#pas_foto').toggleClass('hidden');
                $('#raport, #transkip_nilai, #akta, #kk, #shun, #ijazah').addClass('hidden');
            });

            $('#toggleAkta').click(function() {
                $('#akta').toggleClass('hidden');
                $('#raport, #transkip_nilai, #pas_foto, #kk, #shun, #ijazah').addClass('hidden');
            });

            $('#toggleKk').click(function() {
                $('#kk').toggleClass('hidden');
                $('#raport, #transkip_nilai, #pas_foto, #akta, #shun, #ijazah').addClass('hidden');
            });
            $('#toggleIjazah').click(function() {
                $('#ijazah').toggleClass('hidden');
                $('#raport, #transkip_nilai, #pas_foto, #akta, #shun, #kk').addClass('hidden');
            });
            $('#toggleShun').click(function() {
                $('#shun').toggleClass('hidden');
                $('#raport, #transkip_nilai, #pas_foto, #akta, #ijazah, #kk').addClass('hidden');
            });
            $('#toggleRaport').click(function() {
                $('#raport').toggleClass('hidden');
                $('#shun, #transkip_nilai, #pas_foto, #akta, #ijazah, #kk').addClass('hidden');
            });
            $('#toggleTranskipNilai').click(function() {
                $('#transkip_nilai').toggleClass('hidden');
                $('#shun, #raport, #pas_foto, #akta, #ijazah, #kk').addClass('hidden');
            });
















            // Open Nav Menu
            $("#clsError").click(function() {
                $("#clsErrors").addClass("hidden");
            });
        });
    </script>
@endsection
