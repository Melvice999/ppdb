@extends('layouts.admin-layout')
@section('content')
    <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>

    <div class="w-full text-2xl font-medium">
        <a href="{{ route('admin-beranda') }}">Admin</a> / <a href="{{ route('admin-pengaturan') }}">Pengaturan</a> / Informasi</div>
    <form action="{{ route('admin-pengaturan-informasi-post', ['id' => $informasi->id]) }}" method="POST">
        @csrf
        <div class="flex justify-between mt-10 mb-4">
            <div class="max-md:me-6">Edit Pengaturan Informasi PPDB Tahun {{ now()->year }}</div>
            <button type="submit" class="border px-4 py-3 bg-d-green text-white rounded-xl">
                Simpan
            </button>
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

        <div class="w-full rounded-md">
            <label for="j_informasi">Judul</label><br>
            <input type="text" name="j_informasi" value="{{ $informasi->j_informasi }}" placeholder="Masukan Judul"
                class="w-full p-3 mb-3 mt-2 border focus:outline-none border-grey border-opacity-40">
        </div>

        <label for="informasi" class="mb-2">Konten</label>
        <textarea name="informasi" id="mytextarea">{{ $informasi->informasi }}</textarea>
    </form>
@endsection()
