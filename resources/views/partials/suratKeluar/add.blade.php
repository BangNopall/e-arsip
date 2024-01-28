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
                        <p class="text-sm tracking-wide text-gray-500 leading-3">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
                    </div>
                </div>
                <!-- Selamat Beraktivitas dan Tanggal manipulasi -->
                <div class="flex items-center text-left mb-2 ml-auto text-right lg:hidden">
                    <div>
                        <p class="text-stone-900 font-medium tracking-wide text-base">Selamat Beraktivitas</p>
                        <p class="text-sm tracking-wide text-gray-500 leading-3">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
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
        <!-- Data Surat Keluar -->
        <div class="flex flex-col px-4 py-6">
            <div class="flex items-center justify-between mb-4">
                <!-- Judul Data Surat Masuk -->
                <h2 class="text-stone-900 font-medium text-xl tracking-wide">Tambah Data Surat Keluar</h2>
            </div>
            <form action="{{ route('dashboard.surat-keluar.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="pengirim" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nama
                        Pengirim</label>
                    <input type="text" placeholder="Masukkan nama pengirim" id="pengirim" name="nama_pengirim"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('nama_pengirim')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Kolom Nomor Surat -->
                <div class="mb-4">
                    <label for="nomorRegister" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nomor
                        Surat</label>
                    <input type="text" placeholder="Masukkan nomor surat" id="nomorRegister" name="nomor_surat"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('nomor_surat')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Tanggal Surat -->
                <div class="flex flex-col mb-3.5">
                    <label for="tanggalSurat" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Tanggal
                        Surat</label>
                    <div
                        class="relative border-2 border-gray-400 rounded-md h-9 w-full flex items-center transition-all duration-300 ease-in-out hover:border-gray-800 focus-within:border-gray-800">
                        <input type="date" placeholder="dd/mm/yyyy" id="tanggalSurat" name="tanggal_surat"
                            class="outline-none tracking-wide px-3 text-sm text-gray-500 flex-grow" />
                        @error('tanggal_surat')
                            <div class="text-red-500 text-left">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Kolom Nama Penerima -->
                <div class="mb-4">
                    <label for="namaPenerima" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nama
                        Penerima</label>
                    <input type="text" placeholder="Masukkan nama penerima" id="namaPenerima" name="nama_penerima"
                    
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('nama_penerima')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kolom Isi Surat -->
                <div class="mb-6">
                    <label for="isiSurat" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Isi Surat</label>
                    <input type="text" placeholder="Masukkan isi surat" id="isiSurat" name="isi_surat"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('isi_surat')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Tombol Upload dan Scan Dokumen -->
                <div class="flex flex-col mb-4">
                    <label class="text-stone-900 text-sm font-medium tracking-wide mb-0.5" for="multiple_files">Upload
                        multiple files</label>
                    <input
                        class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-gray-400 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-stone-900 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none"
                        id="multiple_files" type="file" name="dok[]" accept=".pdf,.docx,.doc,.ppt,.txt,.pptx,.txt,.xlx,.xlxs" multiple>
                    <div class="mt-2 text-sm" id="fileNames"></div>
                    @error('dok[]')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Kolom Penanggung Jawab -->
                <div class="mb-4">
                    <label for="penanggungJawab" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Penanggung
                        Jawab</label>
                    <input type="text" placeholder="Masukkan nama penanggung jawab" id="penanggungJawab"
                        name="penanggungjawab"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('penanggungjawab')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex items-center mb-4">
                    <input type="checkbox" id="simpanAgenda" name="simpanAgenda"
                        class="form-checkbox h-4 w-4 text-blue-500">
                    <label for="simpanAgenda" class="ml-2 text-sm text-stone-900 tracking-wide">Simpan sebagai agenda
                        rapat</label>
                </div>
                <!-- Tombol Simpan dan Disposisi -->
                <div class="flex items-center mb-20">
                    <!-- Tombol Simpan -->
                    <button type="submit"
                        class="w-40 h-9 bg-blue-500 hover:bg-blue-700 text-white rounded-md px-3 mb-12 text-sm font-normal tracking-wide transition focus:border-gray-800 focus:outline-none mr-4">
                        Simpan
                    </button>
                </div>
            </form>
            <!-- Kolom Nama -->

        </div>
        <!-- Footer -->
        <footer class="text-stone-900 text-sm text-left ml-4 mb-5 mt-auto w-full bg-gray-50">
            &copy; 2023 Sip Arsip. All rights reserved.
        </footer>
    </div>
    <script src="{{ asset('js/tambahsuratkeluar.js') }}"></script>
@endsection
