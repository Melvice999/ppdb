@extends('layouts.layout')
@section('content')

    {{-- Pesan Error --}}
    @if ($errors->any())
        <div class="grid mt-6 ml-10 mr-10 mx-auto place-items-center" id="clsErrors">
            <div class="w-1/2 text-white bg-red rounded-md max-md:w-full mt-6">
                <div class="text-white text-end mt-2 mr-3 text-3xl cursor-pointer" id="clsError">
                    <i class="fa-solid fa-circle-xmark"></i>
                </div>
                <ul class="pl-7 pb-7">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('calon-siswa.store') }}" method="POST">
        @csrf
        <div class="grid mt-6 ml-10 mr-10 place-items-center">
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full" id="up">
                <label for="nik">NIK</label><br>
                <input type="number" name="nik" value="{{ old('nik') }}"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="16" placeholder="Masukan NIK" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="kk">No KK</label><br>
                <input type="number" name="kk" value="{{ old('kk') }}"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="16" placeholder="Masukan No KK" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="nama">Nama Lengkap</label><br>
                <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukan Nama Lengkap"
                    class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="tempat_lahir">Tempat Lahir</label><br>
                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                    placeholder="Masukan Tempat Lahir" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="tanggal_lahir">Tanggal Lahir</label><br>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                    class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="no_hp">No Hp</label><br>
                <input type="number" name="no_hp" value="{{ old('no_hp') }}"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="15" placeholder="Masukan No Hp" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="desa">Desa</label><br>
                <input type="text" name="desa" value="{{ old('desa') }}" placeholder="Masukan Nama Desa"
                    class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="rt">RT</label><br>
                <input type="number" name="rt" value="{{ old('rt') }}"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="3" placeholder="Masukan RT" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="rw">RW</label><br>
                <input type="number" name="rw" value="{{ old('rw') }}"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="3" placeholder="Masukan RW" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="kecamatan">Kecamatan</label><br>
                <input type="text" name="kecamatan" value="{{ old('kecamatan') }}" placeholder="Masukan Nama Kecamatan"
                    class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="kabupaten">Kabupaten</label><br>
                <input type="text" name="kabupaten" value="{{ old('kabupaten') }}" placeholder="Masukan Nama Kabupaten"
                    class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="jenis_kelamin">Jenis Kelamin</label><br>
                <select name="jenis_kelamin" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer">
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}> Laki-laki
                    </option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="warga_negara">Warga Negara</label><br>
                <select name="warga_negara" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer">
                    <option value="WNI" {{ old('warga_negara') == 'WNI' ? 'selected' : '' }}> WNI
                    </option>
                    <option value="WNA" {{ old('warga_negara') == 'WNA' ? 'selected' : '' }}>WNA
                    </option>
                </select>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="kode_pos">Kode Pos</label><br>
                <input type="number" name="kode_pos" value="{{ old('kode_pos') }}"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="5" placeholder="Masukan Kode Pos" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="prodi">Program Studi</label><br>
                <select name="prodi" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer">
                    <option value="TBSM" {{ old('prodi') == 'TBSM' ? 'selected' : '' }}> TBSM
                    </option>
                    <option value="TKJ" {{ old('prodi') == 'TKJ' ? 'selected' : '' }}>TKJ
                    </option>
                    <option value="AKL" {{ old('prodi') == 'AKL' ? 'selected' : '' }}>AKL
                    </option>
                </select>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="batik">Ukuran Batik</label><br>
                <select name="batik" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer">
                    <option value="S" {{ old('batik') == 'S' ? 'selected' : '' }}> S
                    </option>
                    <option value="M" {{ old('batik') == 'M' ? 'selected' : '' }}>M
                    </option>
                    <option value="L" {{ old('batik') == 'L' ? 'selected' : '' }}>L
                    </option>
                    <option value="XL" {{ old('batik') == 'XL' ? 'selected' : '' }}>XL
                    </option>
                    <option value="XXL" {{ old('batik') == 'XXL' ? 'selected' : '' }}>XXL
                    </option>
                </select>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="olahraga">Ukuran Olahraga</label><br>
                <select name="olahraga" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer">
                    <option value="S" {{ old('batik') == 'S' ? 'selected' : '' }}> S
                    </option>
                    <option value="M" {{ old('batik') == 'M' ? 'selected' : '' }}>M
                    </option>
                    <option value="L" {{ old('batik') == 'L' ? 'selected' : '' }}>L
                    </option>
                    <option value="XL" {{ old('batik') == 'XL' ? 'selected' : '' }}>XL
                    </option>
                    <option value="XXL" {{ old('batik') == 'XXL' ? 'selected' : '' }}>XXL
                    </option>
                </select>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="wearpack">Ukuran Wearpack</label><br>
                <select name="wearpack" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer">
                    <option value="S" {{ old('batik') == 'S' ? 'selected' : '' }}> S
                    </option>
                    <option value="M" {{ old('batik') == 'M' ? 'selected' : '' }}>M
                    </option>
                    <option value="L" {{ old('batik') == 'L' ? 'selected' : '' }}>L
                    </option>
                    <option value="XL" {{ old('batik') == 'XL' ? 'selected' : '' }}>XL
                    </option>
                    <option value="XXL" {{ old('batik') == 'XXL' ? 'selected' : '' }}>XXL
                    </option>
                </select>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="asal_sekolah">Asal Sekolah</label><br>
                <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                    placeholder="Masukan Nama Asal Sekolah" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="tahun_lulus">Tahun Lulus</label><br>
                <input type="number" name="tahun_lulus"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="4" value="{{ old('tahun_lulus') }}" placeholder="Masukan Tahun Lulus"
                    class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="nama_ayah">Nama Ayah</label><br>
                <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" placeholder="Masukan Nama Ayah"
                    class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="nama_ibu">Nama Ibu</label><br>
                <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" placeholder="Masukan Nama Ibu"
                    class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="no_hp_wali">No Hp Wali</label><br>
                <input type="number" name="no_hp_wali" value="{{ old('no_hp_wali') }}"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="15" placeholder="Masukan No Hp Wali" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="desa_wali">Desa Wali</label><br>
                <input type="text" name="desa_wali" value="{{ old('desa_wali') }}"
                    placeholder="Masukan Nama Desa Wali" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="rt_wali">RT Wali</label><br>
                <input type="number" name="rt_wali" value="{{ old('rt_wali') }}"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="3" placeholder="Masukan RT Wali" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="rw_wali">RW Wali</label><br>
                <input type="number" name="rw_wali" value="{{ old('rw_wali') }}"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="3" placeholder="Masukan RW Wali" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="kecamatan_wali">Kecamatan Wali</label><br>
                <input type="text" name="kecamatan_wali" value="{{ old('kecamatan_wali') }}"
                    placeholder="Masukan Nama Kecamatan Wali" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="kabupaten_wali">Kabupaten Wali</label><br>
                <input type="text" name="kabupaten_wali" value="{{ old('kabupaten_wali') }}"
                    placeholder="Masukan Nama Kabupaten Wali" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="kode_pos_wali">Kode Pos Wali</label><br>
                <input type="number" name="kode_pos_wali" value="{{ old('kode_pos_wali') }}"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    maxlength="5" placeholder="Masukan Kode Pos Wali" class="border-b w-full focus:outline-none"
                    required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="pekerjaan_wali">Pekerjaan Wali</label><br>
                <input type="text" name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}"
                    placeholder="Masukan Pekerjaan Wali" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                <label for="pendidikan_wali">Pendidikan Wali</label><br>
                <input type="text" name="pendidikan_wali" value="{{ old('pendidikan_wali') }}"
                    placeholder="Masukan Pendidikan Wali" class="border-b w-full focus:outline-none" required>
            </div>
            <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6" id="down">
                <label for="info_sekolah">Info Sekolah</label><br>
                <input type="text" name="info_sekolah" value="{{ old('info_sekolah') }}"
                    placeholder="Mendapatkan Informasi Sekolah Melalui" class="border-b w-full focus:outline-none"
                    required>
            </div>
            <div class="text-end w-1/2 max-md:w-full mb-6">
                <button
                    class="mt-6 py-2 px-7 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                    Selesai
                </button>
            </div>
        </div>
    </form>
    <div class="fixed bottom-1/2 text-d-sky-blue text-3xl opacity-80 md:ml-10 lg:ml-40 xl:ml-72 2xl:ml-80" id="navigasi">
        <a href="#up">
            <div class="w-7 h-7">
                <i class="fa-solid fa-circle-up"></i>
            </div>
        </a>
        <a href="#down">
            <div class="w-7 h-7 mt-2">
                <i class="fa-solid fa-circle-down"></i>
            </div>
        </a>
    </div>

    <script type="module">
        $(document).ready(function() {
            // Open Nav Menu
            $("#clsError").click(function() {
                $("#clsErrors").addClass("hidden")
            })
        })
    </script>
@endsection()
