@extends('layouts.headmaster-layout')
@section('content')
    <div class=" text-2xl font-medium">Headmaster / Penelusuran
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

        <div class="overflow-x-auto">
            <table class="bg-white rounded-lg mt-3 table-auto text-center min-w-full">
                <thead>
                    <tr class="border-b border-d-green">
                        <th>No</th>
                        <th class="py-2 px-4">No Pendaftaran</th>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">Prodi</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($calonSiswa as $i => $siswa)
                        <tr class="border-b border-d-green">
                            <td>{{ $i + 1 }}</td>
                            <td class="py-2 px-4">{{ $siswa->no_pendaftaran }}</td>
                            <td class="py-2 px-4">{{ $siswa->nama }}</td>
                            <td class="py-2 px-4">{{ $siswa->prodi }}</td>
                            <td class="py-2 px-4 text-2xl">
                                <div class="flex justify-center items-center  gap-5">
                                    <form action="{{ route('headmaster-cetak-formulir-siswa', ['id' => $siswa->nik]) }}"
                                        method="GET">
                                        @csrf
                                        <button type="submit">
                                            <input type="hidden" name="id" value=" {{ $siswa->nik }}">
                                            <i class="fa-solid fa-print text-d-green text-2xl"></i>
                                        </button>
                                    </form>
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
