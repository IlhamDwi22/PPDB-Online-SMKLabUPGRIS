@props([
    'title' => '',
    'subtitle' => null,
    'expanded' => true,
    'badge' => null,
    'badgeColor' => 'blue',
])

<div x-data="{ open: {{ $expanded ? 'true' : 'false' }} }" class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-200">
    {{-- Header (clickable) --}}
    <button
        type="button"
        @click="open = !open"
        class="w-full flex items-center justify-between p-5 sm:p-6 text-left hover:bg-gray-50/50 transition-colors"
    >
        <div class="flex items-center gap-3">
            @if($badge)
                <span class="w-8 h-8 bg-{{ $badgeColor }}-100 text-{{ $badgeColor }}-600 rounded-full flex items-center justify-center text-sm font-bold shrink-0">
                    {{ $badge }}
                </span>
            @endif
            <div>
                <h4 class="text-base font-bold text-gray-800">{{ $title }}</h4>
                @if($subtitle)
                    <p class="text-sm text-gray-500 mt-0.5">{{ $subtitle }}</p>
                @endif
            </div>
        </div>

        {{-- Chevron Arrow --}}
        <svg
            class="w-5 h-5 text-gray-400 transition-transform duration-300"
            :class="open ? 'rotate-180' : ''"
            fill="none" stroke="currentColor" viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    {{-- Body (collapsible) --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="px-5 sm:px-6 pb-5 sm:pb-6 border-t border-gray-100"
    >
        <div class="pt-5">
            {{ $slot }}
        </div>
    </div>
</div>
