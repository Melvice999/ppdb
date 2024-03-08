<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_smk.png') }}" type="image/x-icon">

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
            @if ($errors->any())
                <ul class=" p-3 text-sm bg-red text-white rounded">
                    @foreach ($errors->all() as $error)
                        <li class="list-disc list-inside">{{ $error }}</li>
                    @endforeach
                </ul>
                <br>
            @endif
            <div class="text-center">
                {{-- Header --}}
                <img src="{{ asset('assets/img/logo_smk.png') }}" width="90px" class="mx-auto">
                <h6 class="uppercase text-lg mt-5 mb-2">Registrasi Akun PPDB <br> SMK Ma'arif NU Doro</h6>
            </div>

            <form action="{{ route('registrasi-akun.create') }}" method="POST">
                @csrf
                {{-- NIK --}}
                <div class="mt-4">NIK</div>
                <div class="relative ">
                    {{-- Icon NIK --}}
                    <div class="absolute">
                        <i class="fa-solid fa-user text-d-green"></i>
                    </div>
                    {{-- Input NIK --}}
                    <input type="number" name="nik" value="{{ old('nik') }}"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="16" placeholder="Masukan NIK"
                        class="border-b border-[#000842] focus:border-[#000842]  outline-none w-full pl-5" required>
                </div>
                {{-- Email --}}
                <div class="mt-4">Email</div>
                <div class="relative ">
                    {{-- Icon Email --}}
                    <div class="absolute">
                        <i class="fa-solid fa-envelope text-d-green"></i>
                    </div>
                    {{-- Input Email --}}
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukan Email"
                        class="border-b border-[#000842] focus:border-[#000842]  outline-none w-full pl-5" required>
                </div>
                {{-- Password --}}
                <div class="mt-4 mb-0.5">Password</div>
                <div class="relative">
                    <div class="absolute">
                        {{-- Icon Lock Password --}}
                        <i class="fa-solid fa-lock text-d-green"></i>
                    </div>
                    {{-- Input Password --}}
                    <input type="password" name="password" id="password" value="{{ old('password') }}"
                        placeholder="Masukan password" autocomplete="off"
                        class="border-b border-[#000842] focus:border-[#000842]  outline-none w-full pl-5" required>
                </div>
                {{-- Konfirmasi Password --}}
                <div class="mt-4 mb-0.5">Konfirmasi Password</div>
                <div class="relative">
                    <div class="absolute">
                        {{-- Icon Lock Password --}}
                        <i class="fa-solid fa-lock text-d-green"></i>
                    </div>
                    {{-- Input Password --}}
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        value="{{ old('password_confirmation') }}" placeholder="Konfirmasi password" autocomplete="off"
                        class="border-b border-[#000842] focus:border-[#000842]  outline-none w-full pl-5" required>
                    <div class="mt-4">
                        <input type="checkbox" id="tampilkanPW" class="cursor-pointer">
                        <label for="remember">Tampilkan Password</label>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-5">
                    <button class="text-white rounded bg-[#39A170] px-20 w-full py-3">
                        Registrasi
                    </button>
                </div>
            </form>
        </div>


        <script type="module">
            $(document).ready(function() {
                $("#tampilkanPW").click(function() {
                    let input = $("#password, #password_confirmation")
                    $("#tampilkanPW").toggleClass();
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
