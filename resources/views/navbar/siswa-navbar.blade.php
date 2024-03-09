<div class="flex justify-between items-center p-3 bg-d-green text-d-green fixed bottom-0 left-0 right-0 w-full">

    <a href="{{ route('siswa-profil') }}"
        class="ms-40 max-md:m-0 {{ $title === 'Profil ' . $user->nama ? 'border-b-2 border-white' : 'border border-white rounded-full' }} py-1 px-3 text-white flex justify-center items-center">
        <i class="fa-solid fa-user"></i>
        @if ($title === 'Profil ' . $user->nama)
            <div class="ms-3">
                Profil
            </div>
        @endif
    </a>

    <a href="{{ route('siswa-formulir-pendaftaran') }}"
        class="{{ $title === 'Formulir Pendaftaran ' . $user->nama ? 'border-b-2 border-white' : 'border border-white rounded-full' }} py-1 px-3 text-white flex justify-center items-center">
        <i class="fa-solid fa-file"></i>
        @if ($title === 'Formulir Pendaftaran ' . $user->nama)
            <div class="ms-3">
                Formulir Pendaftaran
            </div>
        @endif
    </a>

    <a href="{{ route('siswa-pengaturan') }}"
        class="me-40 max-md:m-0 {{ $title === 'Pengaturan' ? 'border-b-2 border-white' : 'border border-white rounded-full' }} py-1 px-3 text-white flex justify-center items-center">
        <i class="fa-solid fa-gear"></i>
        @if ($title === 'Pengaturan')
            <div class="ms-3">
                Pengaturan
            </div>
        @endif
    </a>

</div>
