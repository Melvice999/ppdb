<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_smk.png') }}" type="image/x-icon">
    <title>Login
        {{ $auth === 'auth-siswa'
            ? 'Siswa'
            : ($auth === 'auth-admin'
                ? 'Admin'
                : ($auth === 'auth-headmaster'
                    ? 'Headmaster'
                    : 'Akun PPDB')) }}
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Aldrich&display=swap');
        @import url('https://fonts.cdnfonts.com/css/sen');

        @layer base {

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        }
    </style>
</head>

<body class="font-sen bg-d-green">




    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white outline outline-d-green rounded p-6 max-md:mx-10">

            {{-- Pesan Error --}}
            @if (session('error'))
                <ul class="bg-d-green text-white p-3 mb-5 rounded text-sm">
                    <li> {{ session('error') }} </li>
                </ul>
            @endif

            {{-- Pesan Sukses --}}
            @if (session('success'))
                <ul class="bg-d-green text-white p-3 text-center rounded text-sm">
                    <li> {{ session('success') }} </li>
                    <li> {{ session('sukses') }} </li>
                </ul>
                <br>
            @endif

            <div class="text-center">
                {{-- Header --}}
                <img src="{{ asset('assets/img/logo_smk.png') }}" width="90px" class="mx-auto">

                <h6 class="uppercase text-lg mt-5 mb-2">Login
                    {{ $auth === 'auth-siswa'
                        ? 'Akun PPDB'
                        : ($auth === 'auth-admin'
                            ? 'Admin PPDB'
                            : ($auth === 'auth-headmaster'
                                ? 'Headmaster PPDB'
                                : 'Akun PPDB')) }}

                    <br> SMK Ma'arif NU Doro
                </h6>

                <p class="text-sm">Silahkan masuk menggunakan <br>akun yang telah didaftarkan</p>
            </div>

            <form method="POST"
                action="{{ route(
                    $auth === 'auth-siswa'
                        ? 'auth-siswa-login'
                        : ($auth === 'auth-admin'
                            ? 'auth-admin-login'
                            : 'auth-headmaster-login'),
                ) }}">
                @csrf

                <div class="mt-10">
                    @if ($auth === 'auth-admin' or $auth === 'auth-headmaster')
                        {{-- Email --}}
                        <div class="mt-4">Email</div>
                        <div class="relative ">

                            {{-- Icon Email --}}
                            <div class="absolute pointer-events-none ">
                                <i class="fa-solid fa-envelope text-d-green"></i>
                            </div>

                            {{-- Input Email --}}
                            <input type="Email" name="email" placeholder="Masukan email" value="{{ old('email') }}"
                                class="border-b border-[#000842] focus:border-[#000842]  outline-none w-full mb-2 pl-6"
                                required>

                        </div>
                    @endif

                    @if ($auth === 'auth-siswa')
                        {{-- NIK --}}
                        <div class="mt-4">NIK</div>
                        <div class="relative ">

                            {{-- Icon NIK --}}
                            <div class="absolute pointer-events-none ">
                                <i class="fa-solid fa-user text-d-green"></i>
                            </div>

                            {{-- Input NIK --}}
                            <input type="number" name="nik" placeholder="Masukan NIK" value="{{ old('nik') }}"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                maxlength="16"
                                class="border-b border-[#000842] focus:border-[#000842]  outline-none w-full mb-2 pl-5"
                                required>

                        </div>
                    @endif

                    {{-- Password --}}
                    <div class="mt-4">Password</div>
                    <div class="relative">
                        <div class="flex justify-between border-b border-[#000842]">

                            {{-- Icon Lock Password --}}
                            <div>
                                <i class="fa-solid fa-lock text-d-green"></i>
                            </div>

                            {{-- Input Password --}}
                            <input type="password" name="password" id="password" placeholder="Masukan password"
                                class="outline-none w-full pl-2" autocomplete="off" required>

                            {{-- Icon Eye Slash --}}
                            <i class="fa-regular fa-eye-slash cursor-pointer text-d-green" id="eye"></i>

                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center mt-5">
                    <button class="text-white rounded bg-[#39A170] px-20 w-full py-3">
                        Login
                    </button>
                </div>

            </form>

            @if ($auth === 'auth-siswa')
                <div class="mt-5 relative text-r">
                    <div class="">
                        <a href="{{ route('daftar') }}">Belum daftar? <span class="text-blue underline"> Segera
                                Daftar</span></a>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <script type="module">
        $(document).ready(function() {
            $("#eye").click(function() {
                let input = $("#password")
                $("#eye").toggleClass("fa-eye");
                if (input.attr("type") === "password") {
                    input.attr("type", "text")
                } else {
                    input.attr("type", "password")
                }
            });
        });
    </script>

</body>

</html>
