<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('asset/img/logo_smk.png') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Aldrich&display=swap');
        @import url('https://fonts.cdnfonts.com/css/sen');
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
                {{-- <br> --}}
            @endif
            {{-- Pesan Sukses --}}
            @if (session('success'))
                <ul class="bg-d-green text-white p-3 rounded text-sm">
                    <li> {{ session('success') }} </li>
                    <li> {{ session('sukses') }} </li>
                </ul>
                <br>
            @endif
            <div class="text-center">
                {{-- Header --}}
                <img src="{{ asset('asset/img/logo_smk.png') }}" width="90px" class="mx-auto">
                <h6 class="uppercase text-lg mt-5 mb-2">Login Akun PPDB <br> SMK Ma'arif NU Doro</h6>
                <p class="text-sm">Silahkan masuk menggunakan <br>akun yang telah didaftarkan</p>
            </div>

            <form method="POST" action="{{ route('auth-siswa.login') }}">

                @csrf
                <div class="mt-10">
                    {{-- Email --}}
                    <div class="mt-4">Email</div>
                    <div class="relative ">
                        {{-- Icon Email --}}
                        <div class="absolute pointer-events-none ">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        {{-- Input Email --}}
                        <input type="Email" name="email" placeholder="Masukan email"
                            class="border-b border-[#000842] focus:border-[#000842]  outline-none w-full mb-2 pl-5"
                            required>
                    </div>
                    {{-- Password --}}
                    <div class="mt-4">Password</div>
                    <div class="relative">
                        <div class="flex justify-between border-b border-[#000842]">
                            {{-- Icon Lock Password --}}
                            <i class="fa-solid fa-lock"></i>
                            {{-- Input Password --}}
                            <input type="password" name="password" id="password" placeholder="Masukan password"
                                class="outline-none w-full pl-2.5" required>
                            {{-- Icon Eye Slash --}}
                            <i class="fa-regular fa-eye-slash cursor-pointer" id="eye""></i>

                        </div>
                    </div>
                    <div class="mt-4">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember"
                            class="cursor-pointer">
                        <label for="remember">Ingat saya</label>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-5">
                    <button class="text-white rounded bg-[#39A170] px-20 w-full py-3">
                        Login
                    </button>
                </div>

            </form>
            <div class="mt-5 relative text-right">
                <div class="absolute">
                    <a href="{{ route('registrasi-siswa.index') }}">Registrasi</a>
                </div>
                <a href="">Lupa Password?</a>
            </div>
        </div>
    </div>
    <script type="module">
        $(document).ready(function() {
            $("#eye").click(function() {
                let input = $("#password")
                $("#eye").toggleClass("fa-eye  cursor-pointer cursor-pointer");
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
