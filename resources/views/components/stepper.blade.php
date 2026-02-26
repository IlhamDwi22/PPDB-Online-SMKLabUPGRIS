@props([
    'currentStep' => 1,
])

@php
    $steps = [
        1 => 'Data Murid',
        2 => 'Alamat',
        3 => 'Orang Tua',
        4 => 'Tambahan',
        5 => 'Upload',
        6 => 'Review',
    ];
@endphp

<div class="mb-8 px-6 sm:px-8">
    {{-- Row 1: Circles + Connector Lines (precisely aligned) --}}
    <div class="flex items-center">
        @foreach($steps as $number => $label)
            {{-- Circle --}}
            <div class="shrink-0 w-9 h-9 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300 z-10
                @if($number < $currentStep)
                    bg-green-500 text-white shadow-sm
                @elseif($number == $currentStep)
                    bg-primary-600 text-white shadow-md ring-4 ring-primary-100
                @else
                    bg-gray-200 text-gray-500
                @endif
            ">
                @if($number < $currentStep)
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                @else
                    {{ $number }}
                @endif
            </div>

            {{-- Connector line (between circles, not after last) --}}
            @if(!$loop->last)
                <div class="flex-1 h-0.5 mx-1.5
                    @if($number < $currentStep)
                        bg-green-500
                    @else
                        bg-gray-200
                    @endif
                "></div>
            @endif
        @endforeach
    </div>

    {{-- Row 2: Labels (precisely centered under each circle) --}}
    <div class="flex items-start mt-2">
        @foreach($steps as $number => $label)
            <div class="shrink-0 w-9 relative">
                <span class="absolute left-1/2 -translate-x-1/2 whitespace-nowrap text-[11px] font-medium leading-tight
                    @if($number < $currentStep)
                        text-green-600
                    @elseif($number == $currentStep)
                        text-primary-600
                    @else
                        text-gray-400
                    @endif
                ">
                    {{ $label }}
                </span>
            </div>

            {{-- Spacer to match connector line width --}}
            @if(!$loop->last)
                <div class="flex-1 mx-1.5"></div>
            @endif
        @endforeach
    </div>
</div>
