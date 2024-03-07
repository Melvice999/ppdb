@extends('layouts.siswa-layout')
@section('content')
    <div class="flex justify-center mt-6 mx-10 max-md:block">
        <div class="w-1/2 px-10 py-2 text-center bg-white max-md:w-full rounded-md cursor-pointer hover:border hover:border-d-green">

            <div>
                {{-- <a href="{{ route('siswa-logout') }}"> --}}
                <button>Akun</button>
                </a>
            </div>

        </div>
    </div>

    <div class="flex justify-center mt-1 mx-10 max-md:block">
        <div class="w-1/2 px-10 py-2 text-center bg-white max-md:w-full rounded-md cursor-pointer hover:border hover:border-d-green">

            <div>
                {{-- <a href="{{ route('siswa-logout') }}"> --}}
                <button>Berkas</button>
                </a>
            </div>
            
        </div>
    </div>

    <div class="flex justify-center mt-1 mx-10 max-md:block">
        <div class="w-1/2 px-10 py-2 text-center bg-white max-md:w-full rounded-md cursor-pointer hover:border hover:border-d-green">

            <div>
                <a href="{{ route('siswa-logout') }}">
                    <button>Logout</button>
                </a>
            </div>
            
        </div>
    </div>

    <div class="p-10"></div>
@endsection