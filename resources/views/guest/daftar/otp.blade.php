@extends('layouts.guest-layout')
@section('content')

    @if ($pendaftaran->pendaftaran === 1)
        {{-- Pesan Error --}}
        @if (session('error'))
            <div class="grid mt-6 ml-10 mr-10 mx-auto place-items-center" id="clsSuccess">
                <div class="w-1/2 text-white bg-d-green rounded-md max-md:w-full mt-6">
                    <ul class="p-2">
                        <li>{{ session('error') }}</li>
                    </ul>
                </div>
            </div>
        @endif

        {{-- Pesan Berhasil --}}
        @if (session('success'))
            <div class="grid mt-6 ml-10 mr-10 mx-auto place-items-center" id="clsSuccess">
                <div class="w-1/2 text-white bg-d-green rounded-md max-md:w-full mt-6">
                    <ul class="p-2">
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('daftar/otp-post') }}" method="POST">
            @csrf

            <input type="text" name="nik" class="hidden" value="{{ $calonSiswa->nik }}">
            <input type="text" name="no_hp" class="hidden" value="{{ $calonSiswa->no_hp }}">

            <div class="grid mt-6 ml-10 mr-10 place-items-center">
                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="otp" class="w-full">OTP</label>
                    <input type="number" name="otp" value="{{ old('otp') }}" placeholder="Masukan OTP"
                        class="border-b w-full focus:outline-none" required>
                </div>
                <div class="flex cursor-pointer w-1/2 max-md:w-full">
                    <div class="flex justify-between w-full">
                        <div onclick="requestUlangOtp()"
                            class="mt-6 py-2 px-7 max-md:p-2 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                            Request OTP
                        </div>

                        <button type="submit"
                            class="mt-6 py-2 px-7 max-md:p-2 rounded-2xl bg-white border border-d-green hover:bg-d-green hover:text-white">
                            Berikutnya
                        </button>
                    </div>
                </div>
            </div>
        </form>

    @endif
    @if ($pendaftaran->pendaftaran === 0)
        <div class="grid mt-6 mx-10 place-items-center text-base max-sm:mx-3">
            {{-- {{ $siswa }} --}}

            <div class="w-1/2 px-10 bg-white max-md:w-full max-md:px-10 rounded-md text-justify max-md:mt-7 max-sm:px-3">
                <div class="text-center py-4">
                    Pendaftaran Belum Tersedia
                </div>
            </div>
        </div>
    @endif


    <script>
        function requestUlangOtp() {
            let no_hp = document.getElementsByName('no_hp')[0].value;
            let nik = document.getElementsByName('nik')[0].value;

            let data = {
                no_hp: no_hp
                nik: nik
            };

            fetch('/daftar/reset-otp/' + no_hp + nik, , {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (response.ok) {
                        console.log('Permintaan ulang OTP berhasil');
                    } else {
                        console.error('Permintaan ulang OTP gagal');
                    }
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        }
    </script>


@endsection()
