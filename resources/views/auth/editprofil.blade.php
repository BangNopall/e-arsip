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
        <!-- Edit Profile -->
        <div class="flex flex-col px-4 py-6">
            <div class="flex items-center justify-between mb-4">
                <!-- Judul Edit Profile -->
                <h2 class="text-stone-900 font-medium text-xl tracking-wide">Edit Profile</h2>
            </div>
            @if (session()->has('success'))
                <div id="alert-3" class="flex items-center p-4 mb-2 text-green-800 rounded-lg bg-green-200"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-green-200 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                        data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            @if (session()->has('error'))
                <div id="alert-2" class="flex items-center p-4 mb-2 text-red-800 rounded-lg bg-red-200" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('error') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-200 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                        data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            <form action="{{ route('dashboard.update-profil') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col items-center">
                    <!-- Judul Foto Profil -->
                    <div class="mb-2">
                        <label for="profilePicture" class="text-stone-900 text-base font-medium tracking-wide">Foto
                            Profil</label>
                    </div>

                    <!-- Lingkaran untuk Preview Foto Profil (menggunakan kelas rounded-full dari Tailwind CSS) -->
                    <div class="mb-4">
                        <label for="profilePicture" class="cursor-pointer">
                            @if ($user->foto != null)
                                <img id="previewProfilePicture" class="w-32 h-32 rounded-full border-4 border-blue-500 p-1"
                                    src="{{ asset($user->foto) }}" alt="Profile Image">
                            @else
                                <img id="previewProfilePicture" class="w-32 h-32 rounded-full border-4 border-blue-500 p-1"
                                    src="https://via.placeholder.com/150" alt="Profile Image">
                            @endif
                        </label>
                    </div>

                    <!-- Input untuk unggah foto profil -->
                    <div>
                        <input type="file" id="profilePicture" name="foto" accept="image/*" class="hidden"
                            onchange="previewImage(this)">
                    </div>
                    @error('foto')
                        <div class="text-red-500 mt-1 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Kolom Nama -->
                <div class="mb-4">
                    <label for="namaLengkap" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nama
                        Lengkap</label>
                    <input type="text" placeholder="Masukkan nama lengkap" id="namaLengkap" name="name"
                        value="{{ $user->name }}"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('name')
                        <div class="text-red-500 mt-1 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Kolom Jabatan -->
                <div class="mb-3">
                    <label for="jabatan" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Jabatan</label>
                    <input type="text" placeholder="Masukkan jabatan" id="jabatan" name="jabatan"
                        value="{{ $user->jabatan }}"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('jabatan')
                        <div class="text-red-500 mt-1 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Kolom e-Mail -->
                <div class="mb-3">
                    <label for="email" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">e-Mail</label>
                    <input type="email" placeholder="Masukkan e-Mail" id="email" name="email"
                        value="{{ $user->email }}"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('email')
                        <div class="text-red-500 mt-1 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Kolom Password Baru -->
                <div class="mb-3">
                    <label for="newpassword" class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Password
                        Baru</label>
                    <input type="password" placeholder="Masukkan password baru" id="newpassword" name="password"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('password')
                        <div class="text-red-500 mt-1 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Kolom Konfirmasi Password Baru -->
                <div class="mb-5">
                    <label for="confirmnewpassword"
                        class="text-stone-900 text-sm font-medium tracking-wide mb-0.5">Konfirmasi
                        Password Baru</label>
                    <input type="password" placeholder="Konfirmasi password baru" id="confirmnewpassword"
                        name="passwordconfirm"
                        class="w-full h-9 border-2 border-gray-400 rounded-md px-3 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    @error('passwordconfirm')
                        <div class="text-red-500 mt-1 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Tombol Simpan -->
                <div class="flex items-center mb-20">
                    <button type="submit"
                        class="w-40 h-9 bg-blue-500 hover:bg-blue-700 text-white rounded-md px-3 text-sm font-normal tracking-wide transition focus:border-gray-800 focus:outline-none mr-4">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
        <!-- Footer -->
        <footer class="text-stone-900 text-sm text-left ml-4 mb-5 mt-auto w-full bg-gray-50">
            &copy; 2023 Sip Arsip. All rights reserved.
        </footer>
    </div>
    <script src="{{ asset('js/editprofile.js') }}"></script>
@endsection
