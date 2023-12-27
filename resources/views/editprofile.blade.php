@extends('layouts.main')
@section('container')
    <!-- Main Content -->
    <div id="myMaincontent" class="flex-1 flex flex-col overflow-hidden font-Poppins relative">
        <!-- Top Bar -->
        <header class="bg-gray-50">
            <div class="container flex items-center justify-between px-4 py-2">
            <div id="openSidebarBtn" class="sm:hidden md:hidden absolute top-4 left-4 cursor-pointer" onclick="openSidebar()">
                    <i class="material-icons-round text-gray-500 hover:text-gray-800 transition duration-300 ease-in-out" style="font-size: 26px;">sort</i>
                </div>
                <div id="closeSidebarBtn" class="sm:hidden md:hidden absolute top-4 right-44 cursor-pointer hidden" onclick="closeSidebar()">
                <i class="material-icons-round text-gray-500 hover:text-gray-800 transition duration-300 ease-in-out" style="font-size: 26px;">close</i>
                </div>
                <!-- Selamat Beraktivitas dan Tanggal -->
                <div class="flex items-center text-left mb-1 hidden lg:flex">
                    <div>
                        <p class="text-stone-900 font-medium tracking-wide text-base">Selamat Beraktivitas</p>
                        <p class="text-sm tracking-wide text-gray-500 leading-3">Senin, 20 November 2023</p>
                    </div>               
                </div>
                <!-- Selamat Beraktivitas dan Tanggal manipulasi -->
                <div class="flex items-center text-left mb-2 ml-auto text-right lg:hidden">
                    <div>
                        <p class="text-stone-900 font-medium tracking-wide text-base">Selamat Beraktivitas</p>
                        <p class="text-sm tracking-wide text-gray-500 leading-3">Senin, 20 November 2023</p>
                    </div>               
                </div>

                <!-- Foto Profil Kecil -->
                <div class="flex items-center hidden sm:hidden md:hidden lg:flex">
                    <img src="{{ asset('images/FotoProfil.jpg') }}" alt="Profile Image" alt="Foto Profil" class="w-10 h-10 rounded-full border border-blue-500 p-0.5">
                </div>
            </div>
        </header>
        <!-- Edit Profile -->
        <div class="flex flex-col px-4 py-6">
            <div class="flex items-center justify-between mb-4">
                <!-- Judul Edit Profile -->
                <h2 class="text-stone-900 font-medium text-xl tracking-wide">Edit Profile</h2>
            </div>
            <!-- Foto Profil dan Judul -->
            <div class="flex flex-col items-center">
                <!-- Judul Foto Profil -->
                <div class="mb-2">
                    <label for="profilePicture" class="text-stone-900 text-base font-medium tracking-wide">Foto Profil</label>
                </div>

                <!-- Lingkaran untuk Preview Foto Profil (menggunakan kelas rounded-full dari Tailwind CSS) -->
                <div class="mb-4">
                    <label for="profilePicture" class="cursor-pointer">
                        <img id="previewProfilePicture" class="w-32 h-32 rounded-full border-4 border-blue-500 p-1" src="https://via.placeholder.com/150" alt="Profile Image">
                    </label>
                </div>

                <!-- Input untuk unggah foto profil -->
                <div>
                    <input type="file" id="profilePicture" name="profilePicture" accept="image/*" class="hidden" onchange="previewProfilePicture(this)">
                </div>
            </div>

            <!-- Kolom Nama -->
            <div class="mb-4">
                <label for="namaLengkap" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nama Lengkap</label>
                <input type="text" placeholder="Masukkan nama lengkap" id="namaLengkap" name="namaLengkap" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Kolom Jabatan -->
            <div class="mb-3">
                <label for="jabatan" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Jabatan</label>
                <input type="text" placeholder="Masukkan jabatan" id="jabatan" name="jabatan" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Kolom e-Mail -->
            <div class="mb-3">
                <label for="email" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">e-Mail</label>
                <input type="email" placeholder="Masukkan e-Mail" id="email" name="email" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Kolom Password Baru -->
            <div class="mb-3">
                <label for="newpassword" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Password Baru</label>
                <input type="password" placeholder="Masukkan password baru" id="newpassword" name="newpassword" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Kolom Konfirmasi Password Baru -->
            <div class="mb-5">
                <label for="confirmnewpassword" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Konfirmasi Password Baru</label>
                <input type="password" placeholder="Konfirmasi password baru" id="confirmnewpassword" name="confirmnewpassword" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Tombol Simpan -->
            <div class="flex items-center mb-20">
                <button class="w-40 h-9 bg-blue-500 hover:bg-blue-700 text-white rounded-md px-3 text-sm font-normal tracking-wide transition focus:border-gray-800 focus:outline-none mr-4">
                    Simpan
                </button>
            </div>        
        </div>
        <!-- Footer -->
        <footer class="text-stone-900 text-sm text-left ml-4 mb-5 mt-auto w-full bg-gray-50">
            &copy; 2023 Sip Arsip. All rights reserved.
        </footer>
    </div>
    <script src="{{asset('js/editprofile.js')}}"></script>
@endsection