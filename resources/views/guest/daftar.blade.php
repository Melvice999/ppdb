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

        {{-- Modal Preview Image --}}
        <div class="hidden w-full h-full bg-black bg-opacity-20 top-0" id="divPreviewImage">
            <div class="flex w-full h-full justify-center items-center">

                <div class="fixed flex justify-center items-center top-3.5 px-2 right-28 mr-3 cursor-pointer hover:bg-l-sky-blue hover:bg-opacity-10 rounded-full"
                    onclick="closePreviewImage()">
                    <i class="fa-solid fa-xmark text-white text-xl"></i>
                </div>

                <div class="bg-white p-4 mx-auto" style="width: 400px; height: 600px;">
                    <img src="" alt="Pratinjau Gambar" id="previewImage" class="w-full h-full object-cover">
                </div>

            </div>
        </div>


        <form action="{{ route('calon-siswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid mt-6 ml-10 mr-10 place-items-center">

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full">
                    <label for="nik">NIK</label><br>
                    <input type="number" name="nik" value="{{ old('nik') }}"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="16" placeholder="Masukan NIK" class="border-b w-full focus:outline-none" required>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="password">Password</label><br>
                    <div class="flex justify-between items-center mb-2">

                        <input type="password" name="password" value="{{ old('password') }}" id="PW"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="16" placeholder="Masukan password" class="border-b w-full focus:outline-none"
                            required>
                        <i class="fa-solid fa-eye text-xl text-d-green ms-2 cursor-pointer p-2" id="togglePW"></i>
                    </div>

                    <span class="text-grey">
                        <li>Password minimal 6 karakter</li>
                        <li>Password harus diingat untuk proses cetak formulir</li>
                    </span>

                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="nama">Nama Lengkap</label><br>
                    <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukan Nama Lengkap"
                        class="border-b w-full focus:outline-none" required>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <select name="jenis_kelamin" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer"
                        required>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}> Laki-laki
                        </option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
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
                        maxlength="15" placeholder="Masukan No Hp" class="border-b w-full focus:outline-none mb-2" required>

                    <span class="text-grey">
                        <li>Gunakan nomor whatsapp untuk menerima kode OTP</li>
                    </span>
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

                <div class="flex cursor-pointer justify-end items-center w-1/2 max-md:w-full" id="toggleLangkahI">

                    <button type="submit"
                        class="mt-6 py-2 px-7 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                        Berikutnya
                    </button>

                </div>
            </div>
        </form>

        {{-- <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
            <div class="flex justify-between items-center w-full">
                <label for="otp" class="w-full">OTP</label>
                <div class="w-full text-center cursor-pointer border border-d-green rounded-xl">
                    Request Ulang Otp</div>
            </div>
            <input type="number" name="otp" value="{{ old('otp') }}" placeholder="Masukan OTP"
                class="border-b w-full focus:outline-none" required>
        </div> --}}

        {{-- jika no hp sudah terdaftar maka masuk ke otp
            
            setelah otp berhasil baru bisa akses form detail calon siswa --}}
        {{-- <form action="{{ route('calon-siswa.store-detail-calon-siswa') }}" method="POST" enctype="multipart/form-data"> --}}
        {{-- @csrf
        <div id="langkahII" class="hidden">

            <div class="grid mt-6 ml-10 mr-10 place-items-center">

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="pas_foto">Pas Foto 3x4</label><br>
                    <div class="flex justify-between items-center mb-2">
                        <input type="file" class="border-b w-full focus:outline-none" accept=".jpg, .png, .jpeg"
                            onchange="validateFileSize(this, 2)" id="inputPasFoto" name="pas_foto" required>
                        <div onclick="buttonPasFoto()"
                            class="border py-1 px-2 border-d-green rounded ml-2 cursor-pointer hover:bg-d-green hover:text-white">
                            Lihat
                        </div>
                    </div>
                    <span class="text-grey text-end">Pastikan background berwarna merah </span>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="jalur_pendaftaran">Jalur Pendaftaran</label><br>
                    <select name="jalur_pendaftaran" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer"
                        required>
                        <option value="Reguler" {{ old('jalur_pendaftaran') == 'Reguler' ? 'selected' : '' }}>Reguler
                        </option>
                        <option value="Prestasi" {{ old('jalur_pendaftaran') == 'Prestasi' ? 'selected' : '' }}>
                            Prestasi
                        </option>
                    </select>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="prodi">Program Studi</label><br>
                    <select name="prodi" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer" required>
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
                    <label for="wearpack">Ukuran Wearpack/Baju</label><br>
                    <select name="wearpack" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer" required>
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
                        placeholder="Masukan Nama Asal Sekolah" class="border-b w-full focus:outline-none" required>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="tahun_lulus">Tahun Lulus</label><br>
                    <input type="number" name="tahun_lulus"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="4" value="{{ old('tahun_lulus') }}" placeholder="Masukan Tahun Lulus"
                        class="border-b w-full focus:outline-none" required>
                </div>

                <div class="flex cursor-pointer w-1/2 max-md:w-full">
                    <a href="#up" class="flex justify-between w-full">
                        <div id="toggleLangkahIISebelumnya"
                            class="mt-6 py-2 px-7 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                            Sebelumnya
                        </div>

                        <div id="toggleLangkahIIBerikutnya"
                            class="mt-6 py-2 px-7 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                            Berikutnya
                        </div>
                    </a>
                </div>


            </div>
        </div>

        <div id="langkahIII" class="hidden">

            <div class="grid mt-6 ml-10 mr-10 place-items-center">

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="nama_ayah">Nama Ayah</label><br>
                    <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}"
                        placeholder="Masukan Nama Ayah" class="border-b w-full focus:outline-none" required>
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
                        maxlength="15" placeholder="Masukan No Hp Wali" class="border-b w-full focus:outline-none"
                        required>
                </div>

                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="pekerjaan_wali">Pekerjaan Wali</label><br>
                    <input type="text" name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}"
                        placeholder="Masukan Pekerjaan Wali" class="border-b w-full focus:outline-none" required>
                </div>

                <div class="text-end w-1/2 flex justify-between max-md:w-full">
                    <a href="#up">
                        <div id="toggleLangkahIIISebelumnya"
                            class="mt-6 py-2 px-7 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                            Sebelumnya
                        </div>

                    </a>
                    <button
                        class="mt-6 py-2 px-7 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                        Selesai
                    </button>
                </div>
            </div>
        </div> --}}
        {{-- </form> --}}

        <script type="module">
            $(document).ready(function() {
                // Open Nav Menu
                $("#clsError").click(function() {
                    $("#clsErrors").addClass("hidden");
                });

                $("#togglePW").on("click", function() {
                    let passwordInput = $("#PW");
                    let type = $("#PW").attr("type") === "password" ? "text" : "password";
                    passwordInput.attr("type", type);

                    if (type === "password") {
                        $("#togglePW").removeClass("fa-eye-slash").addClass("fa-eye");
                    } else {
                        $("#togglePW").removeClass("fa-eye").addClass("fa-eye-slash");
                    }
                });

                // $("#toggleLangkahI").on("click", function() {
                //     if (validateForm('#langkahI')) {
                //         $("#langkahII").removeClass("hidden");
                //         $("#langkahI").addClass("hidden");
                //         $("#langkahIII").addClass("hidden");
                //     }
                // });

                // $("#toggleLangkahIISebelumnya").on("click", function() {
                //     $("#langkahI").removeClass("hidden");
                //     $("#langkahII").addClass("hidden");
                //     $("#langkahIII").addClass("hidden");
                // });

                // $("#toggleLangkahIIBerikutnya").on("click", function() {
                //     if (validateForm('#langkahII')) {
                //         $("#langkahI").addClass("hidden");
                //         $("#langkahII").addClass("hidden");
                //         $("#langkahIII").removeClass("hidden");
                //     }
                // });

                // $("#toggleLangkahIIISebelumnya").on("click", function() {
                //     $("#langkahI").addClass("hidden");
                //     $("#langkahII").removeClass("hidden");
                //     $("#langkahIII").addClass("hidden");
                // });

                function validateForm(formId) {
                    var isValid = true;
                    $(formId + ' input[required]').each(function() {
                        if ($(this).val() === '') {
                            isValid = false;
                            return false; // Stop the loop if one required field is empty
                        }
                    });
                    if (!isValid) {
                        alert('Silakan lengkapi input sebelum melanjutkan.');
                    }
                    return isValid;
                }


                // Tampilkan Pas Foto
                window.buttonPasFoto = function() {
                    let inputPasFoto = $('#inputPasFoto')[0];
                    let divPreviewImage = $('#divPreviewImage');
                    let previewImage = $('#previewImage');

                    let filePasFoto = inputPasFoto.files[0];
                    let readerPasFoto = new FileReader();

                    readerPasFoto.onloadend = function() {
                        previewImage.attr('src', readerPasFoto.result);
                        divPreviewImage.removeClass('hidden').addClass('fixed');
                    };

                    if (filePasFoto) {
                        readerPasFoto.readAsDataURL(filePasFoto);
                    }
                }

                // Close Modal Image
                window.closePreviewImage = function() {
                    let divPreviewImage = $('#divPreviewImage');
                    divPreviewImage.removeClass('fixed').addClass('hidden');
                }

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

                // Alert Max File Size
                window.validateFileSize = function(input, maxSizeInMB) {
                    if (input.files.length > 0) {
                        let fileSize = input.files[0].size / (1024 * 1024); // Convert to MB
                        if (fileSize > maxSizeInMB) {
                            alert(`Ukuran maksimal file ${maxSizeInMB} MB.`);
                            input.value = ''; // Clear the file input
                        }
                    }
                };

            });
        </script>
    @endif
    @if ($pendaftaran->pendaftaran === 0)
        <div class="grid mt-6 mx-10 place-items-center text-base max-sm:mx-3">
            {{-- {{ $siswa }} --}}

            <div class="w-1/2 px-10 bg-white max-md:w-full max-md:px-10 rounded-md text-justify max-md:mt-7 max-sm:px-3">
                <div class="text-center py-4">
                    Pendaftaran Belum Tersedia
                </div>
            </div>
        </div>
    @endif

@endsection()
