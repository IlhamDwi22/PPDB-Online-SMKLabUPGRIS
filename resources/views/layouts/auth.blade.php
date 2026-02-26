<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PPDB Online SMK Laboratorium UPGRIS — Sistem Penerimaan Peserta Didik Baru">
    <title>@yield('title', 'PPDB Online') — SMK Lab UPGRIS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative ">

    <div class="fixed inset-0 z-0"
     style="background-image: 
     linear-gradient(to bottom, rgba(15,23,42,0.8), rgba(15,23,42,0.8)),
     url('{{ asset('images/sma-lab-upgris.jpg') }}');
     background-size: cover;
     background-position: center;
     background-repeat: no-repeat;
     ">
    </div>

    {{-- Decorative background pattern --}}
    <div class="fixed inset-0 opacity-5 pointer-events-none">
        <div class="absolute top-0 left-0 w-72 h-72 bg-accent-400 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-primary-400 rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>
    </div>

    <div class="w-full max-w-md relative z-10">
        {{-- Logo & School Name --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-22 h-22 mx-auto">
                <img src="{{ asset('images/logo-sma-lab.png') }}" alt="Logo SMA Lab UPGRIS" class="w-24 h-24 object-contain" />
            </div>
            <h1 class="text-xl font-bold text-white">SMA Laboratorium UPGRIS</h1>
            <p class="text-primary-200 text-sm mt-1">Penerimaan Peserta Didik Baru</p>
        </div>

        {{-- Card Container --}}
        <div class="bg-white rounded-2xl shadow-2xl shadow-black/20 p-8">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm flex items-start gap-3">
                    <svg class="w-5 h-5 text-green-500 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-500 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </div>

        {{-- Footer --}}
        <p class="text-center text-primary-300 text-xs mt-6">
            &copy; {{ date('Y') }} SMK Laboratorium UPGRIS. All rights reserved.
        </p>
    </div>

</body>
</html>
