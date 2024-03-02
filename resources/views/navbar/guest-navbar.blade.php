 {{-- navbar --}}
 <div class="w-full h-16 pl-5 grid content-center bg-d-green text-white">
     <div>
         <img src="{{ asset('assets/img/logo_smk.png') }}" alt="" width="50px" class="md:hidden">
     </div>
     <div class="absolute right-0 top-1">
         <div class="absolute right-0 text-3xl">
             {{-- Nav Hidden --}}
             <div class="md:hidden absolute right-0 top-3 mr-6 cursor-pointer" id="nav_hidden">
                 <i class="fa-solid fa-bars"></i>
             </div>
             {{-- Menu Open --}}
             <div class="hidden absolute right-0 top-3 mr-6 cursor-pointer" id="nav_open">
                 <i class="fa-solid fa-xmark"></i>
             </div>
         </div>
     </div>
     {{-- Menu Nav --}}
     <div class="flex max-md:hidden max-md:absolute max-md:top-16 max-md:left-0 max-md:bg-d-green max-md:w-full max-md:px-10 max-md:py-9"
         id="menu_nav_open">
         <a href="/" class="mr-5 flex-auto max-md:hidden">
             <img src="{{ asset('assets/img/logo_smk.png') }}" alt="" width="40px">
         </a>
         <a href="/" class="flex-auto my-auto max-md:block">
             Beranda
         </a>
         <a href="{{ route('daftar') }}" class="flex-auto my-auto max-md:block max-md:mt-2">
             Pendaftaran
         </a>
         @if ($hasil_seleksi->hasil_seleksi === 1)
             <a href="{{ route('hasil-seleksi') }}" class="flex-auto my-auto max-md:block max-md:mt-2">
                 Hasil Seleksi
             </a>
         @endif
         <a href="{{ route('informasi-pendaftaran') }}" class="flex-auto my-auto max-md:block max-md:mt-2">
             Informasi
         </a>
         <a href="{{ route('registrasi-siswa.index') }}"
             class="flex-auto my-auto pl-5 pt-2 pb-2 rounded-l-lg md:bg-white text-d-green max-md:block max-md:mt-2 max-md:bg-none max-md:text-white max-md:p-0">
             <div class="my-auto">
                 Registrasi
             </div>
         </a>
     </div>
 </div>
