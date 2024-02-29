<nav class="fixed top-0 left-0 h-full px-2 py-2 z-50 bg-d-green text-white w-60 max-md:w-full max-md:h-16">
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

        <i class="fa-solid fa-bars text-3xl absolute top-2 right-4 invisible max-md:visible" id="nav_toggle_mobile"></i>

        <i class="fa-solid fa-circle-chevron-right absolute top-8 -right-6 translate-y-1/2 rotate-180 h-8 w-8 bg-white text-d-green rounded-full flex items-center justify-center text-2xl cursor-pointer max-md:hidden"
            id="nav_toggle"></i>
    </header>

    <div class="flex flex-col justify-between mx-4">

        <ul class="mt-5 max-md:hidden ">
            <li class="flex items-center mt-3 h-14 px-4 cursor-pointer bg-l-sky-blue rounded-2xl">
                <a href="">
                    <i class="fa-solid fa-magnifying-glass min-w-16 text-lg me-3 text-d-green"></i>
                    <input type="text" placeholder="Cari..."
                        class="w-4/6 text-base text-black font-medium outline-none border-none bg-l-sky-blue">
                </a>
            </li>

            <li
                class="border border-opacity-50 border-white flex items-center mt-3 h-14 px-4 hover:bg-white hover:text-d-green rounded-2xl">
                <a href="{{ route('admin-beranda')}}" class="flex items-center w-full rounded-md">
                    <i class="fa-solid fa-house min-w-16 text-lg"></i>
                    <span class="whitespace-nowrap">&nbsp;&nbsp;&nbsp; Beranda</span>
                </a>
            </li>

            <li
                class="border border-opacity-50 border-white flex items-center mt-3 h-14 px-4 hover:bg-white hover:text-d-green rounded-2xl">
                <a href="{{ route('admin-pengaturan') }}" class="flex items-center w-full rounded-md">
                    <i class="fa-solid fa-gear min-w-16 text-lg"></i>
                    <span class="whitespace-nowrap">&nbsp;&nbsp;&nbsp; Pengaturan</span>
                </a>
            </li>

            <li class="absolute border border-opacity-50 border-white flex items-center mt-3 h-14 px-4 hover:bg-white hover:text-d-green rounded-2xl bottom-5  w-4/5 max-md:w-full max-md:relative max-md:bottom-0 max-md:mt-6 mb-3"
                id="logout">
                <a href="#" class="flex items-center w-full rounded-md">
                    <i class="fa-solid fa-right-from-bracket min-w-16 text-lg"></i>
                    <span>&nbsp;&nbsp;&nbsp;
                        Logout</span>
                </a>
            </li>

        </ul>
    </div>
</nav>

<script type="module">
    $(document).ready(function() {
        let closeToggle = "fa-circle-chevron-right";
        let openToggle = "fa-circle-chevron-left";
        let navToggle = $("#nav_toggle")
        // Toggle Nav Menu
        navToggle.click(function() {
            if (navToggle.hasClass(closeToggle)) {
                // Close Nav Menu
                navToggle.removeClass(closeToggle).addClass(openToggle);
                $("nav span").addClass("invisible");
                $("nav input").addClass('hidden');
                $("nav").removeClass('w-60').addClass('w-24');
                $("#logout").removeClass("w-4/5").addClass("w-12");
                $("#logo_close").removeClass("hidden");
                $("section").removeClass("ml-60").addClass("ml-20");
            } else {
                // Open Nav Menu
                navToggle.removeClass(openToggle).addClass(closeToggle);
                $("nav span").removeClass("invisible");
                $("nav input").removeClass('hidden');
                $("nav").removeClass('w-24').addClass('w-60');
                $("#logout").removeClass("w-12").addClass("w-4/5");
                $("#logo_close").addClass("hidden");
                $("section").removeClass("ml-20").addClass("ml-60");
            }
        });

        let navToggleMobile = $("#nav_toggle_mobile")
        navToggleMobile.click(function() {
            if ($("nav ul").hasClass("max-md:hidden")) {
                $("nav ul").removeClass("max-md:hidden")
                $("nav").removeClass("max-md:h-16").addClass("max-md:h-full")
                $("section").addClass("max-md:hidden")
            } else {
                $("nav ul").addClass("max-md:hidden")
                $("nav").removeClass("max-md:h-full").addClass("max-md:h-16")
                $("section").removeClass("max-md:hidden")
            }

        })
    });
</script>
