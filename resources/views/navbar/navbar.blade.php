 {{-- navbar --}}
 <div class="w-full h-16 pl-5 grid content-center bg-d-green text-white">
    <a href="/">
        <img src="{{ asset('asset/img/logo_smk.png') }}" alt="" width="50px" class="md:hidden">
    </a>
     <div class="absolute right-0 top-1">
         {{-- Nav Hidden --}}
         <div class="md:hidden absolute right-0 top-4 mr-6 rotate-90 cursor-pointer" id="nav_hidden">
             <span class="border border-t-8 me-2"></span>
             <span class="border border-t-8 me-2"></span>
             <span class="border border-t-8"></span>
         </div>
         {{-- Menu Open --}}
         <div class="hidden absolute right-0 top-3 mr-8" id="nav_open">
             <div class="absolute rotate-45 cursor-pointer">
                 <span class="border text-2xl"></span>
             </div>
             <div class="absolute -rotate-45 cursor-pointer">
                 <span class="border text-2xl"></span>
             </div>
         </div>
     </div>
     {{-- Menu Nav --}}
     <div class="flex max-md:hidden max-md:absolute max-md:top-16 max-md:left-0 max-md:bg-d-green max-md:w-full max-md:p-10"
         id="menu_nav_open">
         <a href="/" class="mr-5 flex-auto max-md:hidden">
             <img src="{{ asset('asset/img/logo_smk.png') }}" alt="" width="40px">
         </a>
         <a href="/" class="flex-auto my-auto max-md:block">
             Beranda
         </a>
         <a href="daftar" class="flex-auto my-auto max-md:block max-md:mt-2">
             Pendaftaran
         </a>
         <a class="flex-auto my-auto max-md:block max-md:mt-2">
             Hasil Seleksi
         </a>
         <a class="flex-auto my-auto max-md:block max-md:mt-2">
             Informasi
         </a>
         <a class="flex-auto my-auto max-md:block max-md:mt-2">
             Kontak
         </a>
         <a class="flex-auto my-auto pl-5 pt-2 pb-2 rounded-l-lg bg-white text-d-green max-md:block max-md:mt-2">
             <div class="my-auto">
                 Profil
             </div>
         </a>
     </div>
 </div>
