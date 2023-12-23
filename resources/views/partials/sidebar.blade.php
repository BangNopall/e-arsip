    <!-- Sidebar -->
    <div id="mySidebar" class="bg-gray-50 w-64 py-4 px-6 flex flex-col items-center border-r top-0 h-screen hidden sm:flex">
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
            <a href="dashboard.html" class="flex items-center block py-0.5 px-1 text-sm font-medium text-gray-500 tracking-wide rounded-md mb-2 hover:text-gray-700 focus:text-blue-500 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px;">dashboard</i>Dashboard
            </a>
            <a href="suratmasuk.html" class="flex items-center block py-0.5 px-1 text-sm font-medium text-gray-500 tracking-wide rounded-md mb-2 hover:text-gray-700 focus:text-blue-500 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px">mail</i>Surat Masuk
            </a>
            <a href="suratkeluar.html" class="flex items-center block py-0.5 px-1 text-sm font-medium text-gray-500 tracking-wide rounded-md mb-2 hover:text-gray-700 focus:text-blue-500 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px">send</i>Surat Keluar
            </a>
            <a href="registerkeluar.html" class="flex items-center block py-0.5 px-1 text-sm font-medium text-gray-500 tracking-wide rounded-md mb-2 hover:text-gray-700 focus:text-blue-500 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px">assignment</i>Surat Register Keluar
            </a>
            <a href="bukuagenda.html" class="flex items-center block py-0.5 px-1 text-sm font-medium text-gray-500 tracking-wide rounded-md mb-16 hover:text-gray-700 focus:text-blue-500 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px">event_note</i>Buku Agenda
            </a>
            <a href="editprofile.html" class="flex items-center block py-0.5 px-1 text-sm font-medium text-gray-500 tracking-wide rounded-md mb-2 hover:text-gray-700 focus:text-blue-500 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px">person</i>Edit Profil
            </a>
            <a href="login.html" class="flex items-center block py-0.5 px-1 text-sm font-medium text-gray-500 tracking-wide rounded-md mb-2 hover:text-gray-700 focus:text-blue-500 transition duration-300 ease-in-out">
                <i class="material-icons-round mr-4" style="font-size: 20px">exit_to_app</i>Keluar
            </a>
        </nav>      
    </div>
    
    <script src="{{asset('js/sidebar.js')}}"></script>