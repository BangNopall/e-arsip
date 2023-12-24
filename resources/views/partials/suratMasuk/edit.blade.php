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
                <h2 class="text-stone-900 font-medium text-xl tracking-wide">Edit Data Surat Masuk</h2>
            </div>
            <form action="{{ route('dashboard.surat-masuk.update', ['id' => $suratmasuk->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="perihal" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Perihal</label>
                    <input type="text" placeholder="Masukkan perihal" id="perihal" name="perihal"
                        value="{{ $suratmasuk->perihal }}"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('perihal')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Kolom Nama -->
                <div class="mb-4">
                    <label for="pengirim" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nama
                        Pengirim</label>
                    <input type="text" placeholder="Masukkan nama pengirim" id="pengirim" name="nama_pengirim"
                        value="{{ $suratmasuk->nama_pengirim }}"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('nama_pengirim')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Kolom Nomor Register -->
                <div class="mb-4">
                    <label for="nomor_registrasi" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nomor
                        Register</label>
                    <input type="number" placeholder="Masukkan nomor register" id="nomorRegister" name="nomor_registrasi"
                        value="{{ $suratmasuk->no_registrasi }}"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('nomor_registrasi')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kolom Tanggal Surat, Tanggal Diterima, dan Lampiran -->
                <div class="flex flex-col md:flex-row w-full">
                    <!-- Tanggal Surat -->
                    <div class="flex flex-col mr-0 md:mr-4 mb-4 md:mb-0">
                        <label for="tanggal_surat" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Tanggal
                            Surat</label>
                        <div
                            class="w-full border-2 border-gray-400 rounded-md h-9 flex items-center transition-all duration-300 ease-in-out hover:border-gray-800 focus-within:border-gray-800">
                            <input type="date" placeholder="dd/mm/yyyy" id="tanggal_surat" name="tanggal_surat"
                                value="{{ $suratmasuk->tanggal_surat }}"
                                class="outline-none tracking-wide px-3 text-sm text-gray-500">
                        </div>
                        @error('tanggal_surat')
                            <div class="text-red-500 text-left">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal Diterima -->
                    <div class="flex flex-col mr-0 md:mr-4 mb-4 md:mb-0">
                        <label for="tanggal_diterima"
                            class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Tanggal
                            Diterima</label>
                        <div
                            class="w-full border-2 border-gray-400 rounded-md h-9 flex items-center transition-all duration-300 ease-in-out hover:border-gray-800 focus-within:border-gray-800">
                            <input type="date" placeholder="dd/mm/yyyy" id="tanggal_diterima" name="tanggal_diterima"
                                value="{{ $suratmasuk->tanggal_terima }}"
                                class="outline-none tracking-wide px-3 text-sm text-gray-500 flex-grow">
                        </div>
                        @error('tanggal_diterima')
                            <div class="text-red-500 text-left">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Lampiran -->
                    <div class="flex flex-col">
                        <label for="lampiran"
                            class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Lampiran</label>
                        <input type="number" placeholder="Jumlah lampiran" id="lampiran" name="lampiran"
                            value="{{ $suratmasuk->lampiran }}"
                            class="w-full h-9 border-2 border-gray-400 rounded-md px-3 mb-2 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                        @error('lampiran')
                            <div class="text-red-500 text-left">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Kolom Alamat Asal -->
                <div class="mb-4">
                    <label for="alamat_asal" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Alamat
                        Asal</label>
                    <input type="text" placeholder="Masukkan alamat asal" id="alamatAsal" name="alamat_asal"
                        value="{{ $suratmasuk->alamat_asal }}"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('alamat_asal')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kolom Alamat Sekarang -->
                <div class="mb-6">
                    <label for="alamat_sekarang" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Alamat
                        Sekarang</label>
                    <input type="text" placeholder="Masukkan alamat sekarang" id="alamatSekarang"
                        value="{{ $suratmasuk->alamat_sekarang }}" name="alamat_sekarang"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('alamat_sekarang')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Tombol Upload dan Scan Dokumen -->
                <div class="flex flex-col mb-4">
                    <label class="text-stone-900 text-sm font-medium tracking-wide mb-0.5" for="multiple_files">Upload
                        multiple files</label>
                    <input
                        class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-gray-400 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-stone-900 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none"
                        id="multiple_files" type="file" name="foto[]" multiple>
                    <div class="mt-2 text-sm" id="fileNames"></div>
                    @error('foto[]')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                    {{-- old foto --}}
                    <div class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Dokumen Foto</div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-1 md:gap-2">
                        @foreach ($dokumensurat as $d)
                            <img src="{{ asset($d->path) }}"
                            class="w-[300px] rounded-lg shadow-none transition-shadow duration-300 ease-in-out hover:shadow-lg  hover:shadow-black/30"
                            alt="dokumen-foto" />
                        @endforeach
                    </div>
                </div>
                <!-- Kolom Penerima -->
                <div class="mb-4">
                    <label for="penerima" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nama
                        Penerima</label>
                    <input type="text" placeholder="Masukkan nama penerima" id="penerima" name="nama_penerima"
                        value="{{ $suratmasuk->nama_penerima }}"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('nama_penerima')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Kolom centang "Simpan sebagai agenda rapat" -->
                <div class="flex items-center mb-4">
                    <input type="checkbox" id="simpanAgenda" name="simpanAgenda"
                        class="form-checkbox h-4 w-4 text-blue-500" @if ($suratmasuk->is_rapat == 1) checked @endif>
                    <label for="simpanAgenda" class="ml-2 text-sm text-stone-900 tracking-wide">Simpan sebagai agenda
                        rapat</label>
                </div>
                <!-- Tombol Simpan dan Disposisi -->
                <div class="flex items-center mb-20">
                    <!-- Tombol Simpan -->
                    <button type="submit"
                        class="w-40 h-9 bg-blue-500 hover:bg-blue-700 text-white rounded-md px-3 text-sm font-normal tracking-wide transition focus:border-gray-800 focus:outline-none mr-4">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <footer class="text-stone-900 text-sm text-left ml-4 mb-5 mt-auto w-full bg-gray-50">
        &copy; 2023 Sip Arsip. All rights reserved.
    </footer>
    </div>
    <script src="{{ asset('js/tambahsuratmasuk.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
@endsection
