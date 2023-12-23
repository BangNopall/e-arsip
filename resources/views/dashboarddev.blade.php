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
                <!-- Selamat Datang -->
                <div class="flex items-center text-left mb-2 hidden lg:flex">
                    <div>
                        <p class="text-stone-900 font-medium tracking-wide text-base">Selamat Datang</p>
                        <p class="text-sm tracking-wide text-gray-500 leading-3">Agus Salim, S.Sos., M.M</p>
                    </div>               
                </div>
                <!-- Selamat Datang sm dan md manipulasi-->
                <div class="flex items-center text-left mb-2 ml-auto text-right lg:hidden">
                    <div>
                        <p class="text-stone-900 font-medium tracking-wide text-base">Selamat Datang</p>
                        <p class="text-sm tracking-wide text-gray-500 leading-3">Agus Salim, S.Sos., M.M</p>
                    </div>               
                </div>

                <!-- Fitur Pencarian -->
                <div class="flex items-center hidden sm:hidden md:hidden lg:flex">
                    <input type="text" placeholder="Cari berkas" class="text-base text-gray-500 tracking-wide placeholder-gray-300 bg-transparent focus:outline-none">
                    <i class="material-icons-round text-gray-500 cursor-pointer" style="font-size: 21px;">search</i>
                </div>
            </div>
        </header>
        <!-- Dashboard -->
        <div class="flex flex-col px-4 py-6">
            <div class="container flex items-center justify-between">
                <h2 class="text-stone-900 font-medium text-xl tracking-wide">Dashboard</h2>
                <!-- Fitur Pencarian -->
                <div class="flex items-center sm:flex md:flex lg:hidden xl:hidden 2xl:hidden">
                    <input type="text" placeholder="Cari berkas" class="text-base text-gray-500 tracking-wide placeholder-gray-300 bg-transparent focus:outline-none">
                    <i class="material-icons-round text-gray-500 cursor-pointer" style="font-size: 21px;">search</i>
                </div>
            </div>
    
            <div class="flex flex-col sm:flex-col md:flex-col lg:flex-row xl:flex-row 2xl:flex-row mt-4">
                <!-- Rectangle for Surat Masuk -->
                <div class="w-full sm:w-full md:w-full lg:w-48 xl:w-48 2xl:w-48 h-21 border-2 border-blue-500 rounded-md p-4 mb-4 mr-8">
                    <a href="suratmasuk.html"><h3 class="text-xl font-medium tracking-wide text-stone-900">Surat Masuk</h3></a>
                    <p class="text-4xl font-medium text-blue-500">10</p>
                </div>
            
                <!-- Rectangle for Surat Keluar -->
                <div class="w-full sm:w-full md:w-full lg:w-48 xl:w-48 2xl:w-48 h-21 border-2 border-blue-500 rounded-md p-4 mb-4 mr-8">
                    <a href=""><h3 class="text-xl font-medium tracking-wide text-stone-900">Surat Keluar</h3></a>
                    <p class="text-4xl font-medium text-blue-500">5</p>
                </div>
            
                <!-- Rectangle for Arsip Dipinjam -->
                <div class="w-full sm:w-full md:w-full lg:w-48 xl:w-48 2xl:w-48 h-21 border-2 border-blue-500 rounded-md p-4 mb-4 mr-8">
                    <a href=""><h3 class="text-xl font-medium tracking-wide text-stone-900">Arsip Dipinjam</h3></a>
                    <p class="text-4xl font-medium text-blue-500">3</p>
                </div>
            
                <!-- Rectangle for Jadwal Retensi -->
                <div class="w-full sm:w-full md:w-full lg:w-48 xl:w-48 2xl:w-48 h-21 border-2 border-blue-500 rounded-md p-4 mb-4 mr-8">
                    <a href=""><h3 class="text-xl font-medium tracking-wide text-stone-900">Jadwal Retensi</h3></a>
                    <p class="text-4xl font-medium text-blue-500">5</p>
                </div>
            </div>
                                    
        </div>

        
        <!-- Footer -->
        <footer class="text-stone-900 text-sm text-left ml-4 mb-5 mt-auto w-full bg-gray-50">
            &copy; 2023 Sip Arsip. All rights reserved.
        </footer>
    </div>
    <script src="{{asset('js/dashboard.js')}}"></script>
@endsection