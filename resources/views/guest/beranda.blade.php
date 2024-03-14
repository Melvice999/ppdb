@extends('layouts.guest-layout')
@section('content')
    {{-- header --}}
    <div class="bg-d-sky-blue max-md:h-60">

        {{-- animasi awan --}}
        <div class="awan">
            <img src="{{ asset('assets/img/awan.png') }}" alt="" style="animation: awan 20s linear infinite;">
            <img src="{{ asset('assets/img/awan.png') }}" alt="" style="animation: awan 40s linear infinite;">
            <img src="{{ asset('assets/img/awan.png') }}" alt="" style="animation: awan 28s linear infinite;">
            <img src="{{ asset('assets/img/awan.png') }}" alt="" style="animation: awan 16s linear infinite;">
        </div>

        {{-- logo --}}
        <div class="absolute top-1 uppercase flex w-screen justify-center" id="ppdb1">
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
            <div class="absolute uppercase font-aldrich top-36 mt-4 max-md:top-28" id="ppdb2">

                <div class="flex justify-center w-screen">

                    <div class="flex gap-10 max-md:block">

                        <a href="{{ route('daftar') }}"
                            class="w-48 h-10 flex justify-center items-center border rounded border-d-green bg-white cursor-pointer">
                            Daftar
                        </a>
                        <a href="{{ route('auth-siswa') }}"
                            class="w-48 h-10 flex justify-center items-center border rounded border-d-green bg-white cursor-pointer max-md:mt-4">
                            Login
                        </a>

                    </div>

                </div>

            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-16 max-md:block max-md:w-4/5 max-md:mt-6 max-md:mx-8">
        @foreach ($beranda as $item)
            <div class="bg-white rounded-md text-justify max-md:mt-6">
                <div class="p-6">
                    <div class="text-lg font-bold mb-3 no-tailwindcss-base">{{ $item->judul }}</div>
                    <hr class="text-d-green">
                    <div class="mt-3 no-tailwindcss-base">{!! $item->konten !!}</div>
                </div>
            </div>
        @endforeach
    </div>
    
@endsection()
