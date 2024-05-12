@extends('layouts.siswa-layout')
@section('content')
    <style>
        ::file-selector-button {
            display: none;
        }
    </style>

    @if ($user->notifikasi_admin === 'Lengkapi Berkas')
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

        <div class="{{ $berkas && $berkas->nik ? 'hidden' : '' }}">
            {{-- Modal Preview PDF --}}
            <div class="hidden w-full h-full bg-black bg-opacity-20 top-0" id="divPreviewPDF">
                <div class="flex w-full h-full justify-center items-center">

                    <div class="fixed flex justify-center items-center top-3.5 px-2 right-28 mr-3 cursor-pointer hover:bg-l-sky-blue hover:bg-opacity-10 rounded-full max-md:right-0"
                        onclick="closePreviewPDF()">
                        <i class="fa-solid fa-xmark text-white text-xl max-md:text-d-green"></i>
                    </div>

                    <div class="w-full h-full">
                        <embed src="" alt="Pratinjau Gambar" id="previewPDF" class="bg-white rounded w-full h-full">
                    </div>

                </div>
            </div>

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

            <div class="mt-1 mx-10 max-md:block">
                <form action="{{ route('siswa-upload-berkas-post') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" value="{{ $user->nik }}" name="nik">

                    <div class="flex justify-center">
                        <div class="w-1/2 flex max-md:w-full mt-2 bg-white">
                            <div
                                class="py-2 w-1/3 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl max-md:w-2/5">
                                Akta
                            </div>


                            <div
                                class="border-d-green border focus:outline-none w-3/5 max-md:w-2/5 flex justify-center items-center">
                                <input type="file" class="w-full ps-2" accept=".pdf"
                                    onchange="validateFileSize(this, 1.5)" id="inputAkta" name="akta" required>

                            </div>
                            <label
                                class="flex items-center cursor-pointer justify-center border-d-green border-t border-r border-b rounded-tr rounded-br w-1/5"
                                onclick="buttonAkta()">
                                Lihat
                            </label>
                        </div>

                    </div>

                    <div class="flex justify-center">

                        <div class="w-1/2 flex max-md:w-full mt-2 bg-white">
                            <div
                                class="py-2 w-1/3 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl max-md:w-2/5">
                                KK
                            </div>

                            <div
                                class="border-d-green border focus:outline-none w-3/5 max-md:w-2/5 flex justify-center items-center">
                                <input type="file" class="w-full ps-2" accept=".pdf"
                                    onchange="validateFileSize(this, 1.5)" id="inputKk" name="kk" required>
                            </div>
                            <label
                                class="flex items-center cursor-pointer justify-center border-d-green border-t border-r border-b rounded-tr rounded-br w-1/5"
                                onclick="buttonKk()">
                                Lihat
                            </label>
                        </div>

                    </div>

                    <div class="flex justify-center">
                        <div class="w-1/2 flex max-md:w-full mt-2 bg-white">
                            <div
                                class="py-2 w-1/3 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl max-md:w-2/5">
                                SHUN
                            </div>

                            <div
                                class="border-d-green border focus:outline-none w-3/5 max-md:w-2/5 flex justify-center items-center">
                                <input type="file" class="w-full ps-2" accept=".pdf"
                                    onchange="validateFileSize(this, 1.5)" id="inputShun" name="shun" required>
                            </div>
                            <label
                                class="flex items-center cursor-pointer justify-center border-d-green border-t border-r border-b rounded-tr rounded-br w-1/5"
                                onclick="buttonShun()">
                                Lihat
                            </label>
                        </div>

                    </div>

                    <div class="flex justify-center">
                        <div class="w-1/2 flex max-md:w-full mt-2 bg-white">
                            <div
                                class="py-2 w-1/3 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl max-md:w-2/5">
                                Ijazah
                            </div>

                            <div
                                class="border-d-green border focus:outline-none w-3/5 max-md:w-2/5 flex justify-center items-center">
                                <input type="file" class="w-full ps-2" accept=".pdf"
                                    onchange="validateFileSize(this, 1.5)" id="inputIjazah" name="ijazah" required>
                            </div>
                            <label
                                class="flex items-center cursor-pointer justify-center border-d-green border-t border-r border-b rounded-tr rounded-br w-1/5"
                                onclick="buttonIjazah()">
                                Lihat
                            </label>
                        </div>

                    </div>

                    <div class="flex justify-center">
                        <div class="w-1/2 flex max-md:w-full mt-2 bg-white">
                            <div
                                class="py-2 w-1/3 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl max-md:w-2/5">
                                Raport
                            </div>

                            <div
                                class="border-d-green border focus:outline-none w-3/5 max-md:w-2/5 flex justify-center items-center">
                                <input type="file" class="w-full ps-2" accept=".pdf"
                                    onchange="validateFileSize(this, 1.5)" id="inputRaport" name="raport" required>
                            </div>
                            <label
                                class="flex items-center cursor-pointer justify-center border-d-green border-t border-r border-b rounded-tr rounded-br w-1/5"
                                onclick="buttonRaport()">
                                Lihat
                            </label>
                        </div>

                    </div>

                    <div class="flex justify-center">
                        <div class="w-1/2 flex max-md:w-full mt-2 bg-white">
                            <div
                                class="py-2 w-1/3 ps-2 border-t border-l border-b border-d-green rounded-tl rounded-bl max-md:w-2/5">
                                Transkrip Nilai
                            </div>

                            <div
                                class="border-d-green border focus:outline-none w-3/5 max-md:w-2/5 flex justify-center items-center">
                                <input type="file" class="w-full ps-2" accept=".pdf"
                                    onchange="validateFileSize(this, 1.5)" id="inputTranskripNilai" name="transkrip_nilai"
                                    required>
                            </div>
                            <label
                                class="flex items-center cursor-pointer justify-center border-d-green border-t border-r border-b rounded-tr rounded-br w-1/5"
                                onclick="buttonTranskripNilai()">
                                Lihat
                            </label>
                        </div>

                    </div>

                    <div class="flex justify-center mt-5">
                        <div class="w-1/2 text-end max-md:w-full mt-2">
                            <button
                                class="py-2 px-4 bg-white border-d-green border rounded w-full hover:bg-d-green hover:text-white">
                                Simpan
                            </button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
        <div class="{{ $berkas && $berkas->nik ? '' : 'hidden' }}">
            <div class="flex justify-center mt-3 mx-10 max-md:block">
                <div class="w-1/2 mt-2 max-md:w-full">
                    <div
                        class="flex justify-center items-center w-full px-2 py-1 rounded max-md:w-full border-d-green border cursor-pointer bg-white text-d-green">
                        Berkas sudah terupload tunggu konfirmasi admin
                    </div>
                </div>
            </div>
        </div>

        <script type="module">
            $(document).ready(function() {

                // Tampilkan Akta
                window.buttonAkta = function() {
                    let inputAkta = $('#inputAkta')[0];
                    let divPreviewPDF = $('#divPreviewPDF');
                    let previewPDF = $('#previewPDF');

                    let fileAkta = inputAkta.files[0];
                    let readerAkta = new FileReader();

                    readerAkta.onloadend = function() {
                        previewPDF.attr('src', readerAkta.result);
                        divPreviewPDF.removeClass('hidden').addClass('fixed');
                    };

                    if (fileAkta) {
                        readerAkta.readAsDataURL(fileAkta);
                    }
                }

                // Tampilkan KK
                window.buttonKk = function() {
                    let inputKk = $('#inputKk')[0];
                    let divPreviewPDF = $('#divPreviewPDF');
                    let previewPDF = $('#previewPDF');

                    let fileKk = inputKk.files[0];
                    let readerKk = new FileReader();

                    readerKk.onloadend = function() {
                        previewPDF.attr('src', readerKk.result);
                        divPreviewPDF.removeClass('hidden').addClass('fixed');
                    };

                    if (fileKk) {
                        readerKk.readAsDataURL(fileKk);
                    }
                }


                // Tampilkan SHUN
                window.buttonShun = function() {
                    let inputShun = $('#inputShun')[0];
                    let divPreviewPDF = $('#divPreviewPDF');
                    let previewPDF = $('#previewPDF');

                    let fileShun = inputShun.files[0];
                    let readerShun = new FileReader();

                    readerShun.onloadend = function() {
                        previewPDF.attr('src', readerShun.result);
                        divPreviewPDF.removeClass('hidden').addClass('fixed');
                    };

                    if (fileShun) {
                        readerShun.readAsDataURL(fileShun);
                    }
                }

                // Tampilkan Ijazah
                window.buttonIjazah = function() {
                    let inputIjazah = $('#inputIjazah')[0];
                    let divPreviewPDF = $('#divPreviewPDF');
                    let previewPDF = $('#previewPDF');

                    let fileIjazah = inputIjazah.files[0];
                    let readerIjazah = new FileReader();

                    readerIjazah.onloadend = function() {
                        previewPDF.attr('src', readerIjazah.result);
                        divPreviewPDF.removeClass('hidden').addClass('fixed');
                    };

                    if (fileIjazah) {
                        readerIjazah.readAsDataURL(fileIjazah);
                    }
                }

                // Tampilkan Raport
                window.buttonRaport = function() {
                    let inputRaport = $('#inputRaport')[0];
                    let divPreviewPDF = $('#divPreviewPDF');
                    let previewPDF = $('#previewPDF');

                    let fileRaport = inputRaport.files[0];
                    let readerRaport = new FileReader();

                    readerRaport.onloadend = function() {
                        previewPDF.attr('src', readerRaport.result);
                        divPreviewPDF.removeClass('hidden').addClass('fixed');
                    };

                    if (fileRaport) {
                        readerRaport.readAsDataURL(fileRaport);
                    }
                }

                // Tampilkan TranskripNilai
                window.buttonTranskripNilai = function() {
                    let inputTranskripNilai = $('#inputTranskripNilai')[0];
                    let divPreviewPDF = $('#divPreviewPDF');
                    let previewPDF = $('#previewPDF');

                    let fileTranskripNilai = inputTranskripNilai.files[0];
                    let readerTranskripNilai = new FileReader();

                    readerTranskripNilai.onloadend = function() {
                        previewPDF.attr('src', readerTranskripNilai.result);
                        divPreviewPDF.removeClass('hidden').addClass('fixed');
                    };

                    if (fileTranskripNilai) {
                        readerTranskripNilai.readAsDataURL(fileTranskripNilai);
                    }
                }

                // Close Modal PDF
                window.closePreviewPDF = function() {
                    let divPreviewPDF = $('#divPreviewPDF');
                    divPreviewPDF.removeClass('fixed').addClass('hidden');
                }
                // Close Modal Image
                window.closePreviewImage = function() {
                    let divPreviewImage = $('#divPreviewImage');
                    divPreviewImage.removeClass('fixed').addClass('hidden');
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
                // Alert jika file yang diunggah bukan PDF
                $('form').on('change', 'input[type="file"][accept=".pdf"]', function() {
                    let inputFile = $(this);
                    let fileType = inputFile.prop('files')[0].type;

                    if (fileType !== 'application/pdf') {
                        alert('File yang Anda unggah harus berformat PDF.');
                        inputFile.val('');
                        return false;
                    }
                });
            });
        </script>
    @else
        <div class="flex justify-center mt-3 mx-10 max-md:block">
            <div class="w-1/2 mt-2 max-md:w-full">
                <div
                    class="flex justify-center items-center w-full px-2 py-1 rounded max-md:w-full border-d-green border cursor-pointer bg-white text-d-green">
                    Sesi Upload Berkas Belum Terbuka
                </div>
            </div>
        </div>
    @endif
@endsection
