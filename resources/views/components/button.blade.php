@props([
    'variant' => 'primary',
    'type' => 'submit',
    'href' => null,
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 px-6 py-2.5 text-sm font-semibold rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 cursor-pointer';

    $variantClasses = match($variant) {
        'primary'   => 'bg-primary-600 text-white hover:bg-primary-700 focus:ring-primary-500 shadow-sm shadow-primary-600/30',
        'secondary' => 'bg-gray-100 text-gray-700 hover:bg-gray-200 focus:ring-gray-400 border border-gray-300',
        'danger'    => 'bg-red-500 text-white hover:bg-red-600 focus:ring-red-400 shadow-sm shadow-red-500/30',
        'success'   => 'bg-green-500 text-white hover:bg-green-600 focus:ring-green-400 shadow-sm shadow-green-500/30',
        'accent'    => 'bg-accent-500 text-primary-900 hover:bg-accent-400 focus:ring-accent-400 shadow-sm shadow-accent-500/30 font-bold',
        default     => 'bg-primary-600 text-white hover:bg-primary-700 focus:ring-primary-500',
    };
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $variantClasses]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $variantClasses]) }}>
        {{ $slot }}
    </button>
@endif
