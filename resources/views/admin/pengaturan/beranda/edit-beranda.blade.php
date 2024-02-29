@extends('layouts.admin-layout')
@section('content')
    <div class="w-full text-2xl font-medium">
        Admin / Pengaturan / Beranda</div>

    <div class="flex justify-between mt-10 mb-4">
        <div class="max-md:me-6">Edit Pengaturan Beranda PPDB Tahun {{ now()->year }}</div>
        <a href="{{ route('admin-pengaturan-tambah-beranda') }}" class="border px-4 py-3 bg-d-green text-white rounded-xl flex items-center justify-center">
            <i class="fa-solid fa-plus"></i>
        </a>
    </div>
    @if (session('success'))
        <div class="grid mt-6 mx-auto place-items-center">
            <div class="w-full text-white bg-d-green rounded-md mb-6">
                <ul class="p-4">
                    <li> {{ session('success') }}</li>
                </ul>
            </div>
        </div>
    @endif
    <div class="overflow-x-auto">
        <table class="table-auto min-w-full bg-white border-d-green">
            <thead>
                <tr class="bg-d-green text-white text-left">
                    <th class="py-3 px-4">Judul</th>
                    <th class="py-3 px-4 flex justify-end me-52 max-md:me-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beranda as $item)
                    <tr class="border-b border-b-d-green">

                        <td class="py-3 px-4">{{ $item->judul }}</td>
                        <td class="py-3 px-4 flex justify-end me-12 max-md:me-0">
                            @if ($item->status == 0)
                                <div class="flex">
                                    <form action="{{ route('admin-pengaturan-update', ['id' => $item->id]) }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="update_column" value="status">
                                        <button type="submit" class="flex items-center">
                                            <div class="bg-d-green text-white py-1 pl-4 pr-1 rounded-xl flex">
                                                <span> on </span>
                                                <span class="bg-white text-d-green px-3 ms-3 rounded-xl">
                                                    off
                                                </span>
                                            </div>
                                        </button>
                                    </form>
                                    <a href="{{ route('admin-pengaturan-update-beranda', ['id' => $item->id]) }}">
                                        <i
                                            class="fa-solid fa-pen-to-square border rounded-lg bg-d-green text-white py-2 px-2 ms-3"></i>
                                    </a>
                                    <a href="">
                                        <i
                                            class="fa-solid fa-trash border rounded-lg bg-d-green text-white py-2 px-2 ms-3"></i>
                                    </a>
                                </div>
                            @endif
                            @if ($item->status == 1)
                                <div class="flex">
                                    <form action="{{ route('admin-pengaturan-update', ['id' => $item->id]) }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="update_column" value="status">
                                        <button type="submit" class="flex items-center">
                                            <div class="bg-d-green text-white py-1 pl-1 pr-4 rounded-xl flex">
                                                <span class="bg-white text-d-green px-3 me-3 rounded-xl"> on </span>
                                                <span>
                                                    off
                                                </span>
                                            </div>
                                        </button>
                                    </form>
                                    <a href="{{ route('admin-pengaturan-update-beranda', ['id' => $item->id]) }}">
                                        <i
                                            class="fa-solid fa-pen-to-square border rounded-lg bg-d-green text-white py-2 px-2 ms-3"></i>
                                    </a>
                                    <a href="">
                                        <i
                                            class="fa-solid fa-trash border rounded-lg bg-d-green text-white py-2 px-2 ms-3"></i>
                                    </a>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection()
