<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>ABC</title>

</head>

<body>
    <div class="flex">

        <div class="bg-d-green w-1/4 h-screen text-white">
            <img src="{{ asset('asset/img/logo_smk.png') }}" alt="" width="90px" class="mx-auto mt-3">
            <div class="w-10/12 my-5 mx-auto rounded-full bg-white h-1">
            </div>

            <div class="ml-7">
                <div class="mr-7 rounded-3xl bg-white text-d-green" id="active">
                    <div class="p-2 mt-8">
                        <i class="fa-solid fa-square-minus me-2"></i> Beranda
                    </div>
                </div>
                <div class="p-2 mt-3">
                    <i class="fa-solid fa-square-minus me-2"></i> Pendaftar
                </div>
                <div class="p-2 mt-3">
                    <i class="fa-solid fa-square-minus me-2"></i> Cetak
                </div>
                <div class="absolute bottom-0 mb-5">
                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                </div>

            </div>
        </div>

        <div class="bg-white w-3/4 h-screen">
            gqhghgh
        </div>
    </div>

</body>

</html>
