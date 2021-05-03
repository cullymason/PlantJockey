@props(['active'])

@php
$classes = ($active ?? false)
            ? 'py-1 px-2 text-gray-800'
            : 'py-1 px-2 text-gray-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
