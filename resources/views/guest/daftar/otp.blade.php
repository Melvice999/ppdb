@extends('layouts.guest-layout')
@section('content')

    @if ($pendaftaran->pendaftaran === 1)
        {{-- Pesan Error --}}
        @if (session('error'))
            <div class="grid mt-6 ml-10 mr-10 mx-auto place-items-center" id="errorDiv">
                <div class="w-1/2 text-white bg-d-green rounded-md max-md:w-full mt-6">
                    <ul class="p-2">
                        <li>{{ session('error') }}</li>
                    </ul>
                </div>
            </div>
        @endif

        {{-- Pesan Berhasil --}}
        @if (session('success'))
            <div class="grid mt-6 ml-10 mr-10 mx-auto place-items-center" id="successDiv">
                <div class="w-1/2 text-white bg-d-green rounded-md max-md:w-full mt-6">
                    <ul class="p-2">
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            </div>
        @endif

        {{-- Pesan Json --}}
        <div class="hidden  mt-6 ml-10 mr-10 mx-auto place-items-center" id="successDivJson">

        </div>

        <form action="{{ route('daftar/otp-update-nohp') }}" method="POST">
            @csrf
            <input type="text" id="nik" name="nik" class="hidden" value="{{ $calonSiswa->nik }}">

            <div class="hidden mt-6 ml-10 mr-10 place-items-center" id="noHpLama">
                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="no_hp">No WhatsApp Yang Valid</label><br>
                    <input type="number" name="no_hp_baru" value="{{ old('no_hp') }}"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="15" placeholder="Masukan No WhatsApp Yang Valid"
                        class="border-b w-full focus:outline-none mb-2" required>

                    <span class="text-grey">
                        <li>Gunakan nomor whatsapp untuk menerima kode OTP</li>
                    </span>
                    <button
                        class="mt-6 py-2 px-7 rounded-2xl hover:bg-white border hover:text-d-green border-d-green bg-d-green text-white">Simpan</button>
                </div>
            </div>
        </form>


        <form action="{{ route('daftar/otp-post') }}" method="POST">
            @csrf

            <input type="text" id="nik" name="nik" class="hidden" value="{{ $calonSiswa->nik }}">
            <input type="text" id="no_hp" name="no_hp" class="hidden" value="{{ $calonSiswa->no_hp }}">

            <div class="grid mt-6 ml-10 mr-10 place-items-center">
                <div class="w-1/2 bg-white p-7 rounded-md max-md:w-full mt-6">
                    <label for="otp" class="w-full">OTP</label>
                    <input type="number" name="otp" value="{{ old('otp') }}" placeholder="Masukan OTP"
                        class="border-b w-full focus:outline-none" required>
                </div>
                <div class="flex cursor-pointer w-1/2 max-md:w-full">
                    <div class="flex justify-between w-full">
                        <div onclick="confirmRequestUlang()"
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
        // Mendapatkan tombol-tombol yang dibutuhkan
        function confirmRequestUlang() {
            let no_hp = document.getElementById('no_hp').value;
            let nik = document.getElementById('nik').value;

            if (confirm("Apakah No WhatsApp " + no_hp + " sudah benar?")) {
                let data = {
                    no_hp: no_hp,
                    nik: nik
                };

                fetch('/daftar/otp-request/' + nik + '/' + no_hp, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log(data.success);
                            const successDivJson = document.getElementById('successDivJson');
                            successDivJson.innerHTML = `<div class="w-1/2 text-white bg-d-green rounded-md max-md:w-full mt-6">
                                                        <ul class="p-2">
                                                            <li>${data.success}</li>
                                                        </ul>
                                                    </div>`;
                            successDivJson.classList.replace('hidden', 'grid');
                            document.getElementById('errorDiv').classList.add('hidden');
                            document.getElementById('successDiv').classList.add('hidden');
                        } else {
                            const successDivJson = document.getElementById('successDivJson');
                            successDivJson.innerHTML = `<div class="w-1/2 text-white bg-d-green rounded-md max-md:w-full mt-6">
                                                        <ul class="p-2">
                                                            <li>Permintaan ulang OTP gagal</li>
                                                        </ul>
                                                    </div>`;
                            successDivJson.classList.replace('hidden', 'grid');
                            document.getElementById('errorDiv').classList.add('hidden');
                            document.getElementById('successDiv').classList.add('hidden');
                        }
                    })
                    .catch(error => {
                        console.error('Terjadi kesalahan:', error);
                    });

                const noHpLama = document.getElementById('noHpLama');
                noHpLama.classList.add('hidden');
            } else {
                const noHpLama = document.getElementById('noHpLama');
                noHpLama.classList.remove('hidden');
                noHpLama.classList.add('grid');
                document.getElementById('successDivJson').classList.add('hidden');
            }
        }
    </script>


@endsection()
