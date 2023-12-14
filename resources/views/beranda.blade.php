<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>Laravel</title>

    <!-- Fonts -->

    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Aldrich&display=swap');

        @keyframes slide {
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
        <div class="flex">
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
    <div class="m-8 overflow-hidden">
        <div class="w-100%  bg-l-sky-blue">
            {{-- logo --}}
            <div class="flex uppercase absolute">
                <div class="m-5">
                    <img src="{{ asset('asset/img/logo_smk.png') }}" alt="" width="120">
                </div>
                <div class="my-auto text-lg">
                    Penerimaan Peserta Didik Baru <br>
                    SMK Ma’arif NU Doro
                </div>
                
            </div>

            <div class="awan">
                <img src="{{ asset('asset/img/awan.png') }}" alt=""
                    style="animation: slide 20s linear infinite;">
                <img src="{{ asset('asset/img/awan.png') }}" alt=""
                    style="animation: slide 40s linear infinite;">
                <img src="{{ asset('asset/img/awan.png') }}" alt=""
                    style="animation: slide 28s linear infinite;">
                <img src="{{ asset('asset/img/awan.png') }}" alt=""
                    style="animation: slide 16s linear infinite;">
            </div>

        </div>
    </div>
</body>

</html>
