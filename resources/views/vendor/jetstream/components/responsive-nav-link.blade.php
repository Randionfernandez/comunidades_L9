@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-blue-600 font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-blue-300 focus:bg-indigo-100 focus:border-indigo-700 transition'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-white font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-500 hover:border-gray-300 focus:outline-none focus:text-black focus:bg-black focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
