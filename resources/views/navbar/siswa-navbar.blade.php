<div class="w-full flex justify-center items-center max-md:text-xs">
    <div class="flex justify-between items-center bg-l-sky-blue text-d-green fixed bottom-0 w-1/2 py-3 max-md:w-full max-md:px-5">

        <a href="{{ route('siswa-profil') }}"
            class="ms-2 max-md:m-0 {{ $title === 'Profil ' . $user->nama ? 'border-b-2 border-d-green' : 'border border-d-green rounded-full' }} py-1 px-3 text-d-green flex justify-start items-center">
            <i class="fa-solid fa-user"></i>
            @if ($title === 'Profil ' . $user->nama)
                <div class="ms-3">
                    Profil
                </div>
            @endif
        </a>

        <a href="{{ route('siswa-formulir-pendaftaran') }}"
            class="{{ $title === 'Formulir Pendaftaran ' . $user->nama ? 'border-b-2 border-d-green' : 'border border-d-green rounded-full' }} py-1 px-3 text-d-green flex justify-center items-center">
            <i class="fa-solid fa-file"></i>
            @if ($title === 'Formulir Pendaftaran ' . $user->nama)
                <div class="ms-3">
                    Formulir Pendaftaran
                </div>
            @endif
        </a>

        <a href="{{ route('siswa-pengaturan') }}"
            class="me-2 max-md:m-0 {{ $title === 'Pengaturan' ? 'border-b-2 border-d-green' : 'border border-d-green rounded-full' }} py-1 px-3 text-d-green flex justify-end items-center">
            <i class="fa-solid fa-gear"></i>
            @if ($title === 'Pengaturan')
                <div class="ms-3">
                    Pengaturan
                </div>
            @endif
        </a>

    </div>
</div>
