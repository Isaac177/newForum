<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-partials.head />
</head>

<body class="relative overflow-hidden bg-blue-500">

    <div class="absolute z-10 w-full">
        <img src="{{ asset('img/images/img_1.png') }}" alt="" class="object-cover w-full max-h-screen">
    </div>

    {{-- Slot --}}
    <div class="relative z-50 mb-8 font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>

    <livewire:scripts />
    @bukScripts(true)
</body>

</html>
