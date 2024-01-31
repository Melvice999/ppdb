@extends('layouts.admin-layout')
@section('content')
    <div class="w-full text-2xl font-medium">
        Admin / Gelombang</div>

    <div class="flex justify-between mt-10 mb-4">
        <div class="max-md:me-6">Gelombang PPDB Tahun {{ now()->year }}</div>
        <div class=" text-d-green text-4xl"> <i class="fa-solid fa-square-plus"></i> </div>
    </div>

    <div class="overflow-x-auto">
        <table class="table-auto min-w-full bg-white border border-d-green">
            <thead>
                <tr class="bg-d-green text-white">
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-4 py-2">
                        Beranda
                    </td>
                    <td>
                        <div class="flex justify-center">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <i class="fa-solid fa-square-plus"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">
                        Pendaftaran
                    </td>
                    <div class="flex justify-center">
                        <td>on off</td>
                    </div>
                </tr>
                <tr>
                    <td class="border px-4 py-2">
                        Hasil Seleksi
                    </td>
                    <td>on off</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">
                        Informasi
                    </td>
                    <td>on off
                        <i class="fa-solid fa-pen-to-square"></i>

                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">
                        Kontak
                    </td>
                    <td>
                        <i class="fa-solid fa-pen-to-square"></i>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection()
