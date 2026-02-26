@props([
    'title' => null,
    'subtitle' => null,
    'padding' => 'p-6 sm:p-8',
])

<div {{ $attributes->merge(['class' => "bg-white rounded-xl shadow-sm border border-gray-100 $padding"]) }}>
    @if($title)
        <div class="mb-4 pb-4 border-b border-gray-100">
            <h3 class="text-lg font-bold text-gray-800">{{ $title }}</h3>
            @if($subtitle)
                <p class="text-sm text-gray-500 mt-0.5">{{ $subtitle }}</p>
            @endif
        </div>
    @endif

    {{ $slot }}
</div>
