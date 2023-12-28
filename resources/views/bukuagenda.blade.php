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
        <!-- Data Buku Agenda -->
        <div class="flex flex-col px-4 py-6">
            <div class="flex items-center justify-between mb-4">
                <!-- Judul Data Surat Keluar -->
                <h2 class="text-stone-900 font-medium text-xl tracking-wide">Data Buku Agenda</h2>

                <!-- Container untuk Kolom Pencarian -->
                <div
                    class="flex items-center w-96 h-9 border-2 border-gray-400 rounded-md bg-transparent focus-within:border-gray-800 transition duration-300">
                    <!-- Logo Search dari Google Icons Rounded -->
                    <div class="flex items-center justify-center w-10 h-9">
                        <i class="material-icons-round text-gray-400 cursor-pointer" style="font-size: 20px;">search</i>
                    </div>

                    <!-- Kolom Pencarian -->
                    <form action="/buku-agenda" method="get">
                        <input type="text" placeholder="Cari buku agenda" name="search"
                            class="flex-1 text-sm text-gray-800 font-normal tracking-wide placeholder-gray-300 bg-transparent focus:outline-none">
                    </form>
                </div>
            </div>

            <!-- Tabel -->
            <div class="overflow-x-auto overflow-y-auto mt-2 max-w-full max-h-96">
                <table class="min-w-full min-w-max border">
                    <thead class="bg-blue-500 text-white tracking-wide border font-normal">
                        <tr>
                            <th class="py-2 px-2 border text-center text-sm">No.</th>
                            <th class="py-2 px-4 border text-center text-sm">Asal Surat</th>
                            <th class="py-2 px-4 border text-center text-sm">Tujuan Surat</th>
                            <th class="py-2 px-4 border text-center text-sm">Jenis Surat</th>
                            <th class="py-2 px-4 border text-center text-sm">Tanggal Simpan</th>
                            <th class="py-2 px-4 border text-center text-sm">Tanggal Input</th>
                            <th class="py-2 px-4 border text-center text-sm">Pratinjau File</th>
                            <th class="py-2 px-4 border text-center text-sm">Lampiran</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 border text-sm">
                        @foreach ($suratmasuk as $index => $d)
                            @if ($d->is_rapat == 1)
                                <tr>
                                    <td class="py-2 px-2 border text-center">{{ $index + 1 }}</td>
                                    <td class="py-2 px-4 border text-center truncate">{{ $d->nama_pengirim }}</td>
                                    <td class="py-2 px-4 border text-center truncate">{{ $d->nama_penerima }}</td>
                                    <td class="py-2 px-4 border text-center truncate">Surat Masuk</td>
                                    <td class="py-2 px-4 border text-center">
                                        {{ date('d/m/Y', strtotime($d->tanggal_terima)) }}</td>
                                    <td class="py-2 px-4 border text-center">{{ date('d/m/Y', strtotime($d->created_at)) }}
                                    </td>
                                    <td class="py-2 px-4 border text-center">
                                        @foreach ($d->dokumenSuratMasuk as $dokumen)
                                            <button onclick="openPDFViewer('/dokumen/{{ $dokumen->nama_file }}')"
                                                class="text-white bg-green-500 rounded-md text-xs font-bold tracking-wide px-2 py-0.5 mb-1 flex items-center justify-center">
                                                <i class="material-icons-round mr-2" style="font-size: 15px;">visibility</i>
                                                Lihat Surat {{ $loop->iteration }}
                                            </button>
                                        @endforeach
                                    </td>
                                    <td class="py-2 px-4 border text-center">
                                        @foreach ($d->dokumenSuratMasuk as $dokumen)
                                            <a href="/dokumen/{{ $dokumen->nama_file }}"
                                                class="text-white bg-green-500 rounded-md text-xs font-bold tracking-wide px-2 py-0.5 flex mb-1 items-center justify-center">
                                                <i class="material-icons-round mr-2"
                                                    style="font-size: 15px;">download</i>Download File
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        {{-- menampilkan suratkeluar --}}
                        @foreach ($suratkeluar as $index => $d)
                            @if ($d->is_rapat == 1)
                                <tr>
                                    <td class="py-2 px-2 border text-center">{{ $index + 1 }}</td>
                                    <td class="py-2 px-4 border text-center truncate">{{ $d->nama_pengirim }}</td>
                                    <td class="py-2 px-4 border text-center truncate">{{ $d->nama_penerima }}</td>
                                    <td class="py-2 px-4 border text-center truncate">Surat Keluar</td>
                                    <td class="py-2 px-4 border text-center">
                                        {{ date('d/m/Y', strtotime($d->tanggal_terima)) }}</td>
                                    <td class="py-2 px-4 border text-center">{{ date('d/m/Y', strtotime($d->created_at)) }}
                                    </td>
                                    <td class="py-2 px-4 border text-center">
                                        @foreach ($d->dokumenSuratKeluar as $dokumen)
                                            <button onclick="openPDFViewer('/dokumen/{{ $dokumen->nama_file }}')"
                                                class="text-white bg-green-500 rounded-md text-xs font-bold tracking-wide px-2 py-0.5 mb-1 flex items-center justify-center">
                                                <i class="material-icons-round mr-2" style="font-size: 15px;">visibility</i>
                                                Lihat Surat {{ $loop->iteration }}
                                            </button>
                                        @endforeach
                                    </td>
                                    <td class="py-2 px-4 border text-center">
                                        @foreach ($d->dokumenSuratKeluar as $dokumen)
                                            <a href="/dokumen/{{ $dokumen->nama_file }}"
                                                class="text-white bg-green-500 rounded-md text-xs font-bold tracking-wide px-2 py-0.5 flex mb-1 items-center justify-center">
                                                <i class="material-icons-round mr-2"
                                                    style="font-size: 15px;">download</i>Download File
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Rekap Buku Agenda -->
            <div class="mt-8 mb-1 text-base tracking-wide font-medium text-stone-900">Rekap Buku Agenda</div>
            <!-- Tanggal Awal dan Tanggal Akhir untuk mode layar handphone dan tablet -->
            <div class="flex flex-col md:hidden">
                <!-- Tanggal Awal -->
                <div class="flex flex-col mb-3">
                    <div class="text-xs font-medium tracking-wide text-stone-900 mb-0.5">Tanggal Awal</div>
                    <div
                        class="relative border-2 border-gray-400 rounded-md h-8 w-full flex items-center transition-all duration-300 ease-in-out focus-within:border-gray-800">
                        <input type="text" placeholder="dd/mm/yyyy"
                            class="outline-none tracking-wide px-2 text-sm text-gray-500 flex-grow" />
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="material-icons-round text-gray-400 text-lg" style="font-size: 18px;">date_range</i>
                        </div>
                    </div>
                </div>

                <!-- Tanggal Akhir -->
                <div class="flex flex-col mb-3">
                    <div class="text-xs font-medium tracking-wide text-stone-900 mb-0.5">Tanggal Akhir</div>
                    <div
                        class="relative border-2 border-gray-400 rounded-md h-8 w-full flex items-center transition-all duration-300 ease-in-out focus-within:border-gray-800">
                        <input type="text" placeholder="dd/mm/yyyy"
                            class="outline-none tracking-wide px-2 text-sm text-gray-500 flex-grow" />
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="material-icons-round text-gray-400 text-lg" style="font-size: 18px;">date_range</i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tanggal Awal dan Tanggal Akhir untuk mode layar desktop -->
            <div class="hidden md:flex flex-row">
                <!-- Tanggal Awal -->
                <div class="flex flex-col mb-3">
                    <div class="text-xs font-medium tracking-wide text-stone-900 mb-0.5">Tanggal Awal</div>
                    <div
                        class="relative border-2 border-gray-400 rounded-md h-8 w-72 flex items-center transition-all duration-300 ease-in-out focus-within:border-gray-800">
                        <input type="text" placeholder="dd/mm/yyyy"
                            class="outline-none tracking-wide px-2 text-sm text-gray-500 flex-grow" />
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="material-icons-round text-gray-400 text-lg" style="font-size: 18px;">date_range</i>
                        </div>
                    </div>
                </div>

                <!-- Tanggal Akhir -->
                <div class="flex flex-col ml-4">
                    <div class="text-xs font-medium tracking-wide text-stone-900 mb-0.5">Tanggal Akhir</div>
                    <div
                        class="relative border-2 border-gray-400 rounded-md h-8 w-72 flex items-center transition-all duration-300 ease-in-out focus-within:border-gray-800">
                        <input type="text" placeholder="dd/mm/yyyy"
                            class="outline-none tracking-wide px-2 text-sm text-gray-500 flex-grow" />
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <i class="material-icons-round text-gray-400 text-lg" style="font-size: 18px;">date_range</i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Cetak Buku Agenda -->
            <div class="flex justify-start mb-44 items-center">
                <button
                    class="flex items-center bg-blue-500 text-white font-medium text-xs tracking-wide rounded-md px-3 py-2">
                    Cetak Buku Agenda
                </button>
            </div>
        </div>
        <!-- Footer -->
        <footer class="text-stone-900 text-sm text-left ml-4 mb-5 mt-auto w-full bg-gray-50">
            &copy; 2023 Sip Arsip. All rights reserved.
        </footer>
    </div>
    <script src="{{ asset('js/bukuagenda.js') }}"></script>
@endsection
