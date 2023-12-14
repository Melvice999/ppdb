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
    </style>


</head>

<body class="font-aldrich">
    {{-- navbar --}}
    <div class="w-full h-16 pl-5 grid content-center bg-green-900 text-white">
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
            <div class="flex-auto my-auto pl-5 pt-2 pb-2 rounded-l-lg bg-white text-green-900">
                <div class="my-auto">
                    Profil
                </div>
            </div>
        </div>
    </div>
</body>

</html>
