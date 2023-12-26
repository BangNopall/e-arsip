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
                    <img src="{{ asset('images/FotoProfil.jpg') }}" alt="Profile Image" alt="Foto Profil"
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
                    <form action="/surat-masuk" method="get">
                        <input type="text" placeholder="Cari surat masuk" name="search"
                            class="flex-1 text-sm text-gray-800 font-normal tracking-wide placeholder-gray-300 bg-transparent focus:outline-none">
                    </form>
                </div>
            </div>
            @if (session()->has('success'))
                <div id="alert-border-3"
                    class="rounded flex items-center p-3 mb-2 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            @if (session()->has('error'))
                <div id="alert-border-2"
                    class="rounded flex items-center p-3 mb-2 text-red-800 border-t-4 border-red-300 bg-red-50"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('error') }}
                    </div>
                </div>
            @endif
            <!-- Tabel -->
            <div class="overflow-x-auto mt-2 max-w-full max-h-96">
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
                        @foreach ($suratmasuk as $index => $d)
                            <tr>
                                <td class="py-2 px-2 border text-center">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border text-center truncate">{{ $d->alamat_asal }}</td>
                                <td class="py-2 px-4 border text-center truncate">{{ $d->lampiran }}</td>
                                <td class="py-2 px-4 border text-center truncate">
                                    {{ date('d/m/Y', strtotime($d->tanggal_surat)) }}</td>
                                <td class="py-2 px-4 border text-center truncate">{{ $d->perihal }}</td>
                                <td class="py-2 px-4 border text-center">{{ date('d/m/Y', strtotime($d->tanggal_terima)) }}
                                </td>
                                <td class="py-2 px-2 text-center"
                                    style="display: flex; align-items: center; justify-content: center;">
                                    <form action="{{ route('dashboard.surat-masuk.edit', ['id' => $d->id]) }}"
                                        method="GET">
                                        <button type="submit"
                                            class="text-white bg-blue-500 rounded-md text-xs font-bold tracking-wide px-4 py-0.5 mr-2">Edit</button>
                                    </form>
                                    <form action="{{ route('dashboard.surat-masuk.delete', ['id' => $d->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button
                                            class="text-white bg-red-500 rounded-md text-xs font-bold tracking-wide px-4 py-0.5">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Tombol Tambah Data -->
            <div class="flex justify-start mt-5 mb-48 items-center">
                <a href="/surat-masuk/add"><button
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
    <script src="{{ asset('js/suratmasuk.js') }}"></script>
@endsection
