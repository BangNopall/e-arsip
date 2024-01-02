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
    <title>Sip Arsip - Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 flex flex-col min-h-screen items-center justify-center font-Poppins p-3">
    <div class="bg-gray-50 rounded-lg border-2 border-blue-500 mt-2 p-3 md:p-5 text-center font-Poppins">
        <!-- Logo -->
        <img class="mx-auto mb-1 w-20 h-auto"
            src="{{ asset('images/Logo_Kabupaten_Malang_-_Seal_of_Malang_Regency.svg') }}" alt="Logo">

        <!-- Selamat Datang -->
        <div class="text-stone-900 text-lg font-medium">Selamat Datang di Aplikasi Sip Arsip</div>

        <!-- Silakan masukkan username dan password -->
        <div class="text-gray-500 text-sm font-normal mb-3 tracking-wide leading-4">
            Silakan masukkan username dan password anda
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

        <!-- Username -->
        <form action="{{ route('auth.authenticate') }}" method="post">
            @csrf
            <label for="email"
                class="block text-left text-stone-900 text-sm font-medium tracking-wide mb-0.5">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="w-full h-9 border-2 border-gray-300 rounded-md px-3 mb-2 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">

            <!-- Password -->
            <div class="relative">
                <label for="password"
                    class="block text-left text-stone-900 text-sm font-medium tracking-wide mb-0.5">Password</label>
                <div class="relative flex items-center">
                    <input type="password" id="password" name="password"
                        class="w-full h-9 border-2 border-gray-300 rounded-md px-3 mb-2 text-sm text-stone-900 font-normal tracking-wide transition focus:border-gray-800 hover:border-gray-800 focus:outline-none">
                    <span class="absolute flex items-center top-2.5 right-3 pr-0.5">
                        <i id="visibilityIcon" class="material-icons-round cursor-pointer text-gray-500"
                            style="font-size: 19px;" onclick="togglePasswordVisibility()">visibility</i>
                    </span>
                </div>
            </div>

            <!-- Ingat Saya -->
            <div class="flex items-center justify-start mb-4">
                <input type="checkbox" id="remember" name="remember" class="w-3 h-3 mr-1 border-gray-300">
                <label for="remember" class="text-stone-900 text-sm ml-0.5 tracking-wide">Ingat saya</label>
            </div>

            <!-- Tombol Masuk -->
            <button type="submit"
                class="w-full h-9 bg-blue-500 text-white rounded-md flex items-center justify-center mb-0.5 hover:bg-blue-600">
                Masuk
            </button>
        </form>


        <!-- Lupa Password -->
        <p class="text-stone-900 text-sm text-center mt-2 tracking-wide mb-12"><a href="#">Lupa password?</a></p>

        <!-- Belum memiliki akun? Daftar sekarang -->
        <p class="text-stone-900 text-sm tracking-wide">Belum memiliki akun? <a href="/register"
                class="text-blue-500 tracking-wide">Daftar sekarang</a></p>
    </div>

    <!-- Footer -->
    <footer class="pt-6 mb-1 text-center">
        <p class="text-sm text-stone-900">&copy; 2023 Sip Arsip. All rights reserved.</p>
    </footer>
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>
