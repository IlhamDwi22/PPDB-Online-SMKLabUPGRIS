@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-header')
    <h2 class="text-xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name ?? 'Siswa' }} 👋</h2>
    <p class="text-sm text-gray-500 mt-1">Pantau status pendaftaran kamu di sini</p>
@endsection

@section('content')
    @php
        $student = Auth::user()->student ?? null;
        $currentStep = $student->current_step ?? 1;
        $isFinalized = $student->is_finalized ?? false;
        $statusVerifikasi = $student->status_verifikasi ?? 'BELUM_SUBMIT';
        $noPendaftaran = $student->no_pendaftaran ?? null;
    @endphp

    {{-- Status Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        {{-- Form Status --}}
        <x-card>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center
                    {{ $isFinalized ? 'bg-green-100 text-green-600' : 'bg-blue-100 text-blue-600' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Status Form</p>
                    <p class="text-lg font-bold {{ $isFinalized ? 'text-green-600' : 'text-blue-600' }}">
                        {{ $isFinalized ? 'Selesai' : 'Step ' . $currentStep . ' dari 6' }}
                    </p>
                </div>
            </div>
        </x-card>

        {{-- Verification Status --}}
        <x-card>
            <div class="flex items-center gap-4">
                @php
                    $verifikasiConfig = match($statusVerifikasi) {
                        'VERIFIED' => ['bg' => 'bg-green-100', 'text' => 'text-green-600', 'label' => 'Terverifikasi'],
                        'MENUNGGU_VERIFIKASI' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-600', 'label' => 'Menunggu Verifikasi'],
                        'REJECTED' => ['bg' => 'bg-red-100', 'text' => 'text-red-600', 'label' => 'Ditolak'],
                        default => ['bg' => 'bg-gray-100', 'text' => 'text-gray-500', 'label' => 'Belum Submit'],
                    };
                @endphp
                <div class="w-12 h-12 rounded-xl flex items-center justify-center {{ $verifikasiConfig['bg'] }} {{ $verifikasiConfig['text'] }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Verifikasi</p>
                    <p class="text-lg font-bold {{ $verifikasiConfig['text'] }}">{{ $verifikasiConfig['label'] }}</p>
                </div>
            </div>
        </x-card>

        {{-- Registration Number --}}
        <x-card>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center {{ $noPendaftaran ? 'bg-accent-100 text-accent-600' : 'bg-gray-100 text-gray-400' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">No. Pendaftaran</p>
                    <p class="text-lg font-bold {{ $noPendaftaran ? 'text-gray-800' : 'text-gray-400' }}">
                        {{ $noPendaftaran ?? 'Belum tersedia' }}
                    </p>
                </div>
            </div>
        </x-card>
    </div>

    {{-- Action Panel --}}
    <x-card title="Aksi Selanjutnya">
        @if(!$isFinalized)
            <p class="text-sm text-gray-600 mb-4">
                Kamu belum menyelesaikan pengisian formulir. Silakan lanjutkan ke step {{ $currentStep }}.
            </p>
            <x-button variant="primary" :href="url('/student/form/step/' . $currentStep)">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
                Lanjutkan Pengisian — Step {{ $currentStep }}
            </x-button>
        @else
            <p class="text-sm text-gray-600 mb-4">
                Formulir sudah difinalisasi. Kamu tidak bisa mengedit data lagi.
            </p>
            <div class="flex flex-wrap gap-3">
                <x-button variant="secondary" :href="url('/student/review')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    Lihat Data
                </x-button>
                <x-button variant="accent" :href="url('/student/print')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                    Cetak Formulir
                </x-button>
            </div>
        @endif
    </x-card>
@endsection
