<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-partials.head />
</head>

<body class="bg-gray-100" style="background: #001625">

    {{-- Header --}}
    <header class="relative flex items-center justify-center h-40 bg-blue-500">
        <img class="absolute z-10 object-cover w-full h-40" src="{{ asset('img/images/img_1.png') }}" alt="">
        <h2 class="z-50 text-5xl font-bold"
            style="color: #EF3A2E; text-shadow: 0 0 20px #EF3A2E; transition: all 0.3s ease-in-out;">
            Welcome to the Students' Forum</h2>
    </header>

    {{-- Navbar --}}
    <x-partials.nav />

    {{-- Slot --}}
    <div class="mb-8 font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>

    {{-- Footer --}}
    <x-partials.footer />

    <livewire:scripts />
    @bukScripts(true)
</body>

</html>
