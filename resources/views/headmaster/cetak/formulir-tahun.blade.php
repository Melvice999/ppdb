@extends('layouts.headmaster-layout')
@section('content')
    <div class="w-full text-2xl font-medium">Headmaster / Cetak Formulir</div>


    <div class="mt-10">Cetak Formulir Berdasarkan Tahun</div>

    <div class="grid grid-cols-4 w-full gap-10 mt-3 max-md:grid-cols-1 max-lg:grid-cols-2">

        <a href="#" class="flex justify-center w-full bg-d-green text-white rounded-lg p-3">
            <div class="flex">
            
                <div class=" text-5xl max-md:text-2xl"> 2019
                </div>
            </div>
        </a>

        <a href="#" class="flex justify-center w-full bg-d-green text-white rounded-lg p-3">
            <div class="flex">
            
                <div class=" text-5xl max-md:text-2xl"> 2020
                </div>
            </div>
        </a>


        <a href="#" class="flex justify-center w-full bg-d-green text-white rounded-lg p-3">
            <div class="flex">
             
                <div class=" text-5xl max-md:text-2xl"> 2021
                </div>
            </div>
        </a>

        <a href="#" class="flex justify-center w-full bg-d-green text-white rounded-lg p-3">
            <div class="flex">
                
                <div class=" text-5xl max-md:text-2xl"> 2022
                </div>
            </div>
        </a>
    </div>
@endsection
