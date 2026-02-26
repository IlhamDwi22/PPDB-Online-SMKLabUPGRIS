@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('page-header')
    <h2 class="text-xl font-bold text-gray-800">Dashboard</h2>
    <p class="text-sm text-gray-500 mt-1">Ringkasan data pendaftaran PPDB Online</p>
@endsection

@section('content')
    @php
        $totalPendaftar = $totalPendaftar ?? 0;
        $belumFinalisasi = $belumFinalisasi ?? 0;
        $menungguVerifikasi = $menungguVerifikasi ?? 0;
        $sudahVerifikasi = $sudahVerifikasi ?? 0;
    @endphp

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        {{-- Total Pendaftar --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Total Pendaftar</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalPendaftar }}</p>
                </div>
                <div class="w-12 h-12 bg-primary-100 text-primary-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Belum Finalisasi --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Belum Finalisasi</p>
                    <p class="text-3xl font-bold text-orange-500 mt-1">{{ $belumFinalisasi }}</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 text-orange-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Menunggu Verifikasi --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Menunggu Verifikasi</p>
                    <p class="text-3xl font-bold text-yellow-500 mt-1">{{ $menungguVerifikasi }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 text-yellow-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Sudah Diverifikasi --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Sudah Diverifikasi</p>
                    <p class="text-3xl font-bold text-green-500 mt-1">{{ $sudahVerifikasi }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 text-green-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <x-card title="Aksi Cepat">
        <div class="flex flex-wrap gap-3">
            <x-button variant="primary" :href="url('/admin/students')">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>
                Lihat Semua Pendaftar
            </x-button>
            <x-button variant="secondary" :href="url('/admin/students?status=MENUNGGU_VERIFIKASI')">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Perlu Diverifikasi
            </x-button>
        </div>
    </x-card>
@endsection
