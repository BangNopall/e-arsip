@extends('layouts.main')
@section('container')
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
            <h2 class="text-stone-900 font-medium text-xl tracking-wide">Tambah Data Surat Masuk</h2>
        </div>
        <!-- Kolom Nama -->
        <form action="{{ route('dashboard.surat-masuk.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama_pengirim" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nama
                    Pengirim</label>
                <input type="text" placeholder="Masukkan nama pengirim" id="pengirim" name="nama_pengirim"
                    class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none" required>
                @error('nama_pengirim')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kolom Nomor Register -->
            <div class="mb-4">
                <label for="nomor_registrasi" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nomor
                    Register</label>
                <input type="text" placeholder="Masukkan nomor register" id="nomorRegister" name="nomor_registrasi"
                    class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none" required>
                @error('nomor_registrasi')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kolom Tanggal Surat, Tanggal Diterima, dan Lampiran -->
            <div class="flex flex-row mb-1.5">
                <!-- Tanggal Surat -->
                <div class="flex flex-col mr-4">
                    <label for="tanggal_surat" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Tanggal
                        Surat</label>
                    <div
                        class="relative border-2 border-gray-400 rounded-md h-9 w-80 flex items-center transition-all duration-300 ease-in-out hover:border-gray-800 focus-within:border-gray-800">
                        <input type="date" placeholder="dd/mm/yyyy" id="tanggalSurat" name="tanggal_surat"
                            class="outline-none tracking-wide px-3 text-sm text-gray-500 flex-grow" required>
                    </div>
                    @error('tanggal_surat')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Diterima -->
                <div class="flex flex-col mr-4">
                    <label for="tanggal_diterima" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Tanggal
                        Diterima</label>
                    <div
                        class="relative border-2 border-gray-400 rounded-md h-9 w-80 flex items-center transition-all duration-300 ease-in-out hover:border-gray-800 focus-within:border-gray-800">
                        <input type="date" placeholder="dd/mm/yyyy" id="tanggalDiterima" name="tanggal_diterima"
                            class="outline-none tracking-wide px-3 text-sm text-gray-500 flex-grow" required>
                    </div>
                    @error('tanggal_diterima')
                        <div class="text-red-500 text-left">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Lampiran -->
                <div class="flex flex-col">
                    <label for="lampiran" class="text-sm font-medium tracking-wide text-stone-900 mb-0.5">Lampiran</label>
                    <input type="number" placeholder="Jumlah lampiran" id="lampiran" name="lampiran"
                        class="w-72 h-9 border-2 border-gray-400 rounded-md px-3 mb-2 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none" required>
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
                    class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none" required>
                @error('alamat_asal')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kolom Alamat Sekarang -->
            <div class="mb-6">
                <label for="alamat_sekarang" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Alamat
                    Sekarang</label>
                <input type="text" placeholder="Masukkan alamat sekarang" id="alamatSekarang" name="alamat_sekarang"
                    class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none" required>
                @error('alamat_sekarang')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>
            <!-- Tombol Upload dan Scan Dokumen -->
            <div class="flex flex-col mb-4">
                <input type="file" multiple
                    class="w-64 h-9 border border-gray-300 rounded-md px-3 py-2 text-sm leading-4 focus:outline-none focus:border-blue-500 mt-2"
                    name="foto[]" id="fileInput" required>

                <div class="mt-2 text-sm" id="fileNames"></div>
            </div>
            <!-- Kolom Penerima -->
            <div class="mb-4">
                <label for="nama_penerima" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nama
                    Penerima</label>
                <input type="text" placeholder="Masukkan nama penerima" id="penerima" name="nama_penerima"
                    class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none" required>
                @error('nama_penerima')
                    <div class="text-red-500 text-left">{{ $message }}</div>
                @enderror
            </div>
            <!-- Kolom centang "Simpan sebagai agenda rapat" -->
            <div class="flex items-center mb-4">
                <input type="checkbox" id="simpanAgenda" name="simpanAgenda" class="form-checkbox h-4 w-4 text-blue-500">
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

                <!-- Tombol Scan Dispoosisi -->
                <a href="/disposisi/add"><button
                        class="w-40 h-9 bg-blue-500 hover:bg-blue-700 text-white rounded-md px-3 text-sm font-normal tracking-wide transition focus:border-gray-800 focus:outline-none">
                        Disposisi
                    </button>
            </div>
        </form>
    </div>

    <script>
        // Mendapatkan elemen input dan div pratinjau
        const fileInput = document.getElementById('fileInput');
        const fileNamesDiv = document.getElementById('fileNames');

        // Menangani peristiwa pemilihan dokumen
        fileInput.addEventListener('change', function() {
            // Menghapus pratinjau nama dokumen sebelumnya
            fileNamesDiv.innerHTML = '';

            // Menampilkan nama dokumen yang dipilih
            for (const file of fileInput.files) {
                const fileNameDiv = document.createElement('div');
                fileNameDiv.textContent = file.name;
                fileNamesDiv.appendChild(fileNameDiv);
            }
        });
    </script>

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
