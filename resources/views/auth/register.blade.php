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

        <form action="{{ route('auth.store') }}" method="post">
            @csrf
            <label for="name" class="block text-left text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nama
                Lengkap</label>
            <input type="text" id="name" name="name"
                class="w-96 h-9 border-2 border-gray-300 rounded-md px-3 text-sm mb-1 text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none"
                required>
            @error('name')
                <div class="text-red-500 text-left">{{ $message }}</div>
            @enderror

            <!-- NIK -->
            <label for="nik"
                class="block text-left text-stone-900 text-sm font-medium tracking-wide mb-0.5">NIK</label>
            <input type="number" id="nik" name="nik"
                class="w-full h-9 border-2 border-gray-300 rounded-md px-3 mb-1 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none"
                required>
            @error('nik')
                <div class="text-red-500 text-left">{{ $message }}</div>
            @enderror

            <label for="email"
                class="block text-left text-stone-900 text-sm font-medium tracking-wide mb-0.5">Email</label>
            <input type="email" id="email" name="email"
                class="w-full h-9 border-2 border-gray-300 rounded-md px-3 mb-1 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none"
                required>
            @error('email')
                <div class="text-red-500 text-left">{{ $message }}</div>
            @enderror

            <!-- Nomor WhatsApp -->
            <label for="nohp" class="block text-left text-stone-900 text-sm font-medium tracking-wide mb-0.5">Nomor
                WhatsApp</label>
            <input type="number" id="nohp" name="nohp"
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
