@extends('layouts.admin-layout')
@section('content')
    <div class="w-full text-2xl font-medium">
        Admin / Pengaturan / Kontak
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
    <form action="{{ route('admin-pengaturan-update-kontak', ['id' => $id]) }}" method="POST">
        @csrf
        <div class="flex justify-between mt-10 mb-4">
            <div class="max-md:me-6">Edit Pengaturan Beranda PPDB Tahun {{ now()->year }}</div>
            <button type="submit" class="border px-4 py-3 bg-d-green text-white rounded-xl">
                Simpan
            </button>
        </div>


        @foreach ($pengaturan as $item)
            <table class="w-full">
                <tr>
                    <td class="py-3">
                        <label for="wa">Whatsapp</label>
                    </td>
                    <td class="border-b border-d-green">
                        <div class="flex">
                            :&nbsp; <input type="text" name="wa" autocomplete="off" value="{{ $item->wa }}"
                                placeholder="Masukan Whatsapp" class="w-full focus:outline-none bg-l-sky-blue" required>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="py-3">
                        <label for="ig">Instagram</label>
                    </td>
                    <td class="border-b border-d-green">
                        <div class="flex">
                            :&nbsp; <input type="text" name="ig" autocomplete="off" value="{{ $item->ig }}"
                                placeholder="Masukan Instagram" class="w-full focus:outline-none bg-l-sky-blue" required>
                        </div>

                    </td>
                </tr>

                <tr>
                    <td class="py-3">
                        <label for="fb">Facebook</label>
                    </td>
                    <td class="border-b border-d-green">
                        <div class="flex">
                            :&nbsp; <input type="text" name="fb" autocomplete="off" value="{{ $item->fb }}"
                                placeholder="Masukan Facebook" class="w-full focus:outline-none bg-l-sky-blue" required>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="py-3">
                        <label for="yt">Youtube</label>
                    </td>
                    <td class="border-b border-d-green">
                        <div class="flex">
                            :&nbsp; <input type="text" name="yt" autocomplete="off" value="{{ $item->yt }}"
                                placeholder="Masukan Youtube" class="w-full focus:outline-none bg-l-sky-blue" required>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="py-3">
                        <label for="web">Website</label>
                    </td>
                    <td class="border-b border-d-green">
                        <div class="flex">
                            :&nbsp; <input type="text" name="web" autocomplete="off" value="{{ $item->web }}"
                                placeholder="Masukan Website" class="w-full focus:outline-none bg-l-sky-blue" required>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="py-3">
                        <label for="map">Maps</label>
                    </td>
                    <td class="border-b border-d-green">
                        <div class="flex">
                            :&nbsp; <input type="text" name="map" autocomplete="off" value="{{ $item->map }}"
                                placeholder="Masukan Lokasi" class="w-full focus:outline-none bg-l-sky-blue" required>
                        </div>
                    </td>
                </tr>

            </table>
        @endforeach


    </form>
@endsection()
