@extends('layouts.admin-layout')
@section('content')
    <div class="w-full text-2xl font-medium">
        <a href="{{ route('admin-beranda') }}">Admin</a> / <a href="{{ route('admin-pengaturan') }}">Pengaturan</a> / Beranda</div>

    <div class="flex justify-between mt-10 mb-4">
        <div class="max-md:me-6">Edit Pengaturan Beranda PPDB Tahun {{ now()->year }}</div>
        <a href="{{ route('admin-pengaturan-tambah-beranda') }}"
            class="border px-4 py-3 bg-d-green text-white rounded-xl flex items-center justify-center">
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
                                    <form
                                        action="{{ route('admin-pengaturan-update-status-false-beranda', ['id' => $item->id]) }}"
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
                                    <button onclick="openConfirmationModal()">
                                        <i class="fa-solid fa-trash border rounded-lg bg-red text-white py-2 px-2 ms-3"></i>
                                    </button>
                                    </a>
                                </div>
                            @endif
                            @if ($item->status == 1)
                                <div class="flex">
                                    <form
                                        action="{{ route('admin-pengaturan-update-status-true-beranda', ['id' => $item->id]) }}"
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
                                    <button onclick="openConfirmationModal()">
                                        <i class="fa-solid fa-trash border rounded-lg bg-red text-white py-2 px-2 ms-3"></i>
                                    </button>
                                    </a>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach ($beranda as $item)
        <!-- Modal Konfirmasi Delete Data -->
        <div id="confirmationModal"
            class="fixed inset-0 w-full h-full bg-black bg-opacity-50 hidden items-center justify-center">
            <div class="bg-white p-8 max-w-md rounded">
                <p class="text-lg font-bold mb-4">Konfirmasi Hapus Data</p>
                <p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus {{ $item->judul }}?</p>
                <div class="flex justify-end">
                    <button onclick="closeConfirmationModal()"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                        Batal
                    </button>

                    <a href="{{ route('admin-pengaturan-hapus-beranda', ['id' => $item->id]) }}"
                        class="bg-red hover:bg-red text-white font-bold py-2 px-4 rounded">
                        Hapus
                    </a>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function openConfirmationModal() {
            document.getElementById('confirmationModal').style.display = 'flex';
        }

        function closeConfirmationModal() {
            document.getElementById('confirmationModal').style.display = 'none';
        }
    </script>
    <!-- End Modal Konfirmasi Delete Data -->
@endsection()
