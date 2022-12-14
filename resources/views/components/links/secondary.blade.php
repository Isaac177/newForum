@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 bg-blue-100 border-blue-400 text-sm font-medium leading-5 text-blue-800 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition duration-150 ease-in-out rounded'
: 'inline-flex items-center px-1 pt-1 border-b-2 bg-blue-100 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out rounded';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
