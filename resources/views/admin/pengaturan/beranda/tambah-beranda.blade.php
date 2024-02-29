@extends('layouts.admin-layout')
@section('content')
    <div class="w-full text-2xl font-medium">
        Admin / Pengaturan / Beranda
    </div>

    <form action="{{ route('admin-pengaturan-create-beranda') }}" method="POST">
        @csrf
        <div class="flex justify-between mt-10 mb-4">
            <div class="max-md:me-6">Edit Pengaturan Beranda PPDB Tahun {{ now()->year }}</div>
            <button type="submit" class="border px-4 py-3 bg-d-green text-white rounded-xl">
                Simpan
            </button>
        </div>

        <div class="w-full rounded-md">
            <label for="judul">Judul</label><br>
            <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Masukan Judul"
                class="w-full p-3 mb-3 mt-2 border focus:outline-none border-grey border-opacity-40">
        </div>
        <label for="konten" class="mb-2">Konten</label>

        <textarea name="konten" id="mytextarea">{{ old('konten') }}</textarea>

    </form>
@endsection()
