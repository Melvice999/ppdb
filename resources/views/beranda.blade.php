<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>Laravel</title>

    <!-- Styles -->
    <style>
        /* font */
        @import url('https://fonts.googleapis.com/css2?family=Aldrich&display=swap');

        /* animasi awan */
        @keyframes awan {
            0% {
                transform: translateX(-200%);
            }

            100% {
                transform: translateX(1000%);
            }
        }
    </style>


</head>

<body class="font-aldrich">
    {{-- navbar --}}
    <div class="w-full h-16 pl-5 grid content-center bg-d-green text-white">
        <img src="{{ asset('asset/img/logo_smk.png') }}" alt="" width="50px" class="md:hidden">

        <div class="flex max-md:hidden">
            <div class="mr-5 flex-auto">
                <img src="{{ asset('asset/img/logo_smk.png') }}" alt="" width="40px">
            </div>
            <div class="flex-auto my-auto">
                Beranda
            </div>
            <div class="flex-auto my-auto">
                Pendaftaran
            </div>
            <div class="flex-auto my-auto">
                Hasil Seleksi
            </div>
            <div class="flex-auto my-auto">
                Informasi
            </div>
            <div class="flex-auto my-auto">
                Kontak
            </div>
            <div class="flex-auto my-auto pl-5 pt-2 pb-2 rounded-l-lg bg-white text-d-green">
                <div class="my-auto">
                    Profil
                </div>
            </div>
        </div>
    </div>

    {{-- header --}}
    <div class=" overflow-hidden">

        <div class="bg-l-sky-blue max-md:h-64">
            {{-- animasi awan --}}
            <div class="awan">
                <img src="{{ asset('asset/img/awan.png') }}" alt=""
                    style="animation: awan 20s linear infinite;">
                <img src="{{ asset('asset/img/awan.png') }}" alt=""
                    style="animation: awan 40s linear infinite;">
                <img src="{{ asset('asset/img/awan.png') }}" alt=""
                    style="animation: awan 28s linear infinite;">
                <img src="{{ asset('asset/img/awan.png') }}" alt=""
                    style="animation: awan 16s linear infinite;">
            </div>

            {{-- logo --}}
            <div class="absolute top-16 uppercase sm:left-10 md:left-36 lg:left-56 xl:left-80 2xl:left-96">
                <div class="flex">
                    <div class="m-5 max-md:hidden">
                        <img src="{{ asset('asset/img/logo_smk.png') }}" alt="" width="100">
                    </div>
                    <div
                        class="my-auto tracking-widest text-xl font-bold text-d-green max-md:text-lg max-md:mt-5 max-md:ml-5">
                        Penerimaan Peserta Didik Baru <br>
                        SMK Ma’arif NU Doro
                    </div>
                </div>
            </div>

            {{-- tombol daftar dan masuk --}}
            <div class="border-d-green text-d-green">
                <div class="absolute top-44 sm:left-20 md:left-28 lg:left-48 xl:left-64 2xl:left-96">
                    <div class="flex sm:gap-10 lg:gap-36 max-md:block ml-20">
                        <div class="px-16 py-3 border-2 rounded border-d-green bg-white cursor-pointer">
                            Daftar
                        </div>
                        <div class="px-16 py-3 border-2 rounded border-d-green bg-white cursor-pointer max-md:mt-4">
                            Masuk
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex mt-16 ml-10 mr-10 gap-5 text-center max-md:block max-md:mt-2">
        <div class="w-1/2 border-2 border-d-green max-md:w-full">
            adjsjsdajn
        </div>
        <div class="w-1/2 border-2 border-d-green max-md:w-full">
            kaskdmksa
        </div>
    </div>
    <div class="flex mt-8 ml-10 mr-10 gap-5 text-center max-md:block max-md:mt-2">
        <div class="w-1/2 border-2 border-d-green max-md:w-full">
            adjsjsdajn
        </div>
        <div class="w-1/2 border-2 border-d-green max-md:w-full">
            kaskdmksa
        </div>
    </div>



</body>

</html>
