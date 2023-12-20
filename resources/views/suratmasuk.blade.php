@extends('layouts.main')
@section('container')
    <div class="h-screen">
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
                    <img src="{{ asset('images/FotoProfil.jpg') }}" alt="Foto Profil"
                        class="w-10 h-10 rounded-full border border-blue-500 p-0.5">
                </div>
            </div>
        </header>
        <!-- Data Surat Masuk -->
        <div class="flex flex-col px-4 py-6">
            <div class="flex items-center justify-between mb-4">
                <!-- Judul Data Surat Masuk -->
                <h2 class="text-stone-900 font-medium text-xl tracking-wide">Data Surat Masuk</h2>

                <!-- Container untuk Kolom Pencarian -->
                <div
                    class="flex items-center w-96 h-9 border-2 border-gray-400 rounded-md bg-transparent focus-within:border-gray-800 transition duration-300">
                    <!-- Logo Search dari Google Icons Rounded -->
                    <div class="flex items-center justify-center w-10 h-9">
                        <i class="material-icons-round text-gray-400 cursor-pointer" style="font-size: 20px;">search</i>
                    </div>

                    <!-- Kolom Pencarian -->
                    <input type="text" placeholder="Cari surat masuk"
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
                            <th class="py-2 px-4 border text-center text-sm">Asal Surat</th>
                            <th class="py-2 px-4 border text-center text-sm">Lampiran</th>
                            <th class="py-2 px-4 border text-center text-sm">Tanggal Surat</th>
                            <th class="py-2 px-4 border text-center text-sm">Perihal</th>
                            <th class="py-2 px-4 border text-center text-sm">Tanggal Simpan</th>
                            <th class="py-2 px-4 border text-center text-sm">Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 border text-sm">
                        <tr>
                            <td class="py-2 px-2 border text-center">1</td>
                            <td class="py-2 px-4 border text-center truncate">Kecamatan Singosari</td>
                            <td class="py-2 px-4 border text-center truncate">2</td>
                            <td class="py-2 px-4 border text-center truncate">13/11/2023</td>
                            <td class="py-2 px-4 border text-center truncate">Undangan Sosialisasi Netralitas Pemilu</td>
                            <td class="py-2 px-4 border text-center">14/11/2023</td>
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
            <div class="flex justify-start mt-4 items-center">
                <a href="/surat-masuk/add"><button
                        class="flex items-center bg-blue-500 text-white font-medium text-xs tracking-wide rounded-md px-3 py-2">
                        Tambah Data
                    </button></a>
            </div>
        </div>
    </div>

    <!-- JavaScript -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.getElementById('mySidebar');

            window.addEventListener('scroll', function() {
                var shouldFix = window.scrollY > 0;

                sidebar.style.position = shouldFix ? 'sticky' : 'static';
            });
        });
    </script>
@endsection