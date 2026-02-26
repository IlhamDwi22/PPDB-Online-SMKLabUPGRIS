@extends('layouts.admin')

@section('title', 'Detail Pendaftar')

@section('page-header')
    <div class="flex items-center justify-between">
        <div>
            <a href="{{ url('/admin/students') }}" class="text-sm text-primary-600 hover:underline flex items-center gap-1 mb-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                Kembali ke daftar
            </a>
            <h2 class="text-xl font-bold text-gray-800">{{ $student->user->name ?? 'Detail Pendaftar' }}</h2>
            <p class="text-sm text-gray-500 mt-0.5">NISN: {{ $student->user->nisn ?? '-' }}</p>
        </div>
        @php
            $badge = match($student->status_verifikasi ?? '') {
                'VERIFIED' => ['bg-green-100 text-green-700 border-green-200', 'Terverifikasi'],
                'MENUNGGU_VERIFIKASI' => ['bg-yellow-100 text-yellow-700 border-yellow-200', 'Menunggu Verifikasi'],
                'REJECTED' => ['bg-red-100 text-red-700 border-red-200', 'Ditolak'],
                default => ['bg-gray-100 text-gray-600 border-gray-200', 'Belum Submit'],
            };
        @endphp
        <span class="px-4 py-2 rounded-full text-sm font-semibold border {{ $badge[0] }}">{{ $badge[1] }}</span>
    </div>
@endsection

@section('content')
    @php
        $addresses = $student->addresses ?? collect();
        $parents = $student->parents ?? collect();
        $document = $student->document;
        $alamatKK = $addresses->where('type', 'kk')->first();
        $alamatDomisili = $addresses->where('type', 'domisili')->first();
        $ayah = $parents->where('type', 'ayah')->first();
        $ibu = $parents->where('type', 'ibu')->first();
        $wali = $parents->where('type', 'wali')->first();
    @endphp

    {{-- Status Summary --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-xl border p-4 flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-500">Form Step</p>
                <p class="font-bold text-gray-800">{{ $student->current_step ?? 1 }}/5 {{ ($student->is_finalized ?? false) ? '(Final)' : '' }}</p>
            </div>
        </div>
        <div class="bg-white rounded-xl border p-4 flex items-center gap-3">
            <div class="w-10 h-10 bg-accent-100 text-accent-600 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-500">No. Pendaftaran</p>
                <p class="font-bold text-gray-800">{{ $student->no_pendaftaran ?? '—' }}</p>
            </div>
        </div>
        <div class="bg-white rounded-xl border p-4 flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 text-green-600 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-500">KIP</p>
                <p class="font-bold text-gray-800">{{ $student->status_kip ?? '-' }}</p>
            </div>
        </div>
    </div>

    {{-- Data Sections --}}
    <div class="space-y-4 mb-6">
        {{-- Data Diri --}}
        <x-card title="Data Diri">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 gap-x-8 text-sm">
                @foreach(['Nama Lengkap' => $student->nama_lengkap ?? '-', 'Tempat, Tgl Lahir' => ($student->tempat_lahir ?? '') . ', ' . ($student->tanggal_lahir ?? '-'), 'Jenis Kelamin' => ($student->jenis_kelamin ?? '') == 'L' ? 'Laki-laki' : 'Perempuan', 'Agama' => $student->agama ?? '-', 'Sekolah Asal' => $student->sekolah_asal ?? '-', 'Tinggi/Berat' => ($student->tinggi_badan ?? '-') . ' cm / ' . ($student->berat_badan ?? '-') . ' kg', 'Minat Bakat' => $student->minat_bakat ?? '-'] as $lbl => $val)
                    <div><span class="text-gray-500">{{ $lbl }}</span><p class="font-semibold text-gray-800">{{ $val }}</p></div>
                @endforeach
            </div>
        </x-card>

        {{-- Alamat --}}
        <x-card title="Alamat">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                <div>
                    <p class="font-bold text-primary-600 mb-1">Sesuai KK</p>
                    <p>{{ $alamatKK->alamat_lengkap ?? '-' }}</p>
                    <p class="text-gray-500">{{ implode(', ', array_filter([$alamatKK->desa ?? '', $alamatKK->kecamatan ?? '', $alamatKK->kabupaten ?? '', $alamatKK->provinsi ?? ''])) ?: '-' }}</p>
                </div>
                <div>
                    <p class="font-bold text-primary-600 mb-1">Domisili</p>
                    <p>{{ $alamatDomisili->alamat_lengkap ?? '-' }}</p>
                    <p class="text-gray-500">{{ implode(', ', array_filter([$alamatDomisili->desa ?? '', $alamatDomisili->kecamatan ?? '', $alamatDomisili->kabupaten ?? '', $alamatDomisili->provinsi ?? ''])) ?: '-' }}</p>
                </div>
            </div>
        </x-card>

        {{-- Orang Tua --}}
        <x-card title="Orang Tua / Wali">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
                @foreach([['Ayah', $ayah], ['Ibu', $ibu], ['Wali', $wali]] as [$plbl, $p])
                    <div>
                        <p class="font-bold text-gray-700 mb-1">{{ $plbl }}</p>
                        @if($p)
                            <p>{{ $p->nama }}</p><p class="text-gray-500">{{ $p->pekerjaan }} — {{ $p->penghasilan }}</p>
                        @else
                            <p class="text-gray-400 italic">Tidak diisi</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </x-card>

        {{-- Dokumen --}}
        <x-card title="Dokumen">
            @php $docs = ['pas_foto'=>'Pas Foto','kk'=>'KK','akta'=>'Akta','rapor'=>'Rapor','tka'=>'Sertifikat TKA','ijazah'=>'SKL/Ijazah']; @endphp
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                @foreach($docs as $f => $l)
                    <div class="flex items-center gap-2 p-3 rounded-lg {{ isset($document) && $document->$f ? 'bg-green-50 border border-green-200' : 'bg-gray-50 border border-gray-200' }}">
                        @if(isset($document) && $document->$f)
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <a href="{{ asset('storage/' . $document->$f) }}" target="_blank" class="text-sm text-green-700 font-medium hover:underline">{{ $l }}</a>
                        @else
                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                            <span class="text-sm text-gray-500">{{ $l }}</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </x-card>
    </div>

    {{-- Verification Actions --}}
    @if(($student->status_verifikasi ?? '') === 'MENUNGGU_VERIFIKASI')
        <x-card title="Aksi Verifikasi">
            <p class="text-sm text-gray-600 mb-4">Verifikasi kelengkapan data pendaftar ini.</p>
            <div class="flex flex-wrap gap-3">
                <form method="POST" action="{{ url('/admin/students/' . $student->id . '/verify') }}">
                    @csrf
                    <input type="hidden" name="action" value="approve">
                    <x-button variant="success" onclick="return confirm('Approve pendaftar ini?')">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Approve
                    </x-button>
                </form>
                <form method="POST" action="{{ url('/admin/students/' . $student->id . '/verify') }}">
                    @csrf
                    <input type="hidden" name="action" value="reject">
                    <x-button variant="danger" onclick="return confirm('Reject pendaftar ini?')">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Reject
                    </x-button>
                </form>
            </div>
        </x-card>
    @endif
@endsection
