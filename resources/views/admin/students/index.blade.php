@extends('layouts.admin')

@section('title', 'Daftar Pendaftar')

@section('page-header')
    <h2 class="text-xl font-bold text-gray-800">Daftar Pendaftar</h2>
    <p class="text-sm text-gray-500 mt-1">Kelola data calon peserta didik baru</p>
@endsection

@section('content')
    {{-- Search & Filter --}}
    <x-card class="mb-6">
        <form method="GET" action="{{ url('/admin/students') }}" class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1 relative">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau NISN..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 focus:outline-none">
            </div>
            <select name="status" class="rounded-lg border border-gray-300 px-4 py-2.5 text-sm bg-white focus:border-primary-500 focus:outline-none">
                <option value="">Semua Status</option>
                <option value="BELUM_SUBMIT" {{ request('status') == 'BELUM_SUBMIT' ? 'selected' : '' }}>Belum Submit</option>
                <option value="MENUNGGU_VERIFIKASI" {{ request('status') == 'MENUNGGU_VERIFIKASI' ? 'selected' : '' }}>Menunggu</option>
                <option value="VERIFIED" {{ request('status') == 'VERIFIED' ? 'selected' : '' }}>Terverifikasi</option>
                <option value="REJECTED" {{ request('status') == 'REJECTED' ? 'selected' : '' }}>Ditolak</option>
            </select>
            <x-button variant="primary" type="submit">Filter</x-button>
        </form>
    </x-card>

    {{-- Table --}}
    <x-card padding="p-0">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-600 uppercase">Nama</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-600 uppercase">NISN</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-600 uppercase">Status Form</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-600 uppercase">Verifikasi</th>
                        <th class="text-left px-6 py-3 text-xs font-semibold text-gray-600 uppercase">No. Pendaftaran</th>
                        <th class="text-center px-6 py-3 text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($students ?? [] as $s)
                        @php
                            $badge = match($s->status_verifikasi ?? '') {
                                'VERIFIED' => ['bg-green-100 text-green-700', 'Terverifikasi'],
                                'MENUNGGU_VERIFIKASI' => ['bg-yellow-100 text-yellow-700', 'Menunggu'],
                                'REJECTED' => ['bg-red-100 text-red-700', 'Ditolak'],
                                default => ['bg-gray-100 text-gray-600', 'Belum Submit'],
                            };
                        @endphp
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $s->user->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-gray-600 font-mono text-xs">{{ $s->user->nisn ?? '-' }}</td>
                            <td class="px-6 py-4 text-gray-600">Step {{ $s->current_step ?? 1 }}/5 @if($s->is_finalized)<span class="text-green-600 text-xs ml-1">✓ Final</span>@endif</td>
                            <td class="px-6 py-4"><span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $badge[0] }}">{{ $badge[1] }}</span></td>
                            <td class="px-6 py-4 font-mono text-gray-800">{{ $s->no_pendaftaran ?? '—' }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ url('/admin/students/' . $s->id) }}" class="px-3 py-1.5 bg-primary-50 text-primary-600 rounded-lg text-xs font-medium hover:bg-primary-100 transition-colors">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-6 py-12 text-center text-gray-400">Belum ada data pendaftar</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(method_exists($students ?? collect(), 'links'))
            <div class="px-6 py-4 border-t border-gray-100">{{ $students->links() }}</div>
        @endif
    </x-card>
@endsection
