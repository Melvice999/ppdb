@extends('layouts.admin-layout')
@section('content')
    <div class=" text-2xl font-medium">
        <a href="{{ route('admin-beranda') }}">Admin</a> / Penelusuran
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

        @if (session('error'))
            <div class="grid mt-6 mx-auto place-items-center">
                <div class="w-full text-red bg-white rounded-md">
                    <ul class="p-4">
                        <li>{{ session('error') }}
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
                        <th>No</th>
                        <th class="py-2 px-4">NIK</th>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">Prodi</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($calonSiswa as $i => $siswa)
                        <tr class="border-b border-d-green">
                            <td>{{ $i + 1 }}</td>
                            <td class="py-2 px-4">{{ $siswa->nik }}</td>
                            <td class="py-2 px-4">{{ $siswa->nama }}</td>
                            <td class="py-2 px-4">{{ $siswa->detailCalonSiswa->prodi }}</td>
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
                                        <button class="hapus-btn"
                                            data-url="{{ route('admin-beranda-siswa-delete', ['id' => $siswa->nik]) }}"
                                            data-nama="{{ $siswa->nama }}">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hapusBtns = document.querySelectorAll('.hapus-btn');
            hapusBtns.forEach(function(btn) {
                btn.addEventListener('click', function(event) {
                    event.preventDefault();

                    // Ambil nama siswa dari atribut data
                    const nama = btn.getAttribute('data-nama');

                    // Tampilkan pesan konfirmasi dengan nama siswa
                    if (confirm('Apakah Anda yakin ingin menghapus data ' + nama + '?')) {
                        // Arahkan pengguna ke tautan hapus
                        const url = btn.getAttribute('data-url');
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
@endsection
