@extends('layouts.layout')
@section('content')
{{-- header --}}
<div class="overflow-hidden">

    <div class="bg-d-sky-blue max-md:h-64">
        {{-- animasi awan --}}
        <div class="awan">
            <img src="{{ asset('asset/img/awan.png') }}" alt="" style="animation: awan 20s linear infinite;">
            <img src="{{ asset('asset/img/awan.png') }}" alt="" style="animation: awan 40s linear infinite;">
            <img src="{{ asset('asset/img/awan.png') }}" alt="" style="animation: awan 28s linear infinite;">
            <img src="{{ asset('asset/img/awan.png') }}" alt="" style="animation: awan 16s linear infinite;">
        </div>

        {{-- logo --}}
        <div class="absolute top-16 uppercase sm:left-10 md:left-36 lg:left-56 xl:left-80 2xl:left-96">
            <div class="flex">
                <div class="m-5 max-md:hidden">
                    <img src="{{ asset('asset/img/logo_smk.png') }}" alt="" width="100">
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
            <div class="absolute top-52 sm:left-20 md:left-28 max-md:top-44 lg:left-48 xl:left-64 2xl:left-96">
                <div class="flex ml-20 sm:gap-10 lg:gap-36 max-md:block">
                    <a href="daftar"
                        class="px-16 py-3 border-2 rounded border-d-green bg-white cursor-pointer max-md:block">
                        Daftar
                    </a>
                    <a href=""
                        class="px-16 py-3 border-2 rounded border-d-green bg-white cursor-pointer max-md:mt-4 max-md:block">
                        Masuk
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex mt-16 ml-10 mr-10 gap-9 text-center max-md:block max-md:mt-6">
    <div class="w-1/2 bg-white p-10 max-md:w-full max-md:p-10 rounded-md">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Est consequatur amet quidem ducimus deserunt minus quaerat molestiae architecto reprehenderit cum dolore possimus ipsa, quae soluta ut, labore maiores odio itaque! Hic, corrupti excepturi sapiente dolor inventore dicta tempore beatae velit?
    </div>
    <div class="w-1/2 bg-white p-10 max-md:w-full max-md:p-10 rounded-md max-md:mt-6">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati officia iste accusamus ipsum? Accusamus mollitia explicabo magni ratione dolor iste delectus ad inventore fugit quod. Aliquam dolorum quasi ea beatae, iure nihil unde sit molestiae doloribus deserunt ipsum eos quos dicta distinctio! Beatae assumenda maxime soluta obcaecati asperiores at aliquam architecto iure praesentium eum saepe ullam, ducimus fugiat. Quaerat, nulla!
    </div>
</div>
<div class="flex mt-8 ml-10 mr-10 gap-9 text-center max-md:block max-md:mt-6">
    <div class="w-1/2 bg-white p-10 max-md:w-full max-md:p-10 rounded-md">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Est consequatur amet quidem ducimus deserunt minus quaerat molestiae architecto reprehenderit cum dolore possimus ipsa, quae soluta ut, labore maiores odio itaque! Hic, corrupti excepturi sapiente dolor inventore dicta tempore beatae velit?
    </div>
    <div class="w-1/2 bg-white p-10 max-md:w-full max-md:p-10 rounded-md max-md:mt-6">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati officia iste accusamus ipsum? Accusamus mollitia explicabo magni ratione dolor iste delectus ad inventore fugit quod. Aliquam dolorum quasi ea beatae, iure nihil unde sit molestiae doloribus deserunt ipsum eos quos dicta distinctio! Beatae assumenda maxime soluta obcaecati asperiores at aliquam architecto iure praesentium eum saepe ullam, ducimus fugiat. Quaerat, nulla!
    </div>
</div>
@endsection()
 