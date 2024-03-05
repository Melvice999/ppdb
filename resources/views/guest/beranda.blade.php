@extends('layouts.guest-layout')
@section('content')
    {{-- header --}}
    <div class="bg-d-sky-blue max-md:h-64">
        {{-- animasi awan --}}
        <div class="awan">
            <img src="{{ asset('assets/img/awan.png') }}" alt="" style="animation: awan 20s linear infinite;">
            <img src="{{ asset('assets/img/awan.png') }}" alt="" style="animation: awan 40s linear infinite;">
            <img src="{{ asset('assets/img/awan.png') }}" alt="" style="animation: awan 28s linear infinite;">
            <img src="{{ asset('assets/img/awan.png') }}" alt="" style="animation: awan 16s linear infinite;">
        </div>

        {{-- logo --}}
        <div class="absolute top-1 uppercase sm:left-10 md:left-36 lg:left-56 xl:left-80 xl:ml-40 2xl:left-96"
            id="ppdb1">
            <div class="flex">
                <div class="m-5 max-md:hidden">
                    <img src="{{ asset('assets/img/logo_smk.png') }}" alt="" width="100">
                </div>
                <div
                    class="font-aldrich my-auto tracking-widest text-xl font-bold text-d-green max-md:text-lg max-md:mt-5 max-md:ml-5">
                    Penerimaan Peserta Didik Baru <br>
                    SMK Ma’arif NU Doro
                </div>
            </div>
        </div>

        {{-- tombol daftar dan masuk --}}
        <div class="border-d-green text-d-green">
            <div class="absolute top-36 sm:left-20 md:left-28 max-md:top-28 lg:left-48 xl:left-64 xl:ml-40 2xl:left-96"
                id="ppdb2">
                <div class="flex ml-20 sm:gap-10 lg:gap-36 max-md:block">
                    <a href="{{ route('daftar') }}"
                        class="px-16 py-3 border-2 rounded border-d-green bg-white cursor-pointer max-md:block">
                        Daftar
                    </a>
                    <a href="{{ route('auth-siswa') }}"
                        class="px-16 py-3 border-2 rounded border-d-green bg-white cursor-pointer max-md:mt-4 max-md:block">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="flex mt-16 ml-10 mr-10 gap-9 text-center max-md:block max-md:mt-6">

        @foreach ($beranda as $item)
            <div class="w-1/2 px-10 bg-white max-md:w-full max-md:px-10 rounded-md text-justify max-md:mt-7">
                <div class="text-lg font-bold py-3 no-tailwindcss-base">
                    {{ $item->judul }}
                </div>
                <hr class="text-d-green">

                <div class="pt-3 no-tailwindcss-base">
                    {!! $item->konten !!}
                    <br><br>
                </div>
            </div>
        @endforeach

    </div>
@endsection()
