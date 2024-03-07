<div class="flex justify-between items-center p-3 bg-d-green text-d-green fixed bottom-0 left-0 right-0 w-full">

    <a href="{{ route('siswa-profil') }}" class="ms-40 max-md:m-0 py-1 px-3 bg-white rounded-full">
        <i class="fa-solid fa-user"></i>
        @if ($title === 'Profil ' . $user->nama)
            Profil
        @endif
    </a>

    <a href="{{ route('siswa-formulir-pendaftaran') }}" class="py-1 px-3 bg-white rounded-full">
        <i class="fa-solid fa-file"></i>
        @if ($title === 'Formulir Pendaftaran ' . $user->nama)
            Formulir Pendaftaran
        @endif
    </a>

    <a href="{{ route('siswa-pengaturan') }}" class="me-40 max-md:m-0 py-1 px-3 bg-white rounded-full">
        <i class="fa-solid fa-gear"></i>
        @if ($title === 'Pengaturan')
            Pengaturan
        @endif
    </a>

</div>
