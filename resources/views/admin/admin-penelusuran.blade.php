@extends('layouts.admin-layout')
@section('content')
    <div class=" text-2xl font-medium">Admin / Penelusuran
    </div>

    <div class="mt-10" id="prodi0validate">

        @if (session('success'))
            <div class="grid mt-6 mx-auto place-items-center">
                <div class="w-full text-d-green bg-white rounded-md">
                    <ul class="p-4">
                        <li>{{ session('success') }}
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        <div class="grid mt-6 mx-auto place-items-center">
            <div class="w-full text-white bg-d-green rounded-md mb-6">
                <ul class="p-4">
                    <li>Hasil penelusuran {{ $hasil }} </li>
                </ul>
            </div>
        </div>

        <div>
            PPDB Tahun {{ now()->year }}
        </div>
        <div class="overflow-x-auto">
            <table class="bg-white rounded-lg mt-3 table-auto text-center min-w-full">
                <thead>
                    <tr class="border-b border-d-green">
                        <th class="py-2 px-4">NIK</th>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">Prodi</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($calonSiswa as $siswa)
                        <tr class="border-b border-d-green">
                            <td class="py-2 px-4">{{ $siswa->nik }}</td>
                            <td class="py-2 px-4">{{ $siswa->nama }}</td>
                            <td class="py-2 px-4">{{ $siswa->prodi }}</td>
                            <td class="py-2 px-4 text-2xl">
                                <div class="flex justify-center items-center  gap-5">
                                    <a href="{{ route('admin-beranda-siswa-edit', ['id' => $siswa->nik]) }}">
                                        <i class="fa-solid fa-pen-to-square text-grey hover:opacity-70 cursor-pointer"></i>
                                    </a>
                                    @if ($siswa->status === 0)
                                        <form action="{{ route('admin-beranda-siswa-verifikasi', ['id' => $siswa->nik]) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="{{ $siswa->status }} ">
                                            <button type="submit">
                                                <i
                                                    class="fa-solid fa-square-check text-d-green hover:opacity-70 cursor-pointer"></i>
                                            </button>
                                        </form>
                                        <button onclick="openConfirmationModal()">
                                            <i class="fa-solid fa-trash text-red hover:opacity-70 cursor-pointer"></i>
                                        </button>
                                    @endif
                                    @if ($siswa->status === 1)
                                        <form
                                            action="{{ route('admin-beranda-siswa-unverifikasi', ['id' => $siswa->nik]) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="{{ $siswa->status }} ">
                                            <button type="submit">
                                                <i
                                                    class="fa-solid fa-square-minus text-red hover:opacity-70 cursor-pointer"></i>
                                            </button>
                                        </form>
                                    @endif

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($calonSiswa as $siswa)
        <!-- Modal Konfirmasi Delete Data -->
        <div id="confirmationModal"
            class="fixed inset-0 z-20 w-full h-full bg-black bg-opacity-50 hidden items-center justify-center">
            <div class="bg-white p-8 max-w-md rounded">
                <p class="text-lg font-bold mb-4">Konfirmasi Hapus Data</p>
                <p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus {{ $siswa->nama }}</p>
                <div class="flex justify-end">
                    <button onclick="closeConfirmationModal()"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                        Batal
                    </button>

                    <a href="{{ route('admin-beranda-siswa-delete', ['id' => $siswa->nik]) }}"
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
@endsection
