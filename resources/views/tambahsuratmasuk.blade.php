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
                <h2 class="text-stone-900 font-medium text-xl tracking-wide">Tambah Data Surat Masuk</h2>

                <!-- Container untuk Kolom Pencarian -->
                <div class="flex items-center w-96 h-9 border-2 border-gray-400 rounded-md bg-transparent focus-within:border-gray-800 transition duration-300">
                    <!-- Logo Search dari Google Icons Rounded -->
                    <div class="flex items-center justify-center w-10 h-9">
                        <i class="material-icons-round text-gray-400 cursor-pointer" style="font-size: 20px;">search</i>
                    </div>

                    <!-- Kolom Pencarian -->
                    <input type="text" placeholder="Cari surat masuk" class="flex-1 text-sm text-gray-800 font-normal tracking-wide placeholder-gray-300 bg-transparent focus:outline-none">

                    <!-- Logo Filter dari Google Icons Rounded -->
                    <div class="flex items-center justify-center w-10 h-9">
                        <i class="material-icons-round text-gray-400 cursor-pointer" style="font-size: 20px;">tune</i>
                    </div>
                </div>
            </div>
            <!-- Kolom Nama -->
            <div class="mb-4">
                <label for="pengirim" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nama Pengirim</label>
                <input type="text" placeholder="Masukkan nama pengirim" id="pengirim" name="pengirim" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Kolom Nomor Register -->
            <div class="mb-4">
                <label for="nomorRegister" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nomor Register</label>
                <input type="text" placeholder="Masukkan nomor register" id="nomorRegister" name="nomorRegister" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
    
            <!-- Kolom Tanggal Surat, Tanggal Diterima, dan Lampiran -->
            <div class="hidden md:flex flex-row">
                <!-- Tanggal Surat -->
                <div class="flex flex-col mr-4">
                    <label for="tanggalSurat" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Tanggal Surat</label>
                    <div class="relative border-2 border-gray-400 rounded-md h-9 w-80 flex items-center transition-all duration-300 ease-in-out hover:border-gray-800 focus-within:border-gray-800">
                        <input type="text" placeholder="dd/mm/yyyy" id="tanggalSurat" name="tanggalSurat" class="outline-none tracking-wide px-3 text-sm text-gray-500 flex-grow"/>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="material-icons-round text-gray-400" style="font-size: 18px;">date_range</i>
                        </div>
                    </div>
                </div>
    
                <!-- Tanggal Diterima -->
                <div class="flex flex-col mr-4">
                    <label for="tanggalDiterima" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Tanggal Diterima</label>
                    <div class="relative border-2 border-gray-400 rounded-md h-9 w-80 flex items-center transition-all duration-300 ease-in-out hover:border-gray-800 focus-within:border-gray-800">
                        <input type="text" placeholder="dd/mm/yyyy" id="tanggalDiterima" name="tanggalDiterima" class="outline-none tracking-wide px-3 text-sm text-gray-500 flex-grow"/>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="material-icons-round text-gray-400" style="font-size: 18px;">date_range</i>
                        </div>
                    </div>
                </div>
    
                <!-- Lampiran -->
                <div class="flex flex-col">
                    <label for="lampiran" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Lampiran</label>
                    <input type="text" placeholder="Jumlah lampiran" id="lampiran" name="lampiran" class="w-72 h-9 border-2 border-gray-400 rounded-md px-3 mb-2 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                </div>
            </div>
            <!-- Kolom Tanggal Surat, Tanggal Diterima, dan Lampiran layar HP dan Tab -->
            <div class="flex flex-col md:hidden">
                <!-- Tanggal Surat -->
                <div class="flex flex-col mb-4">
                    <label for="tanggalSurat" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Tanggal Surat</label>
                    <div class="relative border-2 border-gray-400 rounded-md h-9 w-full flex items-center transition-all duration-300 ease-in-out hover:border-gray-800 focus-within:border-gray-800">
                        <input type="text" placeholder="dd/mm/yyyy" id="tanggalSurat" name="tanggalSurat" class="outline-none tracking-wide px-3 text-sm text-gray-500 flex-grow"/>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="material-icons-round text-gray-400" style="font-size: 18px;">date_range</i>
                        </div>
                    </div>
                </div>
    
                <!-- Tanggal Diterima -->
                <div class="flex flex-col mb-4">
                    <label for="tanggalDiterima" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Tanggal Diterima</label>
                    <div class="relative border-2 border-gray-400 rounded-md h-9 w-full flex items-center transition-all duration-300 ease-in-out hover:border-gray-800 focus-within:border-gray-800">
                        <input type="text" placeholder="dd/mm/yyyy" id="tanggalDiterima" name="tanggalDiterima" class="outline-none tracking-wide px-3 text-sm text-gray-500 flex-grow"/>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="material-icons-round text-gray-400" style="font-size: 18px;">date_range</i>
                        </div>
                    </div>
                </div>
    
                <!-- Lampiran -->
                <div class="flex flex-col mb-4">
                    <label for="lampiran" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Lampiran</label>
                    <input type="text" placeholder="Jumlah lampiran" id="lampiran" name="lampiran" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                </div>
            </div>
            <!-- Kolom Alamat Asal -->
            <div class="mb-4">
                <label for="alamatAsal" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Alamat Asal</label>
                <input type="text" placeholder="Masukkan alamat asal" id="alamatAsal" name="alamatAsal" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>

            <!-- Kolom Alamat Sekarang -->
            <div class="mb-6">
                <label for="alamatSekarang" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Alamat Sekarang</label>
                <input type="text" placeholder="Masukkan alamat sekarang" id="alamatSekarang" name="alamatSekarang" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Tombol Upload dan Scan Dokumen -->
            <div class="flex items-center mb-4">
                <!-- Tombol Upload Dokumen -->
                <button class="w-48 h-9 bg-green-500 hover:bg-green-600 text-white rounded-md px-3 text-sm font-normal tracking-wide transition focus:border-gray-800 focus:outline-none mr-4">
                    Upload Dokumen
                </button>
                        
                <!-- Tombol Scan Dokumen -->
                <button class="w-48 h-9 bg-green-500 hover:bg-green-600 text-white rounded-md px-3 text-sm font-normal tracking-wide transition focus:border-gray-800 focus:outline-none">
                    Scan Dokumen
                </button>
            </div>
            <!-- Kolom Penerima -->
            <div class="mb-4">
                <label for="penerima" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nama Penerima</label>
                <input type="text" placeholder="Masukkan nama penerima" id="penerima" name="penerima" class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
            </div>
            <!-- Kolom centang "Simpan sebagai agenda rapat" -->
            <div class="flex items-center mb-4">
                <input type="checkbox" id="simpanAgenda" name="simpanAgenda" class="form-checkbox h-4 w-4 text-blue-500">
                <label for="simpanAgenda" class="ml-2 text-sm text-stone-900 tracking-wide">Simpan sebagai agenda rapat</label>
            </div>
            <!-- Tombol Simpan dan Disposisi -->
            <div class="flex items-center mb-20">
                <!-- Tombol Simpan -->
                <button class="w-40 h-9 bg-blue-500 hover:bg-blue-700 text-white rounded-md px-3 text-sm font-normal tracking-wide transition focus:border-gray-800 focus:outline-none mr-4">
                    Simpan
                </button>
                        
                <!-- Tombol Scan Dispoosisi -->
                <a href="inputdisposisi.html"><button class="w-40 h-9 bg-blue-500 hover:bg-blue-700 text-white rounded-md px-3 text-sm font-normal tracking-wide transition focus:border-gray-800 focus:outline-none">
                    Disposisi
                </button>
            </div>        
        </div>
        <!-- Footer -->
        <footer class="text-stone-900 text-sm text-left ml-4 mb-5 mt-auto w-full bg-gray-50">
            &copy; 2023 Sip Arsip. All rights reserved.
        </footer>
    </div>
    <script src="{{asset('js/tambahsuratmasuk.js')}}"></script>
@endsection