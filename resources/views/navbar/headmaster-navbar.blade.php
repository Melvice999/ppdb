<nav class="fixed top-0 left-0 h-full px-2 py-2 z-10 bg-d-green text-white w-60 max-md:w-full max-md:h-16">
  <header class="relative">
      <div class="flex items-center pb-4 w-11/12">
          <span class="flex items-center justify-center min-w-16">
              <img src="{{ asset('assets/img/logo_smk.png') }}" alt="" class="w-10 rounded-md me-2">
          </span>

          <img src="{{ asset('assets/img/logo_smk.png') }}" alt="" class="w-10 rounded-md ms-4 hidden"
              id="logo_close">

          <div class="whitespace-nowrap flex flex-col">
              <span class="mt-1 text-lg font-semibold">PPDB</span>
              <span class="-mt-1 block text-sm">SMK Ma'arif
                  Nu Doro</span>
          </div>
      </div>

      <i class="fa-solid fa-bars text-3xl absolute top-2 right-4 invisible max-md:visible cursor-pointer"
          id="nav_toggle_mobile"></i>

      <i class="fa-solid fa-circle-chevron-right absolute top-8 -right-6 translate-y-1/2 rotate-180 h-8 w-8 bg-white text-d-green rounded-full flex items-center justify-center text-2xl cursor-pointer max-md:hidden"
          id="nav_toggle"></i>
  </header>

  <div class="flex flex-col justify-between mx-4">

      <ul class="mt-5 max-md:hidden ">
          <li class="mt-3 h-14 px-4 bg-l-sky-blue rounded-2xl border border-l-sky-blue">

              {{-- <form action="{{ route('admin-penelusuran') }}" method="GET"> --}}
              <div class="flex mt-3">
                  <button type="submit" class="border border-l-sky-blue">
                      <i class="fa-solid fa-magnifying-glass min-w-16 text-lg me-3 text-d-green"></i>
                  </button>
                  <input type="text" name="search" placeholder="Cari..."
                      class="{{-- w-4/6 --}} w-full text-base text-black font-medium outline-none bg-l-sky-blue filled">
              </div>
              </form>
          </li>

          <a href="{{ route('headmaster-beranda') }}">
          <li class="border border-opacity-50 border-white flex items-center mt-3 h-14 px-4 rounded-2xl">
              <i class="fa-solid fa-house min-w-16 text-lg"></i>
              <span class="whitespace-nowrap">&nbsp;&nbsp;&nbsp; Beranda</span>
          </li>
          </a>

          <a href="{{ route('headmaster-cetak-berkas') }}">
          <li class="border border-opacity-50 border-white flex items-center mt-3 h-14 px-4 rounded-2xl">
              <i class="fa-solid fa-print min-w-16 text-lg"></i>
              <span class="whitespace-nowrap">&nbsp;&nbsp;&nbsp; Cetak Berkas</span>
          </li>
          </a>

          {{-- <a href="{{ route('admin-pusat-akun') }}"> --}}
          <li class="border border-opacity-50 border-white flex items-center mt-3 h-14 px-4 rounded-2xl">
              <i class="fa-solid fa-user min-w-16 text-lg"></i>
              <span class="whitespace-nowrap">&nbsp;&nbsp;&nbsp; Pusat Akun</span>
          </li>
          </a>

          {{-- <a href="{{ route('admin-logout') }}"> --}}
          <li class="absolute border border-opacity-50 border-white flex items-center mt-3 h-14 px-4 hover:bg-white hover:text-d-green rounded-2xl bottom-5  w-4/5 max-md:w-full max-md:relative max-md:bottom-0 max-md:mt-6 mb-3"
              id="logout">
              <i class="fa-solid fa-right-from-bracket min-w-16 text-lg"></i>
              <span>&nbsp;&nbsp;&nbsp;
                  Logout</span>
          </li>
          </a>

      </ul>
  </div>
</nav>