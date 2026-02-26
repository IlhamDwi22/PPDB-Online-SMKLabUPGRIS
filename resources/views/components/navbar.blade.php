<nav class="bg-white border-b border-gray-200 sticky top-0 z-40">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo & Brand --}}
            <a href="{{ url('/student/dashboard') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logo-sma-lab.png') }}" alt="Logo" class="w-9 h-9 object-contain transition-transform group-hover:scale-105">
                <div class="hidden sm:block">
                    <h1 class="text-base font-bold text-gray-800 leading-tight">PPDB Online</h1>
                    <p class="text-sm text-gray-500 leading-tight">SMA Lab UPGRIS</p>
                </div>
            </a>

            {{-- User Menu --}}
            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-base font-semibold text-gray-800 leading-tight">{{ Auth::user()->name ?? 'Siswa' }}</p>
                    <p class="text-sm text-gray-500 leading-tight">{{ Auth::user()->nisn ?? '-' }}</p>
                </div>

                {{-- Avatar --}}
                <div class="w-10 h-10 bg-primary-100 text-primary-700 rounded-full flex items-center justify-center text-base font-bold">
                    {{ strtoupper(substr(Auth::user()->name ?? 'S', 0, 1)) }}
                </div>

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-2 rounded-lg text-gray-400 hover:text-red-500 hover:bg-red-50 transition-colors" title="Logout">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
