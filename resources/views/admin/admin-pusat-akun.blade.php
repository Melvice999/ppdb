@extends('layouts.admin-layout')
@section('content')
    <div class="w-full text-2xl font-medium">
        Admin / Pusat Akun
    </div>

    @if (session('success'))
        <div class="grid mt-6 mx-auto place-items-center">
            <div class="w-full text-white bg-d-green rounded-md">
                <ul class="p-4">
                    <li> {{ session('success') }}</li>
                </ul>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="grid mt-6 mx-auto place-items-center">
            <div class="w-full text-white bg-red rounded-md">
                <ul class="p-4">
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('admin-pusat-akun-post') }}" method="POST">
        @csrf

        <input type="hidden" value="{{ $akun->id }}" name="id">

        <div class="flex justify-between mt-10 mb-4">
            <div class="max-md:me-6">Ubah Akun Admin</div>
            <button type="submit" class="border px-4 py-3 bg-d-green text-white rounded-xl">
                Simpan
            </button>
        </div>

        <div class="grid grid-cols-2 w-full gap-10 mt-3 max-md:grid-cols-1">

            <div class="grid w-full bg-d-green text-white rounded-lg p-3" id="toggleEmail">
                <div class="flex">
                    <i class="fa-solid fa-envelope border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                    <div class="py-2 flex w-full">
                        <div>
                            Ubah Email
                        </div>
                    </div>
                    <i class="fa-solid fa-pen-to-square border-s flex justify-center items-center w-14 text-xl"></i>

                </div>
            </div>

            <div class="grid w-full bg-d-green text-white rounded-lg p-3" id="togglePassword">
                <div class="flex">
                    <i class="fa-solid fa-lock border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                    <div class="py-2 flex w-full">
                        <div>
                            Ubah Password
                        </div>
                    </div>
                    <i class="fa-solid fa-pen-to-square border-s flex justify-center items-center w-14 text-xl"></i>

                </div>
            </div>

        </div>

        <table class="w-full mt-4">
            <tr class="hidden" id="openEmail">
                <td class="py-3">
                    <label for="wa">Email</label>
                </td>
                <td class="border-b border-d-green">
                    <div class="flex">
                        :&nbsp;
                        <input type="text" name="email" value="{{ $akun->email }}" autocomplete="off"
                            placeholder="Masukan Email" class="w-full focus:outline-none bg-l-sky-blue">
                    </div>
                </td>
            </tr>

            <tr class="hidden" id="openPassword">
                <td class="py-3">
                    <label for="ig">Password</label>
                </td>
                <td class="border-b border-d-green">
                    <div class="flex">
                        :&nbsp;
                        <input type="password" name="password" autocomplete="off" placeholder="Masukan password"
                            class="w-full focus:outline-none bg-l-sky-blue">
                    </div>

                </td>
            </tr>

            <tr class="hidden" id="openConfrmPassword">
                <td class="py-3">
                    <label for="fb">Konfirmasi Password</label>
                </td>
                <td class="border-b border-d-green">
                    <div class="flex">
                        :&nbsp;
                        <input type="password" name="password_confirmation" autocomplete="off"
                            placeholder="Masukan konfirmasi password" class="w-full focus:outline-none bg-l-sky-blue">
                    </div>
                </td>
            </tr>

        </table>

    </form>

    <div class="mt-2 hidden items-center " id="toggleShowPassword">

            <i class="fa-solid fa-toggle-off text-d-green text-3xl me-2"></i>

            Lihat Password

    </div>

    <script type="module">
        $(document).ready(function() {
            $("#toggleEmail").on("click", function() {
                $("#openEmail").toggleClass("hidden");
                $("#openPassword").addClass("hidden");
                $("#openConfrmPassword").addClass("hidden");
                $("#toggleShowPassword").addClass("hidden");
            });

            $("#togglePassword").on("click", function() {
                $("#openEmail").addClass("hidden");
                $("#openPassword").toggleClass("hidden");
                $("#openConfrmPassword").toggleClass("hidden");
                $("#toggleShowPassword").toggleClass("hidden");

            });
            $("#toggleShowPassword i").on("click", function() {
                // Toggle the class on the icon
                $(this).toggleClass("fa-toggle-off fa-toggle-on");

                // Toggle the password input type
                if ($(this).hasClass("fa-toggle-on")) {
                    $("#openPassword input").attr("type", "text");
                    $("#openConfrmPassword input").attr("type", "text");
                } else {
                    $("#openPassword input").attr("type", "password");
                    $("#openConfrmPassword input").attr("type", "password");
                }
            });
        });
    </script>

@endsection()
