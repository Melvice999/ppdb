@extends('layouts.siswa-layout')
@section('content')
    <a href="{{ route('siswa-pengaturan-akun') }}">
        <div class="flex justify-center mt-6 mx-10 max-md:block">
            <div
                class="w-1/2 px-10 py-2 text-center bg-white max-md:w-full rounded-md cursor-pointer hover:border hover:border-d-green">

                <div>
                    <button>Akun</button>
                </div>

            </div>
        </div>
    </a>

    <a href="{{ route($berkas && $berkas->akta ? 'siswa-update-berkas' : 'siswa-upload-berkas') }}">
        <div class="flex justify-center mt-1 mx-10 max-md:block">
            <div
                class="w-1/2 px-10 py-2 text-center bg-white max-md:w-full rounded-md cursor-pointer hover:border hover:border-d-green">

                <div>
                    <button>Berkas</button>
                </div>

            </div>
        </div>
    </a>

    <a href="{{ route('siswa-logout') }}">
        <div class="flex justify-center mt-1 mx-10 max-md:block">
            <div
                class="w-1/2 px-10 py-2 text-center bg-white max-md:w-full rounded-md cursor-pointer hover:border hover:border-d-green">

                <div>
                    <button>Logout</button>
                </div>

            </div>
        </div>
    </a>

    <div class="p-10"></div>
@endsection
