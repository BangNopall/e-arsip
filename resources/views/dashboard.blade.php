@extends('layouts.main')
@section('container')
    <!-- Top Bar -->
    <div class="h-screen">
        <header class="bg-gray-50">

            <div class="container flex items-center justify-between px-4 py-2">
                <!-- Selamat Datang dan Foto Profil -->
                <div class="flex items-center text-left mb-1">
                    <div>
                        <p class="text-stone-900 font-medium tracking-wide text-base">Selamat Datang</p>
                        <p class="text-sm tracking-wide text-gray-500 leading-3">Agus Salim, S.Sos., M.M</p>
                    </div>
                </div>
                <!-- Fitur Pencarian -->
                <div class="flex items-center">
                    <input type="text" placeholder="Cari berkas"
                        class="text-base text-gray-500 tracking-wide placeholder-gray-300 bg-transparent focus:outline-none">
                    <i class="material-icons-round text-gray-500 cursor-pointer" style="font-size: 21px;">search</i>
                </div>
            </div>
        </header>
        <!-- Dashboard -->
        <div class="flex flex-col px-4 py-6">
            <h2 class="text-stone-900 font-medium text-xl tracking-wide mb-4">Dashboard</h2>
            <div class="flex justify-start">
                <!-- Rectangle for Surat Masuk -->
                <div class="w-48 h-21 border-2 border-blue-500 rounded-md p-4 mr-8">
                    <a href="suratmasuk.html">
                        <h3 class="text-xl font-medium tracking-wide text-stone-900">Surat Masuk</h3>
                    </a>
                    <p class="text-4xl font-medium text-blue-500">10</p>
                </div>
                <!-- Rectangle for Surat Keluar -->
                <div class="w-48 h-21 border-2 border-blue-500 rounded-md p-4 mr-8">
                    <a href="">
                        <h3 class="text-xl font-medium tracking-wide text-stone-900">Surat Keluar</h3>
                    </a>
                    <p class="text-4xl font-medium text-blue-500">5</p>
                </div>
                <!-- Rectangle for Arsip Dipinjam -->
                <div class="w-48 h-21 border-2 border-blue-500 rounded-md p-4 mr-8">
                    <a href="">
                        <h3 class="text-xl font-medium tracking-wide text-stone-900">Arsip Dipinjam</h3>
                    </a>
                    <p class="text-4xl font-medium text-blue-500">3</p>
                </div>
                <!-- Rectangle for Jadwal Retensi -->
                <div class="w-48 h-21 border-2 border-blue-500 rounded-md p-4 mr-8">
                    <a href="">
                        <h3 class="text-xl font-medium tracking-wide text-stone-900">Jadwal Retensi</h3>
                    </a>
                    <p class="text-4xl font-medium text-blue-500">5</p>
                </div>
            </div>
        </div>
    </div>
@endsection
