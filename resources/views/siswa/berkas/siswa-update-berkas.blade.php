@extends('layouts.siswa-layout')
@section('content')
    <style>
        ::file-selector-button {
            display: none;
        }
    </style>

    @if ($berkas && $berkas->akta)
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

        <div class="mt-1 mx-10 max-md:block">

            {{-- Akta --}}
            <div class="flex justify-center">
                <div class="w-1/2  grid grid-cols-3 max-md:w-full mt-2 bg-white">
                    <div class="py-2 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl">
                        Akta
                    </div>


                    <div class="border-d-green border focus:outline-none cursor-pointer flex justify-center items-center"
                        id="toggleAkta">
                        Ubah

                    </div>
                    <div class="flex items-center cursor-pointer justify-center border-d-green border-t border-r border-b rounded-tr rounded-br"
                        id="lihatAktaLama">
                        Lihat
                    </div>
                </div>

            </div>

            {{-- Input akta on click --}}
            <form action="{{ route('siswa-update-berkas-akta-post', ['id' => $user->nik]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" value="{{ $berkas->akta }}" name="aktaLama">

                <div class="hidden justify-center mb-5" id="triggerAkta">
                    <div class="w-1/2 grid grid-cols-3 max-md:w-full mt-2 bg-white">

                        <div class="py-2 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl">
                            Akta
                        </div>

                        <div class="border-d-green border focus:outline-none flex justify-center items-center">
                            <input type="file" class="w-full ps-2" accept=".pdf" name="akta"
                                onchange="validateFileSize(this, 1.5)" id="inputAkta" required>
                        </div>

                        <div
                            class="grid grid-cols-2 items-center border-d-green border-t border-r border-b rounded-tr rounded-br">

                            <div class="border-r h-full w-full cursor-pointer flex justify-center items-center"
                                id="lihatAkta">
                                <i class="fa-solid fa-eye text-blue"></i>
                            </div>

                            <button class=" h-full w-full cursor-pointer flex justify-center items-center">
                                <i class="fa-solid fa-paper-plane text-d-green"></i>
                            </button>

                        </div>

                    </div>
                </div>
            </form>

            {{-- KK --}}
            <div class="flex justify-center">

                <div class="w-1/2  grid grid-cols-3 max-md:w-full mt-2 bg-white">
                    <div class="py-2 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl">
                        KK
                    </div>

                    <div class="border-d-green border focus:outline-none cursor-pointer flex justify-center items-center"
                        id="toggleKk">
                        Ubah
                    </div>

                    <div class="flex items-center cursor-pointer justify-center border-d-green border-t border-r border-b rounded-tr rounded-br"
                        id="lihatKkLama">
                        Lihat
                    </div>
                </div>

            </div>

            {{-- Input KK on click --}}
            <form action="{{ route('siswa-update-berkas-kk-post', ['id' => $user->nik]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" value="{{ $berkas->kk }}" name="kkLama">

                <div class="hidden justify-center mb-5" id="triggerKk">
                    <div class="w-1/2 grid grid-cols-3 max-md:w-full mt-2 bg-white">

                        <div class="py-2 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl">
                            KK
                        </div>

                        <div class="border-d-green border focus:outline-none flex justify-center items-center">
                            <input type="file" class="w-full ps-2" accept=".pdf" name="kk" onchange="validateFileSize(this, 1.5)"
                                id="inputKk" required>
                        </div>

                        <div
                            class="grid grid-cols-2 items-center cursor-pointer border-d-green border-t border-r border-b rounded-tr rounded-br">

                            <div class="border-r h-full flex justify-center items-center" id="lihatKk">
                                <i class="fa-solid fa-eye text-blue"></i>
                            </div>

                            <button class=" h-full flex justify-center items-center">
                                <i class="fa-solid fa-paper-plane text-d-green"></i>
                            </button>

                        </div>

                    </div>
                </div>
            </form>

            {{-- Pas Foto --}}
            <div class="flex justify-center">
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

                <input type="hidden" value="{{ $berkas->pas_foto }}" name="pasFotoLama">

                <div class="hidden justify-center mb-5" id="triggerPasFoto">
                    <div class="w-1/2 grid grid-cols-3 max-md:w-full mt-2 bg-white">

                        <div class="py-2 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl">
                            Pas Foto
                        </div>

                        <div class="border-d-green border focus:outline-none flex justify-center items-center">
                            <input type="file" class="w-full ps-2" accept=".jpg, .png, .jpeg" name="pas_foto"
                                onchange="validateFileSize(this, 1.5)" id="inputPasFoto" required>
                        </div>

                        <div
                            class="grid grid-cols-2 items-center cursor-pointer border-d-green border-t border-r border-b rounded-tr rounded-br">

                            <div class="border-r h-full flex justify-center items-center" id="lihatPasFoto">
                                <i class="fa-solid fa-eye text-blue"></i>
                            </div>

                            <button class=" h-full flex justify-center items-center">
                                <i class="fa-solid fa-paper-plane text-d-green"></i>
                            </button>

                        </div>

                    </div>
                </div>
            </form>

            {{-- SHUN --}}
            <div class="flex justify-center">
                <div class="w-1/2 grid grid-cols-3 max-md:w-full mt-2 bg-white">
                    <div class="py-2 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl">
                        SHUN
                    </div>

                    <div class="border-d-green border focus:outline-none cursor-pointer flex justify-center items-center"
                        id="toggleShun">
                        Ubah
                    </div>
                    <div class="flex items-center cursor-pointer justify-center border-d-green border-t border-r border-b rounded-tr rounded-br"
                        id="lihatShunLama">
                        Lihat
                    </div>
                </div>

            </div>

            {{-- Input SHUN on click --}}
            <form action="{{ route('siswa-update-berkas-shun-post', ['id' => $user->nik]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" value="{{ $berkas->shun }}" name="shunLama">

                <div class="hidden justify-center mb-5" id="triggerShun">
                    <div class="w-1/2 grid grid-cols-3 max-md:w-full mt-2 bg-white">

                        <div class="py-2 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl">
                            SHUN
                        </div>

                        <div class="border-d-green border focus:outline-none flex justify-center items-center">
                            <input type="file" class="w-full ps-2" accept=".pdf" name="shun"
                                onchange="validateFileSize(this, 1.5)" id="inputShun" required>
                        </div>

                        <div
                            class="grid grid-cols-2 items-center cursor-pointer border-d-green border-t border-r border-b rounded-tr rounded-br">

                            <div class="border-r h-full flex justify-center items-center" id="lihatShun">
                                <i class="fa-solid fa-eye text-blue"></i>
                            </div>

                            <button class=" h-full flex justify-center items-center">
                                <i class="fa-solid fa-paper-plane text-d-green"></i>
                            </button>

                        </div>

                    </div>
                </div>
            </form>

            {{-- Ijazah --}}
            <div class="flex justify-center">
                <div class="w-1/2  grid grid-cols-3 max-md:w-full mt-2 bg-white">
                    <div class="py-2 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl">
                        Ijazah
                    </div>

                    <div class="border-d-green border focus:outline-none cursor-pointer flex justify-center items-center"
                        id="toggleIjazah">
                        Ubah
                    </div>
                    <div class="flex items-center cursor-pointer justify-center border-d-green border-t border-r border-b rounded-tr rounded-br"
                        id="lihatIjazahLama">
                        Lihat
                    </div>
                </div>

            </div>

            {{-- Input Ijazah on click --}}
            <form action="{{ route('siswa-update-berkas-ijazah-post', ['id' => $user->nik]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" value="{{ $berkas->ijazah }}" name="ijazahLama">

                <div class="hidden justify-center mb-5" id="triggerIjazah">
                    <div class="w-1/2 grid grid-cols-3 max-md:w-full mt-2 bg-white">

                        <div class="py-2 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl">
                            Ijazah
                        </div>

                        <div class="border-d-green border focus:outline-none flex justify-center items-center">
                            <input type="file" class="w-full ps-2" accept=".pdf" name="ijazah"
                                onchange="validateFileSize(this, 1.5)" id="inputIjazah" required>
                        </div>

                        <div
                            class="grid grid-cols-2 items-center cursor-pointer border-d-green border-t border-r border-b rounded-tr rounded-br">

                            <div class="border-r h-full flex justify-center items-center" id="lihatIjazah">
                                <i class="fa-solid fa-eye text-blue"></i>
                            </div>
                            <button class=" h-full flex justify-center items-center">
                                <i class="fa-solid fa-paper-plane text-d-green"></i>
                            </button>

                        </div>

                    </div>
                </div>
            </form>

        </div>

        {{-- Div Modal PDF Lama --}}
        <div class="hidden top-0 justify-center items-center bg-black bg-opacity-40 w-screen h-screen"
            id="previewBerkasLama">

            <iframe class="fixed w-full h-full top-0" src="">
            </iframe>

            <div class="fixed top-2 right-28 mr-1 mt-0.5 flex justify-center items-center hover:bg-white hover:bg-opacity-10 rounded-full px-2.5 py-1 cursor-pointer"
                id="closePreviewBerkasLama">
                <i class="fa-solid fa-xmark text-white text-xl"></i>
            </div>

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

        {{-- Div Modal PDF Baru --}}
        <div class="hidden w-full h-full bg-black bg-opacity-20 top-0" id="divPreviewPDF">
            <div class="flex w-full h-full justify-center items-center">

                <div class="fixed flex justify-center items-center top-3.5 px-2 right-28 mr-3 cursor-pointer hover:bg-l-sky-blue hover:bg-opacity-10 rounded-full"
                    id="closePreviewPDF">
                    <i class="fa-solid fa-xmark text-white text-xl"></i>
                </div>

                <div class="w-full h-full">
                    <embed src="" alt="Pratinjau Gambar" id="previewPDF" class="bg-white rounded w-full h-full">
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

                // Close Modal Berkas Lama
                $("#closePreviewBerkasLama").on("click", function() {
                    $("#previewBerkasLama").removeClass("fixed").addClass("hidden");
                });

                // Close Modal Berkas Baru
                $("#closePreviewPDF").on("click", function() {
                    $("#divPreviewPDF").removeClass("fixed").addClass("hidden");
                });


                // Toggle Akta
                $("#toggleAkta").on("click", function() {
                    $("#triggerAkta").toggleClass("hidden flex");
                });

                $("#lihatAktaLama").on("click", function() {
                    $("#previewBerkasLama").removeClass("hidden").addClass("fixed");

                    // Mengubah isi src
                    $("#previewBerkasLama iframe").attr("src",
                        "data:application/pdf;base64,{{ base64_encode(file_get_contents('storage/siswa/akta/' . $berkas->akta)) }}"
                    )
                });

                // Tampilkan Update Akta
                $("#lihatAkta").on("click", function() {

                    let readerAkta = new FileReader();

                    readerAkta.onloadend = function() {
                        $('#previewPDF').attr('src', readerAkta.result);
                        $('#divPreviewPDF').removeClass('hidden').addClass('fixed');
                    };

                    if ($('#inputAkta')[0].files[0]) {
                        readerAkta.readAsDataURL($('#inputAkta')[0].files[0]);
                    }
                });


                // Toggle KK
                $("#toggleKk").on("click", function() {
                    $("#triggerKk").toggleClass("hidden flex");
                });

                $("#lihatKkLama").on("click", function() {
                    $("#previewBerkasLama").removeClass("hidden").addClass("fixed");

                    // Mengubah isi src
                    $("#previewBerkasLama iframe").attr("src",
                        "data:application/pdf;base64,{{ base64_encode(file_get_contents('storage/siswa/kk/' . $berkas->kk)) }}"
                    )
                });

                // Tampilkan Update KK
                $("#lihatKk").on("click", function() {

                    let readerKk = new FileReader();

                    readerKk.onloadend = function() {
                        $('#previewPDF').attr('src', readerKk.result);
                        $('#divPreviewPDF').removeClass('hidden').addClass('fixed');
                    };

                    if ($('#inputKk')[0].files[0]) {
                        readerKk.readAsDataURL($('#inputKk')[0].files[0]);
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
                        "{{ asset('storage/siswa/pas-foto/' . $berkas->pas_foto) }}"
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

                // Toggle SHUN
                $("#toggleShun").on("click", function() {
                    $("#triggerShun").toggleClass("hidden flex");
                });

                $("#lihatShunLama").on("click", function() {
                    $("#previewBerkasLama").removeClass("hidden").addClass("fixed");

                    // Mengubah isi src
                    $("#previewBerkasLama iframe").attr("src",
                        "data:application/pdf;base64,{{ base64_encode(file_get_contents('storage/siswa/shun/' . $berkas->shun)) }}"
                    )
                });

                // Tampilkan Update SHUN
                $("#lihatShun").on("click", function() {

                    let readerShun = new FileReader();

                    readerShun.onloadend = function() {
                        $('#previewPDF').attr('src', readerShun.result);
                        $('#divPreviewPDF').removeClass('hidden').addClass('fixed');
                    };

                    if ($('#inputShun')[0].files[0]) {
                        readerShun.readAsDataURL($('#inputShun')[0].files[0]);
                    }
                });

                // Toggle Ijazah
                $("#toggleIjazah").on("click", function() {
                    $("#triggerIjazah").toggleClass("hidden flex");
                });

                $("#lihatIjazahLama").on("click", function() {
                    $("#previewBerkasLama").removeClass("hidden").addClass("fixed");

                    // Mengubah isi src
                    $("#previewBerkasLama iframe").attr("src",
                        "data:application/pdf;base64,{{ base64_encode(file_get_contents('storage/siswa/ijazah/' . $berkas->ijazah)) }}"
                    )
                });

                // Tampilkan Update Ijazah
                $("#lihatIjazah").on("click", function() {

                    let readerIjazah = new FileReader();

                    readerIjazah.onloadend = function() {
                        $('#previewPDF').attr('src', readerIjazah.result);
                        $('#divPreviewPDF').removeClass('hidden').addClass('fixed');
                    };

                    if ($('#inputIjazah')[0].files[0]) {
                        readerIjazah.readAsDataURL($('#inputIjazah')[0].files[0]);
                    }
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
            });
        </script>
    @endif
@endsection
