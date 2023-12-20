<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
    <title>Sip Arsip - Data Surat Register Keluar</title>
</head>

<body class="bg-gray-50 flex overflow-y-auto">
    <!-- Sidebar -->
    <div id="mySidebar" class="bg-gray-50 w-64 py-4 px-6 flex flex-col items-center border-r top-0 h-screen">
        <!-- Logo -->
        <div class="mb-6">
            <img class="mx-auto mt-2 mb-1 w-24 h-auto" src="Images/Sip Arsip.svg" alt="Logo">
        </div>

        <!-- Photo Profile -->
        <img class="w-32 h-32 rounded-full border-4 border-blue-500 p-1" src="Images/Foto Profil.jpg" alt="Profile Image">

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
            <a href="bukuagenda.html" class="flex items-center block py-0.5 px-1 text-sm font-medium text-gray-500 tracking-wide rounded-md mb-20 hover:text-gray-700 focus:text-blue-500 transition duration-300 ease-in-out">
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

    <!-- Main Content -->
    <div id="myMaincontent" class="flex-1 flex flex-col overflow-hidden font-Poppins relative mt-2 mx-2">
        <!-- Top Bar -->
        <header class="bg-gray-50">
            <div class="container flex items-center justify-between px-4 py-2">
                <!-- Selamat Beraktivitas dan Tanggal -->
                <div class="flex items-center text-left mb-1">
                    <div>
                        <p class="text-stone-900 font-medium tracking-wide text-base">Selamat Beraktivitas</p>
                        <p class="text-sm tracking-wide text-gray-500 leading-3">Senin, 20 November 2023</p>
                    </div>               
                </div>

                <!-- Foto Profil Kecil -->
                <div class="flex items-center">
                    <img src="Images/Foto Profil.jpg" alt="Foto Profil" class="w-10 h-10 rounded-full border border-blue-500 p-0.5">
                </div>
            </div>
        </header>
        <!-- Data Buku Agenda -->
        <div class="flex flex-col px-4 py-4">
            <div class="flex items-center justify-between mb-4">
                <!-- Judul Data Surat Keluar -->
                <h2 class="text-stone-900 font-medium text-xl tracking-wide">Data Buku Agenda</h2>

                <!-- Container untuk Kolom Pencarian -->
                <div class="flex items-center w-96 h-9 border-2 border-gray-400 rounded-md bg-transparent focus-within:border-gray-800 transition duration-300">
                    <!-- Logo Search dari Google Icons Rounded -->
                    <div class="flex items-center justify-center w-10 h-9">
                        <i class="material-icons-round text-gray-400 cursor-pointer" style="font-size: 20px;">search</i>
                    </div>

                    <!-- Kolom Pencarian -->
                    <input type="text" placeholder="Cari buku agenda" class="flex-1 text-sm text-gray-800 font-normal tracking-wide placeholder-gray-300 bg-transparent focus:outline-none">

                    <!-- Logo Filter dari Google Icons Rounded -->
                    <div class="flex items-center justify-center w-10 h-9">
                        <i class="material-icons-round text-gray-400 cursor-pointer" style="font-size: 20px;">tune</i>
                    </div>
                </div>
            </div>

            <!-- Tabel -->
            <div class="overflow-x-auto overflow-y-auto mt-2 max-w-full max-h-96">
                <table class="min-w-full min-w-max border">
                    <thead class="bg-blue-500 text-white tracking-wide border font-normal">
                        <tr>
                            <th class="py-2 px-2 border text-center text-sm">No.</th>
                            <th class="py-2 px-4 border text-center text-sm">Asal Surat</th>
                            <th class="py-2 px-4 border text-center text-sm">Tujuan Surat</th>
                            <th class="py-2 px-4 border text-center text-sm">Jenis Surat</th>
                            <th class="py-2 px-4 border text-center text-sm">Tanggal Simpan</th>
                            <th class="py-2 px-4 border text-center text-sm">Tanggal Input</th>
                            <th class="py-2 px-4 border text-center text-sm">Pratinjau File</th>
                            <th class="py-2 px-4 border text-center text-sm">Lampiran</th>
                            <th class="py-2 px-4 border text-center text-sm">Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 border text-sm">
                        <tr>
                            <td class="py-2 px-2 border text-center">1</td>
                            <td class="py-2 px-4 border text-center truncate">Karang Taruna Desa Wonorejo</td>
                            <td class="py-2 px-4 border text-center truncate">Kepala Desa Wonorejo</td>
                            <td class="py-2 px-4 border text-center truncate">Undangan Kegiatan</td>
                            <td class="py-2 px-4 border text-center">14/11/2023</td>   
                            <td class="py-2 px-4 border text-center">14/11/2023</td>
                            <td class="py-2 px-4 border text-center">
                                <a href="#" class="text-white bg-green-500 rounded-md text-xs font-bold tracking-wide px-2 py-0.5 flex items-center justify-center">
                                    <i class="material-icons-round mr-2" style="font-size: 15px;">visibility</i>Lihat File
                                </a>
                            </td>   
                            <td class="py-2 px-4 border text-center">
                                <a href="#" class="text-white bg-green-500 rounded-md text-xs font-bold tracking-wide px-2 py-0.5 flex items-center justify-center">
                                    <i class="material-icons-round mr-2" style="font-size: 15px;">download</i>Download File
                                </a>
                            </td>  
                            <td class="py-2 px-2 text-center" style="display: flex; align-items: center; justify-content: center;">
                                <a href="#" class="text-white bg-blue-500 rounded-md text-xs font-bold tracking-wide px-4 py-0.5 mr-2">Edit</a>
                                <a href="#" class="text-white bg-red-500 rounded-md text-xs font-bold tracking-wide px-4 py-0.5">Hapus</a>
                            </td> 
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Rekap Buku Agenda -->
            <div class="mt-8 mb-0.5 text-base tracking-wide font-medium text-stone-900">Rekap Buku Agenda</div>
            <!-- Tanggal Awal dan Tanggal Akhir-->
            <div class="flex flex-row">
                <!-- Tanggal Awal -->
                <div class="flex flex-col mr-4">
                    <div class="text-xs font-medium tracking-wide text-stone-900 mb-0.5">Tanggal Awal</div>
                    <div class="relative border-2 border-gray-400 rounded-md h-8 w-64 flex items-center transition-all duration-300 ease-in-out focus-within:border-gray-800">
                        <input
                            type="text"
                            placeholder="dd/mm/yyyy"
                            class="outline-none tracking-wide px-2 text-sm text-gray-500 flex-grow"/>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="material-icons-round text-gray-400 text-lg" style="font-size: 18px;">date_range</i>
                        </div>
                    </div>
                </div>

                <!-- Tanggal Akhir -->
                <div class="flex flex-col mr-4">
                    <div class="text-xs font-medium tracking-wide text-stone-900 mb-0.5">Tanggal Akhir</div>
                    <div class="relative border-2 border-gray-400 rounded-md h-8 w-64 flex items-center transition-all duration-300 ease-in-out focus-within:border-gray-800">
                        <input
                            type="text"
                            placeholder="dd/mm/yyyy"
                            class="outline-none tracking-wide px-2 text-sm text-gray-500 flex-grow"/>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="material-icons-round text-gray-400 text-lg" style="font-size: 18px;">date_range</i>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Tombol Cetak Buku Agenda -->
                <div class="flex justify-start mt-2 mb-44 items-center">
                    <button class="flex items-center bg-blue-500 text-white font-medium text-xs tracking-wide rounded-md px-3 py-2">
                        Cetak Buku Agenda
                    </button>
                </div>                        
            <!-- Footer -->
            <footer class="text-stone-900 text-sm text-left">
                &copy; 2023 Sip Arsip. All rights reserved.
            </footer>
        </div>
    </div>

<!-- JavaScript -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var sidebar = document.getElementById('mySidebar');

        window.addEventListener('scroll', function () {
            var shouldFix = window.scrollY > 0;
            
            sidebar.style.position = shouldFix ? 'sticky' : 'static';
        });
    });
</script>    
</body>

</html>
