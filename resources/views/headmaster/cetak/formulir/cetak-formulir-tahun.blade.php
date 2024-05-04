@extends('layouts.headmaster-layout')
@section('content')
    <div class="w-full text-2xl font-medium">Headmaster / Cetak Formulir {{ $tahun }}</div>

    <div class="mt-10">Program Keahlian</div>

    <div class="grid grid-cols-4 w-full gap-10 mt-3 max-md:grid-cols-1 max-lg:grid-cols-2">

        <a href="#tbsm" class="grid w-full bg-d-green text-white rounded-lg p-3" id="toggleTbsm">
            <div class="flex">
                <i class="fa-solid fa-wrench border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class="text-5xl max-md:text-2xl max-md:flex"> {{ $ctbsm }}
                    <div class="text-sm max-md:hidden">
                        Teknik dan Bisnis Sepeda Motor
                    </div>
                    <div class=" md:hidden">
                        &nbsp;TBSM
                    </div>
                </div>
            </div>
        </a>

        <a href="#tkro" class="grid w-full bg-d-green text-white rounded-lg p-3" id="toggleTkro">
            <div class="flex">
                <i class="fa-solid fa-cogs border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class="text-5xl max-md:text-2xl max-md:flex"> {{ $ctkro }}
                    <div class="text-sm max-md:hidden">
                        Teknik Kendaraan Ringan Otomotif
                    </div>
                    <div class=" md:hidden">
                        &nbsp;TKRO
                    </div>
                </div>
            </div>
        </a>


        <a href="#tkj" class="grid w-full bg-d-green text-white rounded-lg p-3" id="toggleTkj">
            <div class="flex">
                <i class="fa-solid fa-wifi border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class="text-5xl max-md:text-2xl max-md:flex"> {{ $ctkj }}
                    <div class="text-sm max-md:hidden">
                        Teknik Komputer dan Jaringan
                    </div>
                    <div class=" md:hidden">
                        &nbsp;TKJ
                    </div>
                </div>
            </div>
        </a>

        <a href="#akl" class="grid w-full bg-d-green text-white rounded-lg p-3" id="toggleAkl">
            <div class="flex">
                <i class="fa-solid fa-laptop border-e me-4 flex justify-center items-center w-14 text-xl"></i>
                <div class="text-5xl max-md:text-2xl max-md:flex"> {{ $cakl }}
                    <div class="text-sm max-md:hidden">
                        Akuntansi dan Keuangan Lembaga
                    </div>
                    <div class=" md:hidden">
                        &nbsp;AKL
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="hidden mt-10" id="tkj">
        <div class="mb-3">
            Teknik Komputer dan Jaringan
        </div>
        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-grey">
                <thead class="bg-white divide-y divide-grey">
                    <td class="p-2 text-left">
                        Nama
                    </td>
                    <td class="p-2 text-left">
                        No Pendaftaran
                    </td>
                    <td class="p-2 text-left">
                        Aksi
                    </td>
                </thead>

                @foreach ($tkj as $item)

                        <tbody>
                            <td class="px-2 whitespace-nowrap">
                                {{ $item->nama }}
                            </td>
                            <td class="px-2 whitespace-nowrap">
                                {{ $item->no_pendaftaran }}
                            </td>
                            <td class="px-2 whitespace-nowrap">

                                <form action="{{ route('headmaster-cetak-formulir-siswa', ['id' => $item->nik]) }}"
                                    method="GET">
                                    @csrf
                                    <button type="submit">
                                        <input type="hidden" name="id" value=" {{ $item->nik }}">
                                        <i class="fa-solid fa-print text-d-green text-2xl"></i>
                                    </button>
                                </form>
                            </td>
                        </tbody>

                @endforeach

            </table>
        </div>
    </div>


    <div class="hidden mt-10" id="akl">
        <div class="mb-3">
            Akuntansi dan Keuangan Lembaga
        </div>
        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-grey">
                <thead class="bg-white divide-y divide-grey">
                    <td class="p-2 text-left">
                        Nama
                    </td>
                    <td class="p-2 text-left">
                        No Pendaftaran
                    </td>
                    <td class="p-2 text-left">
                        Aksi
                    </td>
                </thead>

                @foreach ($akl as $item)
          
                        <tbody>
                            <td class="px-2 whitespace-nowrap">
                                {{ $item->nama }}
                            </td>
                            <td class="px-2 whitespace-nowrap">
                                {{ $item->no_pendaftaran }}
                            </td>
                            <td class="px-2 whitespace-nowrap">

                                <form action="{{ route('headmaster-cetak-formulir-siswa', ['id' => $item->nik]) }}"
                                    method="GET">
                                    @csrf
                                    <button type="submit">
                                        <input type="hidden" name="id" value=" {{ $item->nik }}">
                                        <i class="fa-solid fa-print text-d-green text-2xl"></i>
                                    </button>
                                </form>
                            </td>
                        </tbody>
 
                @endforeach

            </table>
        </div>
    </div>

    <div class="hidden mt-10" id="tbsm">
        <div class="mb-3">
            Teknik dan Bisnis Sepeda Motor
        </div>
        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-grey">
                <thead class="bg-white divide-y divide-grey">
                    <td class="p-2 text-left">
                        Nama
                    </td>
                    <td class="p-2 text-left">
                        No Pendaftaran
                    </td>
                    <td class="p-2 text-left">
                        Aksi
                    </td>
                </thead>

                @foreach ($tbsm as $item)
             
                        <tbody>
                            <td class="px-2 whitespace-nowrap">
                                {{ $item->nama }}
                            </td>
                            <td class="px-2 whitespace-nowrap">
                                {{ $item->no_pendaftaran }}
                            </td>
                            <td class="px-2 whitespace-nowrap">
                                <form action="{{ route('headmaster-cetak-formulir-siswa', ['id' => $item->nik]) }}"
                                    method="GET">
                                    @csrf
                                    <button type="submit">
                                        <input type="hidden" name="id" value=" {{ $item->nik }}">
                                        <i class="fa-solid fa-print text-d-green text-2xl"></i>
                                    </button>
                                </form>

                            </td>
                        </tbody>

                @endforeach

            </table>
        </div>
    </div>

    <div class="hidden mt-10" id="tkro">
        <div class="mb-3">
            Teknik Kendaraan Ringan Otomotif
        </div>
        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-grey">
                <thead class="bg-white divide-y divide-grey">
                    <td class="p-2 text-left">
                        Nama
                    </td>
                    <td class="p-2 text-left">
                        No Pendaftaran
                    </td>
                    <td class="p-2 text-left">
                        Aksi
                    </td>
                </thead>

                @foreach ($tkro as $item)
            
                        <tbody>
                            <td class="px-2 whitespace-nowrap">
                                {{ $item->nama }}
                            </td>
                            <td class="px-2 whitespace-nowrap">
                                {{ $item->no_pendaftaran }}
                            </td>
                            <td class="px-2 whitespace-nowrap">
                                <form action="{{ route('headmaster-cetak-formulir-siswa', ['id' => $item->nik]) }}"
                                    method="GET">
                                    @csrf
                                    <button type="submit">
                                        <input type="hidden" name="id" value=" {{ $item->nik }}">
                                        <i class="fa-solid fa-print text-d-green text-2xl"></i>
                                    </button>
                                </form>
                            </td>
                        </tbody>
        
                @endforeach

            </table>
        </div>
    </div>


    <script type="module">
        $(document).ready(function() {
            $("#toggleTkj").on("click", function() {
                $("#tkj").toggleClass("hidden");
                $("#tbsm, #akl, #tkro").addClass("hidden");
            });

            $("#toggleTbsm").on("click", function() {
                $("#tbsm").toggleClass("hidden");
                $("#tkj, #akl, #tkro").addClass("hidden");
            });

            $("#toggleTkro").on("click", function() {
                $("#tkro").toggleClass("hidden");
                $("#tkj, #tbsm, #akl").addClass("hidden");
            });

            $("#toggleAkl").on("click", function() {
                $("#akl").toggleClass("hidden");
                $("#tkj, #tbsm, #tkro").addClass("hidden");
            });
        });
    </script>
@endsection
