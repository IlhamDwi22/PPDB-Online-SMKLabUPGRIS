@props([
    'number',
    'title',
    'description',
    'icon' => null,
])

<div class="group relative flex flex-col items-center text-center p-6 rounded-2xl bg-white border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 min-w-[200px] flex-1">
    {{-- Step Number Badge --}}
    <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm font-bold shadow-md shadow-primary-200">
        {{ $number }}
    </div>

    {{-- Icon --}}
    <div class="w-14 h-14 mt-4 mb-4 rounded-xl bg-primary-50 text-primary-600 flex items-center justify-center group-hover:bg-primary-600 group-hover:text-white transition-colors duration-300">
        {{ $icon }}
    </div>

    {{-- Content --}}
    <h4 class="font-bold text-gray-800 mb-1">{{ $title }}</h4>
    <p class="text-sm text-gray-500 leading-relaxed">{{ $description }}</p>
</div>
