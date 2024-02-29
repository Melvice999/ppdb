@extends('layouts.guest-layout')
@section('content')
    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="grid mt-6 ml-10 mr-10 mx-auto place-items-center">
            <div class="w-1/2 text-white bg-d-green rounded-md max-md:w-full mt-6">
                <ul class="p-7">
                    <li> {{ session('success') }} </li>
                </ul>
            </div>
        </div>
    @endif
    <div class="grid mt-6 ml-10 mr-10 place-items-center">


        <div class="w-1/2 px-10 bg-white max-md:w-full max-md:px-10 rounded-md text-justify max-md:mt-7">
            <div class="text-lg font-bold text-center py-3">
                {{ $informasi->j_informasi }}
            </div>
            <hr class="text-d-green">

            <div class="pt-3">
                {!! $informasi->informasi !!}
                <br><br>
            </div>
        </div>
    </div>
@endsection()
