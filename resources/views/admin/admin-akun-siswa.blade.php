@extends('layouts.admin-layout')
@section('content')
    <div class="w-full text-2xl font-medium">
        Admin / Akun Siswa</div>

    <div class="flex justify-between mt-10 mb-4">
        <div class="max-md:me-6">Gelombang PPDB Tahun {{ now()->year }}</div>
        <div class=" text-d-green text-4xl"> Diterima </div>
    </div>

    <div class="overflow-x-auto">
        <table class="table-auto min-w-full bg-white border border-d-green">
            <thead>
                <tr class="bg-d-green text-white">
                    <th class="px-4 py-2">NIK</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Username</th>
                    <th class="px-4 py-2">Password</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calonSiswa as $item)
                    <tr>
                        <td class="border px-4 py-2">
                            {{ $item->nik }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ $item->nama }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    @foreach ($calonSiswa as $item)
                    @endforeach
                    {{-- <td class="border px-4 py-2">
                        <div class="flex justify-center items-center">
                            <div class="flex rounded-lg">
                                @foreach ($calonSiswa as $item)
                                    <form method="POST"
                                        action="{{ route('admin-gelombang-update', ['id' => $item->id]) }}">
                                        @csrf
                                        @if ($item->status == 0)
                                            <button type="submit" class="flex rounded-md border">
                                                <div class="px-5">
                                                    On
                                                </div>
                                                <div class="px-5 bg-d-green text-white">
                                                    Off
                                                </div>
                                            </button>
                                        @endif
                                        @if ($item->status == 1)
                                            <button type="submit" class="flex rounded-md border">
                                                <div class="px-5  bg-d-green text-white">
                                                    On
                                                </div>
                                                <div class="px-5">
                                                    Off
                                                </div>
                                            </button>
                                        @endif
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </td> --}}
                </tr>
            </tbody>
        </table>
    </div>
@endsection()
