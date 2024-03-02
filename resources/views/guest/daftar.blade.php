@extends('layouts.guest-layout')
@section('content')
    @if ($pendaftaran->pendaftaran === 1)
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

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full">
                    <label for="nik">NIK</label><br>
                    <input type="number" name="nik" value="{{ old('nik') }}"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="16" placeholder="Masukan NIK" class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="kk">No KK</label><br>
                    <input type="number" name="kk" value="{{ old('kk') }}"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="16" placeholder="Masukan No KK" class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="nama">Nama Lengkap</label><br>
                    <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukan Nama Lengkap"
                        class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="tempat_lahir">Tempat Lahir</label><br>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                        placeholder="Masukan Tempat Lahir" class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="tanggal_lahir">Tanggal Lahir</label><br>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                        class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="no_hp">No Hp</label><br>
                    <input type="number" name="no_hp" value="{{ old('no_hp') }}"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="15" placeholder="Masukan No Hp" class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="provinsi">Provinsi</label><br>
                    <select name="provinsi" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer"
                        id="provinsi" required>
                    </select>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="kabupaten">Kabupaten / Kota</label><br>
                    <select name="kabupaten" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer"
                        id="kabupaten" required>
                    </select>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="kecamatan">Kecamatan</label><br>
                    <select name="kecamatan" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer"
                        id="kecamatan" required>
                    </select>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="desa">Desa</label><br>
                    <select name="desa" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer"
                        id="desa" required>
                    </select>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="kode_pos">Kode Pos</label><br>
                    <select name="kode_pos" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer"
                        id="kode_pos">
                    </select>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="rt">RT</label><br>
                    <input type="number" name="rt" value="{{ old('rt') }}"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="3" placeholder="Masukan RT" class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="rw">RW</label><br>
                    <input type="number" name="rw" value="{{ old('rw') }}"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="3" placeholder="Masukan RW" class="border-b w-full focus:outline-none">
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
                    <label for="prodi">Program Studi</label><br>
                    <select name="prodi" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer">
                        <option value="TBSM" {{ old('prodi') == 'TBSM' ? 'selected' : '' }}> TBSM
                        </option>
                        <option value="TKRO" {{ old('prodi') == 'TKRO' ? 'selected' : '' }}>TKRO
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
                        <option value="S" {{ old('olahraga') == 'S' ? 'selected' : '' }}> S
                        </option>
                        <option value="M" {{ old('olahraga') == 'M' ? 'selected' : '' }}>M
                        </option>
                        <option value="L" {{ old('olahraga') == 'L' ? 'selected' : '' }}>L
                        </option>
                        <option value="XL" {{ old('olahraga') == 'XL' ? 'selected' : '' }}>XL
                        </option>
                        <option value="XXL" {{ old('olahraga') == 'XXL' ? 'selected' : '' }}>XXL
                        </option>
                    </select>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="wearpack">Ukuran Wearpack</label><br>
                    <select name="wearpack" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer">
                        <option value="S" {{ old('wearpack') == 'S' ? 'selected' : '' }}> S
                        </option>
                        <option value="M" {{ old('wearpack') == 'M' ? 'selected' : '' }}>M
                        </option>
                        <option value="L" {{ old('wearpack') == 'L' ? 'selected' : '' }}>L
                        </option>
                        <option value="XL" {{ old('wearpack') == 'XL' ? 'selected' : '' }}>XL
                        </option>
                        <option value="XXL" {{ old('wearpack') == 'XXL' ? 'selected' : '' }}>XXL
                        </option>
                    </select>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="asal_sekolah">Asal Sekolah</label><br>
                    <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                        placeholder="Masukan Nama Asal Sekolah" class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="tahun_lulus">Tahun Lulus</label><br>
                    <input type="number" name="tahun_lulus"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="4" value="{{ old('tahun_lulus') }}" placeholder="Masukan Tahun Lulus"
                        class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="nama_ayah">Nama Ayah</label><br>
                    <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}"
                        placeholder="Masukan Nama Ayah" class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="nama_ibu">Nama Ibu</label><br>
                    <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" placeholder="Masukan Nama Ibu"
                        class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="no_hp_wali">No Hp Wali</label><br>
                    <input type="number" name="no_hp_wali" value="{{ old('no_hp_wali') }}"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="15" placeholder="Masukan No Hp Wali" class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="provinsi_wali">Provinsi Wali</label><br>
                    <select name="provinsi_wali" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer"
                        id="provinsi_wali" required>
                    </select>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="kabupaten_wali">Kabupaten Wali / Kota</label><br>
                    <select name="kabupaten_wali" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer"
                        id="kabupaten_wali" required>
                    </select>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="kecamatan_wali">Kecamatan Wali</label><br>
                    <select name="kecamatan_wali" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer"
                        id="kecamatan_wali" required>
                    </select>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="desa_wali">Desa Wali</label><br>
                    <select name="desa_wali" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer"
                        id="desa_wali" required>
                    </select>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="kode_pos">Kode Pos Wali</label><br>
                    <select name="kode_pos_wali" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer"
                        id="kode_pos_wali">
                    </select>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="rt_wali">RT Wali</label><br>
                    <input type="number" name="rt_wali" value="{{ old('rt_wali') }}"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="3" placeholder="Masukan RT Wali" class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="rw_wali">RW Wali</label><br>
                    <input type="number" name="rw_wali" value="{{ old('rw_wali') }}"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="3" placeholder="Masukan RW Wali" class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="pekerjaan_wali">Pekerjaan Wali</label><br>
                    <input type="text" name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}"
                        placeholder="Masukan Pekerjaan Wali" class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="pendidikan_wali">Pendidikan Wali</label><br>
                    <input type="text" name="pendidikan_wali" value="{{ old('pendidikan_wali') }}"
                        placeholder="Masukan Pendidikan Wali" class="border-b w-full focus:outline-none">
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="info_sekolah">Info Sekolah</label><br>
                    <input type="text" name="info_sekolah" value="{{ old('info_sekolah') }}"
                        placeholder="Mendapatkan Informasi Sekolah Melalui" class="border-b w-full focus:outline-none">
                </div>

                <div class="text-end w-1/2 max-md:w-full mb-6">
                    <button
                        class="mt-6 py-2 px-7 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                        Selesai
                    </button>
                </div>

            </div>

        </form>
        <div class="h-40"></div>
        <script type="module">
            $(document).ready(function() {
                // Open Nav Menu
                $("#clsError").click(function() {
                    $("#clsErrors").addClass("hidden");
                });

                // Fungsi untuk mengambil dan mengisi opsi dropdown
                function populateDropdown(url, dropdown, placeholder) {
                    $.ajax({
                        url: url,
                        dataType: 'json',
                        success: function(data) {
                            let dropdownElement = $(dropdown);

                            // Bersihkan opsi yang sudah ada
                            dropdownElement.empty();

                            // Tambahkan opsi placeholder
                            if (placeholder) {
                                dropdownElement.append($('<option>', {
                                    value: '',
                                    text: placeholder
                                }));
                            }

                            // Isi opsi dropdown
                            $.each(data.result, function(index, item) {
                                let option = $('<option>', {
                                    value: item.id,
                                    text: item.text
                                });
                                dropdownElement.append(option);
                            });
                        }
                    });
                }

                // Fungsi untuk menangani perubahan pada dropdown kabkota
                function onProvinceChange() {
                    let selectedProvinsiId = $('#provinsi').val();
                    let kabupatenURL =
                        `https://alamat.thecloudalert.com/api/kabkota/get/?d_provinsi_id=${selectedProvinsiId}`;
                    populateDropdown(kabupatenURL, '#kabupaten', 'Pilih Kabupaten/Kota');
                }

                // Fungsi untuk menangani perubahan pada dropdown kecamatan
                function onKabupatenChange() {
                    let selectedKabupatenId = $('#kabupaten').val();
                    let kecamatanURL =
                        `https://alamat.thecloudalert.com/api/kecamatan/get/?d_kabkota_id=${selectedKabupatenId}`;
                    populateDropdown(kecamatanURL, '#kecamatan', 'Pilih Kecamatan');
                }

                // Fungsi untuk menangani perubahan pada dropdown kelurahan
                function onKecamatanChange() {
                    let selectedKecamatanId = $('#kecamatan').val();
                    let desaURL =
                        `https://alamat.thecloudalert.com/api/kelurahan/get/?d_kecamatan_id=${selectedKecamatanId}`;
                    populateDropdown(desaURL, '#desa', 'Pilih Desa');
                }

                // Fungsi untuk menangani perubahan pada dropdown kodepos
                function onDesaChange() {
                    let selectedKabupatenId = $('#kabupaten').val();
                    let selectedKecamatanId = $('#kecamatan').val();
                    let kodePosURL =
                        `https://alamat.thecloudalert.com/api/kodepos/get/?d_kabkota_id=${selectedKabupatenId}&d_kecamatan_id=${selectedKecamatanId}`;
                    populateDropdown(kodePosURL, '#kode_pos', 'Pilih Kode Pos');
                }

                // Ambil dan isi dropdown provinsi pada saat halaman dimuat.
                populateDropdown("https://alamat.thecloudalert.com/api/provinsi/get/", '#provinsi', 'Pilih Provinsi');

                // Set up event listeners untuk setiap perubahan dropdown
                $('#provinsi').on('change', onProvinceChange);
                $('#kabupaten').on('change', onKabupatenChange);
                $('#kecamatan').on('change', onKecamatanChange);
                $('#desa').on('change', onDesaChange);

                // Alamat Wali

                function populateDropdownWali(url, dropdown, placeholder) {
                    $.ajax({
                        url: url,
                        dataType: 'json',
                        success: function(data) {
                            let dropdownElement = $(dropdown);

                            // Bersihkan opsi yang sudah ada
                            dropdownElement.empty();

                            // Tambahkan opsi placeholder
                            if (placeholder) {
                                dropdownElement.append($('<option>', {
                                    value: '',
                                    text: placeholder
                                }));
                            }

                            // Isi opsi dropdown
                            $.each(data.result, function(index, item) {
                                let option = $('<option>', {
                                    value: item.id,
                                    text: item.text
                                });
                                dropdownElement.append(option);
                            });
                        }
                    });
                }

                // Fungsi untuk menangani perubahan pada dropdown provinsi wali
                function onProvinceChangeWali() {
                    let selectedProvinsiIdWali = $('#provinsi_wali').val();
                    let kabupatenURLWali =
                        `https://alamat.thecloudalert.com/api/kabkota/get/?d_provinsi_id=${selectedProvinsiIdWali}`;
                    populateDropdownWali(kabupatenURLWali, '#kabupaten_wali', 'Pilih Kabupaten/Kota');
                }

                // Fungsi untuk menangani perubahan pada dropdown kabupaten wali
                function onKabupatenChangeWali() {
                    let selectedKabupatenIdWali = $('#kabupaten_wali').val();
                    let kecamatanURLWali =
                        `https://alamat.thecloudalert.com/api/kecamatan/get/?d_kabkota_id=${selectedKabupatenIdWali}`;
                    populateDropdownWali(kecamatanURLWali, '#kecamatan_wali', 'Pilih Kecamatan');
                }

                // Fungsi untuk menangani perubahan pada dropdown kecamatan wali
                function onKecamatanChangeWali() {
                    let selectedKecamatanIdWali = $('#kecamatan_wali').val();
                    let desaURLWali =
                        `https://alamat.thecloudalert.com/api/kelurahan/get/?d_kecamatan_id=${selectedKecamatanIdWali}`;
                    populateDropdownWali(desaURLWali, '#desa_wali', 'Pilih Desa');
                }

                // Fungsi untuk menangani perubahan pada dropdown desa wali
                function onDesaChangeWali() {
                    let selectedKabupatenIdWali = $('#kabupaten_wali').val();
                    let selectedKecamatanIdWali = $('#kecamatan_wali').val();
                    let kodePosURLWali =
                        `https://alamat.thecloudalert.com/api/kodepos/get/?d_kabkota_id=${selectedKabupatenIdWali}&d_kecamatan_id=${selectedKecamatanIdWali}`;

                    populateDropdown(kodePosURLWali, '#kode_pos_wali', 'Pilih Kode Pos');
                }

                // Ambil dan isi dropdown provinsi wali pada saat halaman dimuat.
                populateDropdownWali("https://alamat.thecloudalert.com/api/provinsi/get/", '#provinsi_wali',
                    'Pilih Provinsi');

                // Set up event listeners untuk setiap perubahan dropdown wali
                $('#provinsi_wali').on('change', onProvinceChangeWali);
                $('#kabupaten_wali').on('change', onKabupatenChangeWali);
                $('#kecamatan_wali').on('change', onKecamatanChangeWali);
                $('#desa_wali').on('change', onDesaChangeWali);

            });
        </script>
    @endif
    @if ($pendaftaran->pendaftaran === 0)
        <div class="grid mt-6 mx-10 place-items-center text-base max-sm:mx-3">
            {{-- {{ $siswa }} --}}

            <div class="w-1/2 px-10 bg-white max-md:w-full max-md:px-10 rounded-md text-justify max-md:mt-7 max-sm:px-3">
                <div class="text-lg font-bold text-center py-4">
                    Belum ada informasi pendaftaran
                </div>
            </div>
        </div>
    @endif

@endsection()
