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
                <!-- Selamat Datang -->
                <div class="flex items-center text-left mb-2 hidden lg:flex">
                    <div>
                        <p class="text-stone-900 font-medium tracking-wide text-base">Selamat Datang</p>
                        <p class="text-sm tracking-wide text-gray-500 leading-3">{{ Auth::user()->name }}</p>
                    </div>
                </div>
                <!-- Selamat Datang sm dan md manipulasi-->
                <div class="flex items-center text-left mb-2 ml-auto text-right lg:hidden">
                    <div>
                        <p class="text-stone-900 font-medium tracking-wide text-base">Selamat Datang</p>
                        <p class="text-sm tracking-wide text-gray-500 leading-3">{{ Auth::user()->name }}</p>
                    </div>
                </div>

                <!-- Foto Profil Kecil -->
                <div class="flex items-center hidden sm:hidden md:hidden lg:flex">
                    @if (Auth::user()->foto != null)
                        <img src="{{ asset(Auth::user()->foto) }}" alt="Profile Image" alt="Foto Profil"
                            class="w-10 h-10 rounded-full border border-blue-500 p-0.5">
                    @else
                        <img src="{{ asset('images/FotoProfil.jpg') }}" alt="Profile Image" alt="Foto Profil"
                            class="w-10 h-10 rounded-full border border-blue-500 p-0.5">
                    @endif
                </div>
            </div>
        </header>
        <!-- Dashboard -->
        <div class="flex flex-col px-4 py-6">
            <div class="container flex items-center justify-between">
                <h2 class="text-stone-900 font-medium text-xl tracking-wide">Dashboard</h2>
            </div>

            <div class="flex flex-col sm:flex-col md:flex-col lg:flex-row xl:flex-row 2xl:flex-row mt-4">
                <!-- Rectangle for Surat Masuk -->
                <div
                    class="w-full sm:w-full md:w-full lg:w-48 h-21 border-2 border-blue-500 rounded-md p-4 mb-4 mr-8">
                    <a href="/surat-masuk">
                        <h3 class="text-xl font-medium tracking-wide text-stone-900">Surat Masuk</h3>
                    </a>
                    <p class="text-4xl font-medium text-blue-500">{{ $suratMasuk }}</p>
                </div>

                <!-- Rectangle for Surat Keluar -->
                <div
                    class="w-full sm:w-full md:w-full lg:w-48 h-21 border-2 border-blue-500 rounded-md p-4 mb-4 mr-8">
                    <a href="/surat-keluar">
                        <h3 class="text-xl font-medium tracking-wide text-stone-900">Surat Keluar</h3>
                    </a>
                    <p class="text-4xl font-medium text-blue-500">{{ $suratKeluar }}</p>
                </div>

                <!-- Rectangle for Arsip Dipinjam -->
                <div
                    class="w-full sm:w-full md:w-full lg:w-48 h-21 border-2 border-blue-500 rounded-md p-4 mb-4 mr-8">
                    <a href="/jadwal-retensi">
                        <h3 class="text-xl font-medium tracking-wide text-stone-900">Jadwal Retensi</h3>
                    </a>
                    <p class="text-4xl font-medium text-blue-500">{{ $totaldoc }}</p>
                </div>

                <!-- Rectangle for Jadwal Retensi -->
                <div
                    class="w-full sm:w-full md:w-full lg:w-48 h-21 border-2 border-blue-500 rounded-md p-4 mb-4 mr-8">
                    <a href="/buku-agenda">
                        <h3 class="text-xl font-medium tracking-wide text-stone-900">Buku Agenda</h3>
                    </a>
                    <p class="text-4xl font-medium text-blue-500">{{ $totalsuratRapat }}</p>
                </div>
            </div>

        </div>


        <!-- Footer -->
        <footer class="text-stone-900 text-sm text-left ml-4 mb-5 mt-auto w-full bg-gray-50">
            &copy; 2023 Sip Arsip. All rights reserved.
        </footer>
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
