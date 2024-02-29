@extends('layouts.admin-layout')
@section('content')
    <style>
        .ck-content>blockquote,
        .ck-content>dl,
        .ck-content>dd,
        .ck-content>h1,
        .ck-content>h2,
        .ck-content>h3,
        .ck-content>h4,
        .ck-content>h5,
        .ck-content>h6,
        .ck-content>hr,
        .ck-content>figure,
        .ck-content>p,
        .ck-content>pre {
            margin: revert;
        }

        .ck-content>ol,
        .ck-content>ul {
            list-style: revert;
            margin: revert;
            padding: revert;
        }

        .ck-content>table {
            border-collapse: revert;
        }

        .ck-content>h1,
        .ck-content>h2,
        .ck-content>h3,
        .ck-content>h4,
        .ck-content>h5,
        .ck-content>h6 {
            font-size: revert;
            font-weight: revert;
        }
    </style>
    <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>

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
        <textarea class="ck-content" name="konten" id="editor">{{ old('konten') }}</textarea>
    </form>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection()
