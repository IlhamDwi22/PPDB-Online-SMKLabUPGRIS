@php
    $menuItems = [
        ['label' => 'Dashboard', 'url' => '/admin/dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1'],
        ['label' => 'Daftar Pendaftar', 'url' => '/admin/students', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z'],
    ];
@endphp

<aside id="admin-sidebar"
       class="fixed left-0 top-0 bottom-0 w-64 bg-primary-900 text-white z-40 transition-transform duration-300 lg:translate-x-0 -translate-x-full">

    {{-- Logo Area --}}
    <div class="h-16 flex items-center gap-3 px-6 border-b border-white/10">
        <div class="w-9 h-9 bg-accent-500 rounded-lg flex items-center justify-center">
            <svg class="w-5 h-5 text-primary-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
            </svg>
        </div>
        <div>
            <h1 class="text-sm font-bold leading-tight">Admin PPDB</h1>
            <p class="text-xs text-primary-300 leading-tight">SMK Lab UPGRIS</p>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="mt-6 px-3 space-y-1">
        @foreach($menuItems as $item)
            @php
                $isActive = request()->is(ltrim($item['url'], '/') . '*');
            @endphp
            <a href="{{ url($item['url']) }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all duration-200
                   {{ $isActive
                       ? 'bg-white/15 text-white shadow-sm'
                       : 'text-primary-200 hover:bg-white/10 hover:text-white' }}
               ">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                </svg>
                {{ $item['label'] }}
            </a>
        @endforeach
    </nav>

    {{-- Logout at bottom --}}
    <div class="absolute bottom-0 left-0 right-0 p-3 border-t border-white/10">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-primary-300 hover:bg-red-500/20 hover:text-red-300 transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Keluar
            </button>
        </form>
    </div>
</aside>
