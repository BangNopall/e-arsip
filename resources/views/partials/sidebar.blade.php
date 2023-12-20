<!-- Sidebar -->
<div class="bg-gray-50 w-64 z-50 py-4 px-6 hidden md:flex flex-col items-center border-r" id="sidebar">
    <!-- Logo -->
    <div class="mb-6">
        <img class="mx-auto mt-2 mb-1 w-24 h-auto" src="{{ asset('images/Sip-Arsip.svg') }}" alt="Logo">
    </div>

    <!-- Photo Profile -->
    <img class="w-32 h-32 rounded-full border-4 border-blue-500 p-1" src="{{ asset('images/FotoProfil.jpg') }}" alt="Profile Image">

    <!-- Nama Pengguna -->
    <div class="text-stone-900 text-lg font-medium font-Poppins tracking-wide mt-1">Agus Salim, S.Sos., M.M</div>

    <!-- Nama Jabatan -->
    <div class="text-gray-500 text-sm font-normal font-Poppins tracking-wide leading-3">Manajer Senior</div>

    <!-- Navigation -->
    <nav class="mt-9">
        <a href="/dashboard"
            class="{{ Request::is('dashboard') ? 'text-blue-500' : 'text-gray-500  hover:text-gray-700'}} flex items-center py-0.5 px-1 text-sm font-medium tracking-wide rounded-md mb-2 transition duration-300 ease-in-out">
            <i class="material-icons-round mr-4" style="font-size: 20px;">dashboard</i>Dashboard
        </a>
        <a href="/surat-masuk"
            class="{{ Request::is('surat-masuk') ? 'text-blue-500' : 'text-gray-500  hover:text-gray-700'}} flex items-center py-0.5 px-1 text-sm font-medium tracking-wide rounded-md mb-2 transition duration-300 ease-in-out">
            <i class="material-icons-round mr-4" style="font-size: 20px">mail</i>Surat Masuk
        </a>
        <a href="/surat-keluar"
            class="{{ Request::is('surat-keluar') ? 'text-blue-500' : 'text-gray-500  hover:text-gray-700'}} flex items-center py-0.5 px-1 text-sm font-medium tracking-wide rounded-md mb-2 transition duration-300 ease-in-out">
            <i class="material-icons-round mr-4" style="font-size: 20px">send</i>Surat Keluar
        </a>
        <a href="/register-keluar"
            class="{{ Request::is('register-keluar') ? 'text-blue-500' : 'text-gray-500  hover:text-gray-700'}} flex items-center py-0.5 px-1 text-sm font-medium tracking-wide rounded-md mb-2 transition duration-300 ease-in-out">
            <i class="material-icons-round mr-4" style="font-size: 20px">assignment</i>Surat Register Keluar
        </a>
        <a href="#"
            class="flex items-center block py-0.5 px-1 text-sm font-medium text-gray-500 tracking-wide rounded-md mb-20 hover:text-gray-700 focus:text-blue-500 transition duration-300 ease-in-out">
            <i class="material-icons-round mr-4" style="font-size: 20px">event_note</i>Buku Agenda
        </a>
        <a href="#"
            class="flex items-center block py-0.5 px-1 text-sm font-medium text-gray-500 tracking-wide rounded-md mb-2 hover:text-gray-700 focus:text-blue-500 transition duration-300 ease-in-out">
            <i class="material-icons-round mr-4" style="font-size: 20px">person</i>Edit Profil
        </a>
        <a href="{{ route('logout') }}"
            class="flex items-center block py-0.5 px-1 text-sm font-medium text-gray-500 tracking-wide rounded-md hover:text-gray-700 focus:text-blue-500 transition duration-300 ease-in-out">
            <i class="material-icons-round mr-4" style="font-size: 20px">exit_to_app</i>Keluar
        </a>
    </nav>
</div>

<div class="md:hidden" id="buttonMenu">
    <button id="sidebarToggle" class="text-gray-500 hover:text-gray-700 focus:text-blue-500 transition duration-300 ease-in-out">
        <i class="material-icons-round" style="font-size: 32px;">menu</i>
    </button>
</div>

<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>
<script>
    // JavaScript to toggle the mobile sidebar
    const sidebarToggle = document.getElementById('sidebarToggle');
    const buttonMenu = document.getElementById('buttonMenu');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    sidebarToggle.addEventListener('click', () => {
        buttonMenu.classList.toggle('hidden');
        sidebar.classList.toggle('hidden');
        sidebarOverlay.classList.toggle('hidden');
    });

    sidebarOverlay.addEventListener('click', () => {
        buttonMenu.classList.toggle('hidden');
        sidebar.classList.add('hidden');
        sidebarOverlay.classList.add('hidden');
    });
</script>
