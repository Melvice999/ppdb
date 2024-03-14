@extends('layouts.headmaster-layout')
@section('content')
    <div class="w-full text-2xl font-medium">Headmaster / Cetak Formulir {{now()->year}}</div>


    <div class="mt-10">Program Keahlian</div>

    <div class="grid grid-cols-4 w-full gap-10 mt-3 max-md:grid-cols-1 max-lg:grid-cols-2">

        <a href="#" class="grid w-full bg-d-green text-white rounded-lg p-3">
            <div class="flex">
                <i class="fa-solid fa-wrench border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl"> 44
                    <div class="text-sm">
                        Teknik dan Bisnis Sepeda Motor
                    </div>
                </div>
            </div>
        </a>

        <a href="#" class="grid w-full bg-d-green text-white rounded-lg p-3">
            <div class="flex">
                <i class="fa-solid fa-cogs border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl"> 44
                    <div class="text-sm">
                        Teknik Kendaraan Ringan Otomotif
                    </div>
                </div>
            </div>
        </a>


        <a href="#" class="grid w-full bg-d-green text-white rounded-lg p-3">
            <div class="flex">
                <i class="fa-solid fa-wifi border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl"> 44
                    <div class="text-sm">
                        Teknik Komputer dan Jaringan
                    </div>
                </div>
            </div>
        </a>

        <a href="#" class="grid w-full bg-d-green text-white rounded-lg p-3">
            <div class="flex">
                <i class="fa-solid fa-laptop border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class=" text-5xl max-md:text-2xl"> 44
                    <div class="text-sm">
                        Akuntansi dan Keuangan Lembaga
                    </div>
                </div>
            </div>
        </a>
    </div>
@endsection
