@extends('layouts.admin-layout')
@section('content')
    <div class="w-full text-2xl font-medium">
        Admin / Pengaturan</div>

    <div class="flex justify-between mt-10 mb-4">
        <div class="max-md:me-6">Pengaturan PPDB Tahun {{ now()->year }}</div>
    </div>
    <div class="overflow-x-auto">
        <table class="table-auto min-w-full bg-white border border-d-green">
            <thead>
                <tr class="bg-d-green text-white text-left">
                    <th class="py-3 px-4">Nama</th>
                    <th class="py-3 px-11">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengaturan as $item)
                    <tr class="border-b border-d-green">
                        <td class="px-4 py-2">
                            Beranda
                        </td>
                        <td>
                            <a href="{{ route('admin-pengaturan-beranda') }}" class="flex items-center">
                                <i
                                    class="fa-solid fa-pen-to-square border rounded-lg bg-d-green text-white py-2 px-2 ms-10"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="border-b border-d-green">
                        <td class="px-4 py-2">
                            Informasi
                        </td>
                        <td>
                            <a href="{{ route('admin-pengaturan-informasi') }}" class="flex items-center">

                                <i
                                    class="fa-solid fa-pen-to-square border rounded-lg bg-d-green text-white py-2 px-2 ms-10"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="border-b border-d-green">
                        <td class="px-4 py-2">
                            Kontak
                        </td>
                        <td>
                            <a href="{{ route('admin-pengaturan-kontak') }}" class="flex items-center">
                                <i
                                    class="fa-solid fa-pen-to-square border rounded-lg bg-d-green text-white py-2 px-2 ms-10"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="border-b border-d-green">
                        <td class="px-4 py-2">
                            Pendaftaran
                        </td>
                        <td>
                            @if ($item->pendaftaran == 0)
                                <form action="{{ route('admin-pengaturan-update', ['id' => $item->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="update_column" value="pendaftaran">
                                    <button type="submit" class="flex items-center">
                                        <div class="bg-d-green text-white py-1 pl-4 pr-2 rounded-xl ms-3">
                                            <span> on </span>
                                            <span class="bg-white text-d-green px-3 ms-3 rounded-xl">
                                                off
                                            </span>
                                        </div>
                                    </button>
                                </form>
                            @endif
                            @if ($item->pendaftaran == 1)
                                <form action="{{ route('admin-pengaturan-update', ['id' => $item->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="update_column" value="pendaftaran">
                                    <button type="submit" class="flex items-center">
                                        <div class="bg-d-green text-white py-1 pl-2 pr-4 rounded-xl ms-3">
                                            <span class="bg-white text-d-green px-3 me-3 rounded-xl"> on </span>
                                            <span>
                                                off
                                            </span>
                                        </div>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    <tr class="border-b border-d-green">
                        <td class="px-4 py-2">
                            Hasil Seleksi
                        </td>
                        <td>
                            @if ($item->hasil_seleksi == 0)
                                <form action="{{ route('admin-pengaturan-update', ['id' => $item->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="update_column" value="hasil_seleksi">
                                    <button type="submit" class="flex items-center">
                                        <div class="bg-d-green text-white py-1 pl-4 pr-2 rounded-xl ms-3">
                                            <span> on </span>
                                            <span class="bg-white text-d-green px-3 ms-3 rounded-xl">
                                                off
                                            </span>
                                        </div>
                                    </button>
                                </form>
                            @endif
                            @if ($item->hasil_seleksi == 1)
                                <form action="{{ route('admin-pengaturan-update', ['id' => $item->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="update_column" value="hasil_seleksi">
                                    <button type="submit" class="flex items-center">
                                        <div class="bg-d-green text-white py-1 pl-2 pr-4 rounded-xl ms-3">
                                            <span class="bg-white text-d-green px-3 me-3 rounded-xl"> on </span>
                                            <span>
                                                off
                                            </span>
                                        </div>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection()
