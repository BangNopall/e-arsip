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
        <!-- Data Surat Masuk -->
        <div class="flex flex-col px-4 py-6">
            <div class="flex items-center justify-between mb-4">
                <!-- Judul Data Surat Masuk -->
                <h2 class="text-stone-900 font-medium text-xl tracking-wide">Tambah Data Surat Register Keluar</h2>
            </div>
            <!-- Kolom Nama -->
            <div class="mb-4">
                <label for="namaLengkap" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nama Lengkap</label>
                <input type="text" placeholder="Masukkan nama lengkap" id="namaLengkap" name="namaLengkap" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Kolom NIK -->
            <div class="mb-4">
                <label for="nik" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nomor Induk Kependudukan (NIK)</label>
                <input type="text" placeholder="Masukkan NIK" id="nik" name="nik" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Kolom Tanggal Lahir -->
            <div class="mb-4">
                <label for="tanggalLahir" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Tanggal Lahir</label>
                <div class="relative border-2 border-gray-400 rounded-md h-9 w-full flex items-center transition-all duration-300 ease-in-out hover:border-gray-800 focus-within:border-gray-800">
                    <input type="text" placeholder="dd/mm/yyyy" id="tanggalLahir" name="tanggalLahir" class="outline-none tracking-wide px-3 text-sm text-gray-500 flex-grow"/>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <i class="material-icons-round text-gray-400" style="font-size: 18px;">date_range</i>
                    </div>
                </div>            
            </div>
            <!-- Kolom Status -->
            <div class="mb-4">
                <label for="status" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Status</label>
                <input type="text" placeholder="Masukkan status" id="status" name="status" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Kolom Jenis Kelamin -->
            <div class="mb-4">
                <label for="jenisKelamin" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Jenis Kelamin</label>
                <input type="text" placeholder="Masukkan jenis kelamin" id="jenisKelamin" name="jenisKelamin" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Kolom Pekerjaan -->
            <div class="mb-4">
                <label for="pekerjaan" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Pekerjaan</label>
                <input type="text" placeholder="Masukkan pekerjaan" id="pekerjaan" name="pekerjaan" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Kolom Alamat Asal -->
            <div class="mb-4">
                <label for="alamatAsal" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Alamat Asal</label>
                <input type="text" placeholder="Masukkan alamat asal" id="alamatAsal" name="alamatAsal" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>

            <!-- Kolom Alamat Pindah -->
            <div class="mb-4">
                <label for="alamatPindah" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Alamat Pindah</label>
                <input type="text" placeholder="Masukkan alamat pindah" id="alamatPindah" name="alamatPindah" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Kolom Tanggal Surat -->
            <div class="mb-4">
                <label for="tanggalSurat" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Tanggal Surat</label>
                <div class="relative border-2 border-gray-400 rounded-md h-9 w-full flex items-center transition-all duration-300 ease-in-out hover:border-gray-800 focus-within:border-gray-800">
                    <input type="text" placeholder="dd/mm/yyyy" id="tanggalSurat" name="tanggalSurat" class="outline-none tracking-wide px-3 text-sm text-gray-500 flex-grow"/>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <i class="material-icons-round text-gray-400" style="font-size: 18px;">date_range</i>
                    </div>
                </div>            
            </div>
            <!-- Kolom Keterangan -->
            <div class="mb-4">
                <label for="keterangan" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Keterangan</label>
                <input type="text" placeholder="Masukkan keterangan" id="keterangan" name="keterangan" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Kolom Penanggung Jawab -->
            <div class="mb-4">
                <label for="penanggungJawab" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Penanggung Jawab</label>
                <input type="text" placeholder="Masukkan penanggung jawab" id="penanggungJawab" name="penanggungJawab" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 mb-2 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Tombol Simpan -->
            <div class="flex items-center mb-20">
                <!-- Tombol Simpan -->
                <button class="w-40 h-9 bg-blue-500 hover:bg-blue-700 text-white rounded-md px-3 mb-8 text-sm font-normal tracking-wide transition focus:border-gray-800 focus:outline-none mr-4">
                    Simpan
                </button>
            </div>        
        </div>
        <!-- Footer -->
        <footer class="text-stone-900 text-sm text-left ml-4 mb-5 mt-auto w-full bg-gray-50">
            &copy; 2023 Sip Arsip. All rights reserved.
        </footer>
    </div>
    <script src="{{asset('js/tambahregisterkeluar.js')}}"></script>
@endsection