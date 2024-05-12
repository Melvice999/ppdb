@extends('layouts.siswa-layout')
@section('content')
    <style>
        ::file-selector-button {
            display: none;
        }
    </style>

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

    @if ($errors->any())
        <div class="flex justify-center mx-10 mt-1">
            <div class="w-1/2 flex max-md:w-full mt-2 bg-red text-white rounded justify-center items-center">
                <div class="py-2 ps-2">
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="mt-1 mx-10 max-md:block">

        <div class="flex justify-center">
            <div class="w-1/2 grid grid-cols-1 max-md:w-full mt-2 bg-white rounded border border-d-green">
                <div class="flex justify-between items-center ps-2 cursor-pointer" id="ubahPassword">
                    <div class="w-full">
                        <i class="fa-solid fa-lock me-3 text-d-green"></i>
                        Ubah Password
                    </div>
                    <div class="w-1/5 py-3 my-0.5 me-0.5 rounded-r cursor-pointer flex justify-center bg-d-green">
                        <i class="fa-solid fa-pen-to-square flex justify-center items-center text-white"></i>
                    </div>
                </div>

            </div>
        </div>

        {{-- Input password  --}}
        <form action="{{ route('siswa-pengaturan-password-post') }}" method="POST">
            @csrf

            <input type="hidden" value="{{ $user->nik }}" name="nik">

            <div class="hidden" id="openPassword">
                <div class="flex justify-center">
                    <div class="w-1/2 grid grid-cols-1 max-md:w-full mt-2 bg-white rounded border border-d-green">

                        <div class="flex justify-between items-center ps-2">

                            <input type="password" placeholder="Masukan password" name="password"
                                class="w-full ps-2 focus:outline-none" id="password" required>

                            <div class="w-1/5 py-3 my-0.5 me-0.5 rounded-r flex justify-center bg-red" id="checkPassword">
                                <i class="fa-solid fa-x text-white"></i>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="w-1/2 grid grid-cols-1 max-md:w-full mt-2 bg-white rounded border border-d-green">

                        <div class="flex justify-between items-center ps-2">

                            <input type="password" placeholder="Masukan password" name="password_confirmation"
                                class="w-full ps-2 focus:outline-none" id="validasiPassword" required>

                            <div class="w-1/5 py-3 my-0.5 me-0.5 rounded-r flex justify-center bg-red"
                                id="checkValidasiPassword">
                                <i class="fa-solid fa-x text-white"></i>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="w-1/2 grid grid-cols-1 max-md:w-full mt-2 bg-white rounded border border-d-green">

                        <div class="flex justify-between items-center">

                            <div class="w-1/2 h-5/6 me-1 ms-1 rounded-l bg-blue flex justify-center items-center cursor-pointer"
                                id="lihatPassword">
                                <i class="fa-solid fa-eye text-white"></i>
                            </div>

                            <div class=" w-1/2 py-2 my-1 me-1 rounded-r bg-d-green text-white flex justify-center items-center cursor-not-allowed"
                                id="simpan">
                                <div class="w-full h-full flex justify-center items-center">
                                    Simpan <i class="fa-solid fa-paper-plane ms-3 rotate-45"></i>
                                </div>
                                <button class="hidden w-full h-full justify-center items-center">
                                    Simpan <i class="fa-solid fa-paper-plane ms-3 rotate-45"></i>
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </form>

        {{-- Pas Foto --}}
        <div
            class="flex justify-center mt-3 {{ $user->notifikasi_admin === 'Masukan Pas Foto Yang Valid' || $user->notifikasi_admin === 'Pendaftar Baru' ? '' : 'hidden' }}">
            <div class="w-1/2  grid grid-cols-3 max-md:w-full mt-2 bg-white">
                <div class="py-2 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl">
                    Pas Foto
                </div>

                <div class="border-d-green border focus:outline-none cursor-pointer flex justify-center items-center"
                    id="togglePasFoto">
                    Ubah
                </div>
                <div class="flex items-center cursor-pointer justify-center border-d-green border-t border-r border-b rounded-tr rounded-br"
                    id="lihatPasFotoLama">
                    Lihat
                </div>
            </div>

        </div>

        {{-- Input Pas Foto on click --}}
        <form action="{{ route('siswa-update-berkas-pas-foto-post', ['id' => $user->nik]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $user->detailCalonSiswa->pas_foto }}" name="pasFotoLama">

            <div class="hidden justify-center mb-5" id="triggerPasFoto">
                <div class="w-1/2 grid grid-cols-3 max-md:w-full mt-2 bg-white">

                    <div class="py-2 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl">
                        Pas Foto 3x4
                    </div>

                    <div class="border-d-green border focus:outline-none flex justify-center items-center">
                        <input type="file" class="w-full ps-2" accept=".jpg, .png, .jpeg" name="pas_foto"
                            onchange="validateFileSize(this, 1.5)" id="inputPasFoto" required>
                    </div>

                    <div
                        class="grid grid-cols-2 items-center border-d-green border-t border-r border-b rounded-tr rounded-br">

                        <div class="border-r h-full flex justify-center items-center cursor-pointer" id="lihatPasFoto">
                            <i class="fa-solid fa-eye text-blue"></i>
                        </div>

                        <button class=" h-full flex justify-center items-center cursor-pointer">
                            <i class="fa-solid fa-paper-plane text-d-green"></i>
                        </button>

                    </div>

                </div>
            </div>
        </form>
    </div>


    {{-- Div Modal Image Lama --}}
    <div class="hidden w-full h-full bg-black bg-opacity-20 top-0" id="previewImageLama">
        <div class="flex w-full h-full justify-center items-center">

            <div class="fixed flex justify-center items-center top-3.5 right-2 px-2 cursor-pointer hover:bg-l-sky-blue hover:bg-opacity-10 rounded-full"
                id="closePreviewImageLama">
                <i class="fa-solid fa-xmark text-white text-xl"></i>
            </div>

            <div class="bg-white p-4 mx-auto" style="width: 400px; height: 600px;">
                <img src="" alt="Pratinjau Gambar" class="w-full h-full object-cover">
            </div>

        </div>
    </div>

    {{-- Div Modal Image Baru --}}
    <div class="hidden w-full h-full bg-black bg-opacity-20 top-0" id="divPreviewImage">
        <div class="flex w-full h-full justify-center items-center">

            <div class="fixed flex justify-center items-center top-3.5 right-2 px-2 mr-3 cursor-pointer hover:bg-l-sky-blue hover:bg-opacity-10 rounded-full"
                id="closePreviewImage">
                <i class="fa-solid fa-xmark text-white text-xl"></i>
            </div>

            <div class="bg-white p-4 mx-auto" style="width: 400px; height: 600px;">
                <img src="" alt="Pratinjau Gambar" id="previewImage" class="w-full h-full object-cover">
            </div>

        </div>
    </div>


    <script type="module">
        $(document).ready(function() {
            // Tampilkan ubah password
            $("#ubahPassword").on("click", function() {
                $("#openPassword").toggleClass("hidden")
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

            // Mengubah fa-x ke fa-check password
            $("#password").on("input", function() {
                let passwordLength = $(this).val().length;

                if (passwordLength >= 6) {
                    $("#checkPassword").removeClass("bg-red").addClass("bg-d-green");
                    $("#checkPassword i").removeClass("fa-x").addClass("fa-check");
                } else {
                    $("#checkPassword").removeClass("bg-d-green").addClass("bg-red");
                    $("#checkPassword i").removeClass("fa-check").addClass("fa-x");
                }

            });

            // validasi fa-x ke fa-check password
            $(document).ready(function() {
                $("#openPassword").on("input", function() {
                    let confirmPassword = $("#validasiPassword").val();
                    let originalPassword = $("#password").val();
                    let checkValidasiPassword = $("#checkValidasiPassword");

                    // Reset fa-x ke fa-check password
                    checkValidasiPassword.removeClass("bg-red bg-d-green");
                    checkValidasiPassword.find('i').removeClass("fa-x fa-check");

                    if (confirmPassword === originalPassword && confirmPassword !== "" &&
                        confirmPassword.length >= 6) {
                        // Validasi Berhasil
                        checkValidasiPassword.addClass("bg-d-green");
                        checkValidasiPassword.find('i').addClass("fa-check");
                        $("#simpan").removeClass("cursor-not-allowed").addClass("cursor-pointer");

                        $("#simpan div").addClass("hidden");
                        $("#simpan button").removeClass("hidden");
                    } else {
                        // Validasi Gagal
                        checkValidasiPassword.addClass("bg-red");
                        checkValidasiPassword.find('i').addClass("fa-x");
                        $("#simpan").removeClass("cursor-pointer").addClass("cursor-not-allowed");
                        $("#simpan div").removeClass("hidden");
                        $("#simpan button").addClass("hidden");
                    }
                });
            });

            // show password
            $("#lihatPassword").on("click", function() {

                if ($("#password").attr("type") === "password") {
                    $("#password").attr("type", "text");
                    $("#validasiPassword").attr("type", "text");
                    $("#lihatPassword i").removeClass("fa-eye").addClass("fa-eye-slash");
                } else {
                    $("#password").attr("type", "password");
                    $("#validasiPassword").attr("type", "password");
                    $("#lihatPassword i").removeClass("fa-eye-slash").addClass("fa-eye");
                }
            });

            // Toggle Foto
            $("#togglePasFoto").on("click", function() {
                $("#triggerPasFoto").toggleClass("hidden flex");
            });

            $("#lihatPasFotoLama").on("click", function() {
                $("#previewImageLama").removeClass("hidden").addClass("fixed");

                // Mengubah isi src
                $("#previewImageLama img").addClass().attr("src",
                    "{{ asset('storage/siswa/' . $user->tahun_daftar . '/' . $user->nik . '/' . $user->detailCalonSiswa->pas_foto) }}"
                )

                // Remove Modal
                $("#closePreviewImageLama").on("click", function() {
                    $("#previewImageLama").removeClass("fixed").addClass("hidden");
                });
            });

            // Tampilkan Update Pas Foto
            $("#lihatPasFoto").on("click", function() {

                let readerPasFoto = new FileReader();

                readerPasFoto.onloadend = function() {
                    $('#previewImage').attr('src', readerPasFoto.result);
                    $('#divPreviewImage').removeClass('hidden').addClass('fixed');
                };

                if ($('#inputPasFoto')[0].files[0]) {
                    readerPasFoto.readAsDataURL($('#inputPasFoto')[0].files[0]);
                }

                // Close Tampilan update pas foto
                $("#closePreviewImage").on("click", function() {
                    $("#divPreviewImage").removeClass("fixed").addClass("hidden");
                });
            });
        });
    </script>
@endsection
