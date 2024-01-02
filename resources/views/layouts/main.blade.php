<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/Logo_Kabupaten_Malang_-_Seal_of_Malang_Regency.svg') }}"
        type="image/x-icon">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <title>Sip Arsip - Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 flex transition-all ease-in-out">
    {{-- sidebar --}}
    @include('partials.sidebar')
    {{-- end sidebar --}}
    {{-- main content --}}
    <div class="flex-1 flex flex-col overflow-hidden font-Poppins relative mt-2 mx-2">
        @yield('container')
        @include('partials.footer')
    </div>
    {{-- end main content --}}
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var sidebar = document.getElementById('mySidebar');

        window.addEventListener('scroll', function() {
            var shouldFix = window.scrollY > 0;

            sidebar.style.position = shouldFix ? 'sticky' : 'static';
        });
    });
</script>

</html>
