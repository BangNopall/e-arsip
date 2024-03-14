    <!-- Sidebar -->
    <div id="mySidebar"
        class="bg-gray-50 w-64 py-4 px-6 flex flex-col items-center border-r top-0 h-screen hidden sm:flex">
        <!-- Logo -->
        <div class="mb-6">
            <img class="mx-auto mt-2 mb-1 w-32 h-auto" src="{{ asset('images/Arsipintar.png') }}" alt="Logo">
        </div>

        <!-- Photo Profile -->
        @if (Auth::user()->foto != null)
            <img class="w-32 h-32 rounded-full border-4 border-blue-500 p-1" src="{{ asset(Auth::user()->foto) }}"
                alt="Profile Image">
        @else
            <img class="w-32 h-32 rounded-full border-4 border-blue-500 p-1" src="{{ asset('images/FotoProfil.jpg') }}"
                alt="Profile Image">
        @endif
        <!-- Nama Pengguna -->
        <div class="text-stone-900 text-lg text-center font-medium font-Poppins tracking-wide mt-1">
            {{ Auth::user()->name }}</div>
        <!-- Nama Jabatan -->
        <div class="text-gray-500 text-sm font-normal text-center font-Poppins tracking-wide leading-3">{{ Auth::user()->jabatan }}</div>

        <!-- Navigation -->
        <nav class="mt-9">
            <a href="/dashboard"
                class="{{ Request::is('dashboard') ? 'text-blue-700' : 'hover:text-blue-700 text-blue-500' }} items-center flex py-0.5 px-1 text-sm font-medium tracking-wide rounded-md mb-2 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px;">dashboard</i>Dashboard
            </a>
            <a href="/surat-masuk"
                class="{{ Request::is('surat-masuk') ? 'text-blue-700' : 'hover:text-blue-700 text-blue-500' }} items-center flex py-0.5 px-1 text-sm font-medium tracking-wide rounded-md mb-2 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px">mail</i>Surat Masuk
            </a>
            <a href="/surat-keluar"
                class="{{ Request::is('surat-keluar') ? 'text-blue-700' : 'hover:text-blue-700 text-blue-500' }} items-center flex py-0.5 px-1 text-sm font-medium tracking-wide rounded-md mb-2 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px">send</i>Surat Keluar
            </a>
            <a href="/surat-register-keluar"
                class="{{ Request::is('surat-register-keluar') ? 'text-blue-700' : 'hover:text-blue-700 text-blue-500' }} items-center flex py-0.5 px-1 text-sm font-medium tracking-wide rounded-md mb-2 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px">assignment</i>Surat Register Keluar
            </a>
            <a href="/jadwal-retensi"
                class="{{ Request::is('jadwal-retensi') ? 'text-blue-700' : 'hover:text-blue-700 text-blue-500' }} items-center flex py-0.5 px-1 text-sm font-medium tracking-wide rounded-md mb-2 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px">assignment</i>Jadwal Retensi
            </a>
            <a href="/buku-agenda"
                class="{{ Request::is('buku-agenda') ? 'text-blue-700' : 'hover:text-blue-700 text-blue-500' }} items-center flex py-0.5 px-1 text-sm font-medium tracking-wide rounded-md mb-10 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px">event_note</i>Buku Agenda
            </a>
            <a href="/edit-profil"
                class="{{ Request::is('edit-profil') ? 'text-blue-700' : 'hover:text-blue-700 text-blue-500' }} items-center flex py-0.5 px-1 text-sm font-medium tracking-wide rounded-md mb-2 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px">person</i>Edit Profil
            </a>
            <a href="/logout"
                class="{{ Request::is('logout') ? 'text-blue-700' : 'hover:text-blue-700 text-blue-500' }} items-center flex py-0.5 px-1 text-sm font-medium tracking-wide rounded-md mb-2 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px">exit_to_app</i>Keluar
            </a>
        </nav>
        <div id="closeSidebarBtn" class="sm:hidden md:hidden absolute top-4 left-[220px] cursor-pointer hidden"
            onclick="closeSidebar()">
            <i class="material-icons-round text-gray-500 hover:text-gray-800 transition duration-300 ease-in-out"
                style="font-size: 26px;">close</i>
        </div>
    </div>

    <script src="{{ asset('js/sidebar.js') }}"></script>
