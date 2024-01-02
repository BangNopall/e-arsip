<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('images/Logo_Kabupaten_Malang_-_Seal_of_Malang_Regency.svg') }}"
        type="image/x-icon">
    @vite('resources/css/app.css')
    <title>Sip Arsip - Pendaftaran Akun</title>
</head>

<body class="bg-gray-50 flex flex-col min-h-screen items-center justify-center font-Poppins">
    <div class="bg-gray-50 rounded-lg border-2 border-blue-500 mt-2 pb-7 pt-6 px-5 text-center font-Poppins">
        <!-- Logo -->
        <img class="mx-auto mb-1 w-20 h-auto"
            src="{{ asset('images/Logo_Kabupaten_Malang_-_Seal_of_Malang_Regency.svg') }}" alt="Logo">

        <!-- Selamat Datang -->
        <div class="text-stone-900 text-lg font-medium">Selamat Datang di Aplikasi Sip Arsip</div>

        <!-- Silakan masukkan informasi pendaftaran -->
        <div class="text-gray-500 text-sm font-normal mb-7 tracking-wide leading-4">Silakan masukkan informasi
            pendaftaran Anda</div>

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

        <form action="{{ route('auth.store') }}" method="post">
            @csrf
            <label for="name" class="block text-left text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nama
                Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="w-96 h-9 border-2 border-gray-300 rounded-md px-3 text-sm mb-1 text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none"
                required>
            @error('name')
                <div class="text-red-500 text-left">{{ $message }}</div>
            @enderror

            <label for="jabatan"
                class="block text-left text-stone-900 text-sm font-medium tracking-wide mb-0.5">Jabatan</label>
            <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan') }}"
                class="w-96 h-9 border-2 border-gray-300 rounded-md px-3 text-sm mb-1 text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none"
                required>
            @error('jabatan')
                <div class="text-red-500 text-left">{{ $message }}</div>
            @enderror

            <!-- NIK -->
            <label for="nik"
                class="block text-left text-stone-900 text-sm font-medium tracking-wide mb-0.5">NIK</label>
            <input type="number" id="nik" name="nik" value="{{ old('nik') }}"
                class="w-full h-9 border-2 border-gray-300 rounded-md px-3 mb-1 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none"
                required>
            @error('nik')
                <div class="text-red-500 text-left">{{ $message }}</div>
            @enderror

            <label for="email"
                class="block text-left text-stone-900 text-sm font-medium tracking-wide mb-0.5">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="w-full h-9 border-2 border-gray-300 rounded-md px-3 mb-1 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none"
                required>
            @error('email')
                <div class="text-red-500 text-left">{{ $message }}</div>
            @enderror

            <!-- Nomor WhatsApp -->
            <label for="nohp" class="block text-left text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nomor
                WhatsApp</label>
            <input type="number" id="nohp" name="nohp" value="{{ old('nohp') }}"
                class="w-full h-9 border-2 border-gray-300 rounded-md px-3 mb-1 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none"
                required>
            @error('nohp')
                <div class="text-red-500 text-left">{{ $message }}</div>
            @enderror

            <!-- Buat Password -->
            <label for="password" class="block text-left text-stone-900 text-sm font-medium tracking-wide mb-0.5">Buat
                Password</label>
            <input type="password" id="password" name="password"
                class="w-full h-9 border-2 border-gray-300 rounded-md px-3 mb-1 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none"
                required>
            @error('password')
                <div class="text-red-500 text-left">{{ $message }}</div>
            @enderror

            <!-- Konfirmasi Password -->
            <label for="password"
                class="block text-left text-stone-900 text-sm font-medium tracking-wide mb-0.5">Konfirmasi
                Password</label>
            <input type="password" id="passwordconfirm" name="passwordconfirm"
                class="w-full h-9 border-2 border-gray-300 rounded-md px-3 mb-1 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none"
                required>
            @error('passwordconfirm')
                <div class="text-red-500 text-left">{{ $message }}</div>
            @enderror
            <!-- Tombol Daftar -->
            <button type="submit"
                class="w-full h-9 bg-blue-500 text-sm tracking-wide text-white rounded-md flex items-center justify-center mb-0.5 hover:bg-blue-600 mt-5">
                Daftar Sekarang
            </button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="pt-6 mb-4 text-center">
        <p class="text-sm text-stone-900">&copy; 2023 Sip Arsip. All rights reserved.</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>
