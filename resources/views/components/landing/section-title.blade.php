@props([
    'title',
    'subtitle' => null,
    'align' => 'center',
    'light' => false,
])

@php
    $alignClass = match($align) {
        'left' => 'text-left',
        'right' => 'text-right',
        default => 'text-center',
    };
@endphp

<div class="{{ $alignClass }} mb-12">
    <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight {{ $light ? 'text-white' : 'text-gray-900' }}">
        {{ $title }}
    </h2>
    @if($subtitle)
        <p class="mt-3 text-lg {{ $light ? 'text-blue-100' : 'text-gray-500' }} max-w-2xl {{ $align === 'center' ? 'mx-auto' : '' }}">
            {{ $subtitle }}
        </p>
    @endif
</div>
