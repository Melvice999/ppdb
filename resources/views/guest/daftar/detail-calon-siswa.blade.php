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

                <div class="fixed flex justify-center items-center top-3.5 px-2 right-28 max-md:right-0 mr-3 cursor-pointer hover:bg-l-sky-blue hover:bg-opacity-10 rounded-full"
                    onclick="closePreviewImage()">
                    <i class="fa-solid fa-xmark text-white text-xl"></i>
                </div>

                <div class="bg-white p-4 mx-auto" style="width: 400px; height: 600px;">
                    <img src="" alt="Pratinjau Gambar" id="previewImage" class="w-full h-full object-cover">
                </div>

            </div>
        </div>


        <form action="{{ route('daftar/detail-calon-siswa-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="nik" class="hidden" value="{{ $nik->nik }}">
            <div id="langkahII">

                <div class="grid mt-6 ml-10 mr-10 place-items-center">

                    <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                        <label for="pas_foto">Pas Foto 3x4</label><br>
                        <div class="flex justify-between items-center mb-2">
                            <input type="file" class="border-b w-full focus:outline-none" accept=".jpg, .png, .jpeg"
                                onchange="validateFileSize(this, 1.5)" id="inputPasFoto" name="pas_foto" required>
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
                        <label for="prodi">Program Keahlian</label><br>
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
                        <select name="wearpack" class="mt-1 w-full py-2 focus:outline-none border-b cursor-pointer"
                            required>
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
                        <div class="scroll-up flex justify-end w-full cursor-pointer">
                            <div id="toggleLangkahIIBerikutnya"
                                class="mt-6 py-2 px-7 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                                Berikutnya
                            </div>
                        </div>
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
                        <div class="scroll-up cursor-pointer">
                            <div id="toggleLangkahIIISebelumnya"
                                class="mt-6 py-2 px-7 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                                Sebelumnya
                            </div>
                        </div>

                        <button type="submit"
                            class="mt-6 py-2 px-7 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                            Selesai
                        </button>
                    </div>
                </div>
            </div>
        </form>


        <script type="module">
            $(document).ready(function() {
                // Open Nav Menu
                $("#clsError").click(function() {
                    $("#clsErrors").addClass("hidden");
                });

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

                // Alert jika file yang diunggah bukan Gambar
                $('form').on('change', 'input[type="file"][accept=".jpg, .png, .jpeg"]', function() {
                    let inputFile = $(this);
                    let fileType = inputFile.prop('files')[0].type;

                    if (!(fileType === 'image/jpeg' || fileType === 'image/png')) {
                        alert('File yang Anda unggah harus berformat JPG/JPEG atau PNG.');
                        inputFile.val('');
                        return false;
                    }
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


                $("#toggleLangkahIIBerikutnya").on("click", function() {
                    if (validateForm('#langkahII')) {
                        $("#langkahI").addClass("hidden");
                        $("#langkahII").addClass("hidden");
                        $("#langkahIII").removeClass("hidden");
                    }
                });

                $("#toggleLangkahIIISebelumnya").on("click", function() {
                    $("#langkahI").addClass("hidden");
                    $("#langkahII").removeClass("hidden");
                    $("#langkahIII").addClass("hidden");
                });

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
