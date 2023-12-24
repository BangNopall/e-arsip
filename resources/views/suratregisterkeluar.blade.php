@extends('layouts.main')
@section('container')
    <!-- Main Content -->
    <div id="myMaincontent" class="flex-1 flex flex-col overflow-hidden font-Poppins relative">
        <!-- Top Bar -->
        <header class="bg-gray-50">
            <div class="container flex items-center justify-between px-4 py-2">
                <div id="openSidebarBtn" class="sm:hidden md:hidden absolute top-4 left-4 cursor-pointer"
                    onclick="openSidebar()">
                    <i class="material-icons-round text-gray-500 hover:text-gray-800 transition duration-300 ease-in-out"
                        style="font-size: 26px;">sort</i>
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
                    <img src="{{ asset('images/FotoProfil.jpg') }}" alt="Foto Profil"
                        class="w-10 h-10 rounded-full border border-blue-500 p-0.5">
                </div>
            </div>
        </header>
        <!-- Data Surat Masuk -->
        <div class="flex flex-col px-4 py-6">
            <div class="flex items-center justify-between mb-4">
                <!-- Judul Data Surat Masuk -->
                <h2 class="text-stone-900 font-medium text-xl tracking-wide">Data Surat Register Keluar</h2>

                <!-- Container untuk Kolom Pencarian -->
                <div
                    class="flex items-center w-96 h-9 border-2 border-gray-400 rounded-md bg-transparent focus-within:border-gray-800 transition duration-300">
                    <!-- Logo Search dari Google Icons Rounded -->
                    <div class="flex items-center justify-center w-10 h-9">
                        <i class="material-icons-round text-gray-400 cursor-pointer" style="font-size: 20px;">search</i>
                    </div>

                    <!-- Kolom Pencarian -->
                    <input type="text" placeholder="Cari surat register keluar"
                        class="flex-1 text-sm text-gray-800 font-normal tracking-wide placeholder-gray-300 bg-transparent focus:outline-none">

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
                            <th class="py-2 px-4 border text-center text-sm">Nama</th>
                            <th class="py-2 px-4 border text-center text-sm">NIK</th>
                            <th class="py-2 px-4 border text-center text-sm">Tanggal Lahir</th>
                            <th class="py-2 px-4 border text-center text-sm">Status</th>
                            <th class="py-2 px-4 border text-center text-sm">L/P</th>
                            <th class="py-2 px-4 border text-center text-sm">Pekerjaan</th>
                            <th class="py-2 px-4 border text-center text-sm">Alamat Asal</th>
                            <th class="py-2 px-4 border text-center text-sm">Alamat Pindah</th>
                            <th class="py-2 px-4 border text-center text-sm">Tanggal Surat</th>
                            <th class="py-2 px-4 border text-center text-sm">Keterangan</th>
                            <th class="py-2 px-4 border text-center text-sm">Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 border text-sm">
                        <tr>
                            <td class="py-2 px-2 border text-center">1</td>
                            <td class="py-2 px-4 border text-center">Muhammad Daga Perkasa</td>
                            <td class="py-2 px-4 border text-center">3507222904020002</td>
                            <td class="py-2 px-4 border text-center">29 April 2002</td>
                            <td class="py-2 px-4 border text-center">Belum Kawin</td>
                            <td class="py-2 px-4 border text-center">L</td>
                            <td class="py-2 px-4 border text-center">Mahasiswa</td>
                            <td class="py-2 px-4 border text-center">RT 07</td>
                            <td class="py-2 px-4 border text-center">-</td>
                            <td class="py-2 px-4 border text-center">14/11/2023</td>
                            <td class="py-2 px-4 border text-center">Pengajuan Proposal Bersih Desa</td>
                            <td class="py-2 px-2 text-center"
                                style="display: flex; align-items: center; justify-content: center;">
                                <a href="#"
                                    class="text-white bg-blue-500 rounded-md text-xs font-bold tracking-wide px-4 py-0.5 mr-2">Edit</a>
                                <a href="#"
                                    class="text-white bg-red-500 rounded-md text-xs font-bold tracking-wide px-4 py-0.5">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tombol Tambah Data -->
            <div class="flex justify-start mt-5 mb-48 items-center">
                <a href="inputsuratkeluar.html"><button
                        class="flex items-center bg-blue-500 text-white font-medium text-xs tracking-wide rounded-md px-3 py-2">
                        Tambah Data
                    </button></a>
            </div>
        </div>
        <!-- Footer -->
        <footer class="text-stone-900 text-sm text-left ml-4 mb-5 mt-auto w-full bg-gray-50">
            &copy; 2023 Sip Arsip. All rights reserved.
        </footer>
    </div>
    <script src="{{ asset('js/suratregisterkeluar.js') }}"></script>
@endsection
