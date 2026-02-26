@extends('layouts.app')

@section('title', 'Review Data Pendaftaran')

@section('content')
    @php
        $student = Auth::user()->student ?? null;
        $addresses = $student ? $student->addresses : collect();
        $parents = $student ? $student->parents : collect();
        $document = $student ? $student->document : null;
        $alamatKK = $addresses->where('type', 'kk')->first();
        $alamatDomisili = $addresses->where('type', 'domisili')->first();
        $ayah = $parents->where('type', 'ayah')->first();
        $ibu = $parents->where('type', 'ibu')->first();
        $wali = $parents->where('type', 'wali')->first();
    @endphp

    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Review Data Pendaftaran</h2>
        <p class="text-sm text-gray-500 mt-1">Periksa kembali semua data pendaftaran kamu</p>
    </div>

    {{-- A. Data Murid --}}
    <x-card title="A. Data Murid" class="mb-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8 text-sm">
            <div><span class="text-gray-500">Nama Lengkap</span><p class="font-semibold text-gray-800 mt-0.5">{{ $student->nama_lengkap ?? '-' }}</p></div>
            <div><span class="text-gray-500">NISN</span><p class="font-semibold text-gray-800 mt-0.5">{{ Auth::user()->nisn ?? '-' }}</p></div>
            <div><span class="text-gray-500">NIK</span><p class="font-semibold text-gray-800 mt-0.5">{{ $student->nik ?? '-' }}</p></div>
            <div><span class="text-gray-500">Tempat, Tanggal Lahir</span><p class="font-semibold text-gray-800 mt-0.5">{{ ($student->tempat_lahir ?? '-') . ', ' . ($student->tanggal_lahir ?? '-') }}</p></div>
            <div><span class="text-gray-500">Agama</span><p class="font-semibold text-gray-800 mt-0.5">{{ $student->agama ?? '-' }}</p></div>
            <div><span class="text-gray-500">Nomor HP</span><p class="font-semibold text-gray-800 mt-0.5">{{ $student->no_hp ?? '-' }}</p></div>
            <div><span class="text-gray-500">No. SKL</span><p class="font-semibold text-gray-800 mt-0.5">{{ $student->no_skl ?? '-' }}</p></div>
        </div>
    </x-card>

    {{-- Alamat Murid --}}
    <x-card title="Alamat Murid" class="mb-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h4 class="text-sm font-bold text-primary-600 mb-3 flex items-center gap-2">
                    <span class="w-5 h-5 bg-primary-100 rounded-full flex items-center justify-center text-xs font-bold">A</span>
                    Alamat sesuai KK
                </h4>
                <div class="space-y-1 text-sm">
                    <p class="text-gray-800">{{ $alamatKK->alamat_lengkap ?? '-' }}</p>
                    <p class="text-gray-500">RT {{ $alamatKK->rt ?? '-' }} / RW {{ $alamatKK->rw ?? '-' }}, {{ $alamatKK->kelurahan ?? '-' }}, {{ $alamatKK->kecamatan ?? '-' }}</p>
                </div>
            </div>
            <div>
                <h4 class="text-sm font-bold text-primary-600 mb-3 flex items-center gap-2">
                    <span class="w-5 h-5 bg-primary-100 rounded-full flex items-center justify-center text-xs font-bold">B</span>
                    Alamat Domisili
                </h4>
                <div class="space-y-1 text-sm">
                    <p class="text-gray-800">{{ $alamatDomisili->alamat_lengkap ?? '-' }}</p>
                    <p class="text-gray-500">RT {{ $alamatDomisili->rt ?? '-' }} / RW {{ $alamatDomisili->rw ?? '-' }}, {{ $alamatDomisili->kelurahan ?? '-' }}, {{ $alamatDomisili->kecamatan ?? '-' }}</p>
                </div>
            </div>
        </div>
    </x-card>

    {{-- B. Data Ayah --}}
    @if($ayah)
        <x-card title="B. Data Ayah" class="mb-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-4 gap-x-8 text-sm">
                <div><span class="text-gray-500">Nama</span><p class="font-semibold text-gray-800 mt-0.5">{{ $ayah->nama ?? '-' }}</p></div>
                <div><span class="text-gray-500">NIK</span><p class="font-semibold text-gray-800 mt-0.5">{{ $ayah->nik ?? '-' }}</p></div>
                <div><span class="text-gray-500">Tempat, Tanggal Lahir</span><p class="font-semibold text-gray-800 mt-0.5">{{ ($ayah->tempat_lahir ?? '-') . ', ' . ($ayah->tanggal_lahir ?? '-') }}</p></div>
                <div><span class="text-gray-500">Pendidikan</span><p class="font-semibold text-gray-800 mt-0.5">{{ $ayah->pendidikan ?? '-' }}</p></div>
                <div><span class="text-gray-500">Pekerjaan</span><p class="font-semibold text-gray-800 mt-0.5">{{ $ayah->pekerjaan ?? '-' }}</p></div>
                <div><span class="text-gray-500">Penghasilan</span><p class="font-semibold text-gray-800 mt-0.5">{{ $ayah->penghasilan ?? '-' }}</p></div>
                <div><span class="text-gray-500">Nomor HP</span><p class="font-semibold text-gray-800 mt-0.5">{{ $ayah->no_hp ?? '-' }}</p></div>
            </div>

            <div class="mt-6 pt-5 border-t border-gray-100 grid grid-cols-1 md:grid-cols-2 gap-8 text-sm">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Alamat Sesuai KK</p>
                    <p class="text-gray-800 font-medium">{{ $ayah->kk_alamat ?? '-' }}</p>
                    <p class="text-gray-500">RT {{ $ayah->kk_rt ?? '-' }} / RW {{ $ayah->kk_rw ?? '-' }}, {{ $ayah->kk_kelurahan ?? '-' }}, {{ $ayah->kk_kecamatan ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Alamat Domisili</p>
                    <p class="text-gray-800 font-medium">{{ $ayah->domisili_alamat ?? '-' }}</p>
                    <p class="text-gray-500">RT {{ $ayah->domisili_rt ?? '-' }} / RW {{ $ayah->domisili_rw ?? '-' }}, {{ $ayah->domisili_kelurahan ?? '-' }}, {{ $ayah->domisili_kecamatan ?? '-' }}</p>
                </div>
            </div>
        </x-card>
    @endif

    {{-- C. Data Ibu --}}
    @if($ibu)
        <x-card title="C. Data Ibu" class="mb-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-4 gap-x-8 text-sm">
                <div><span class="text-gray-500">Nama</span><p class="font-semibold text-gray-800 mt-0.5">{{ $ibu->nama ?? '-' }}</p></div>
                <div><span class="text-gray-500">NIK</span><p class="font-semibold text-gray-800 mt-0.5">{{ $ibu->nik ?? '-' }}</p></div>
                <div><span class="text-gray-500">Tempat, Tanggal Lahir</span><p class="font-semibold text-gray-800 mt-0.5">{{ ($ibu->tempat_lahir ?? '-') . ', ' . ($ibu->tanggal_lahir ?? '-') }}</p></div>
                <div><span class="text-gray-500">Pendidikan</span><p class="font-semibold text-gray-800 mt-0.5">{{ $ibu->pendidikan ?? '-' }}</p></div>
                <div><span class="text-gray-500">Pekerjaan</span><p class="font-semibold text-gray-800 mt-0.5">{{ $ibu->pekerjaan ?? '-' }}</p></div>
                <div><span class="text-gray-500">Penghasilan</span><p class="font-semibold text-gray-800 mt-0.5">{{ $ibu->penghasilan ?? '-' }}</p></div>
                <div><span class="text-gray-500">Nomor HP</span><p class="font-semibold text-gray-800 mt-0.5">{{ $ibu->no_hp ?? '-' }}</p></div>
            </div>

            <div class="mt-6 pt-5 border-t border-gray-100 grid grid-cols-1 md:grid-cols-2 gap-8 text-sm">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Alamat Sesuai KK</p>
                    <p class="text-gray-800 font-medium">{{ $ibu->kk_alamat ?? '-' }}</p>
                    <p class="text-gray-500">RT {{ $ibu->kk_rt ?? '-' }} / RW {{ $ibu->kk_rw ?? '-' }}, {{ $ibu->kk_kelurahan ?? '-' }}, {{ $ibu->kk_kecamatan ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Alamat Domisili</p>
                    <p class="text-gray-800 font-medium">{{ $ibu->domisili_alamat ?? '-' }}</p>
                    <p class="text-gray-500">RT {{ $ibu->domisili_rt ?? '-' }} / RW {{ $ibu->domisili_rw ?? '-' }}, {{ $ibu->domisili_kelurahan ?? '-' }}, {{ $ibu->domisili_kecamatan ?? '-' }}</p>
                </div>
            </div>
        </x-card>
    @endif

    {{-- D. Data Wali (jika ada) --}}
    @if($wali && $wali->nama)
        <x-card title="D. Data Wali" class="mb-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-4 gap-x-8 text-sm">
                <div><span class="text-gray-500">Nama</span><p class="font-semibold text-gray-800 mt-0.5">{{ $wali->nama ?? '-' }}</p></div>
                <div><span class="text-gray-500">NIK</span><p class="font-semibold text-gray-800 mt-0.5">{{ $wali->nik ?? '-' }}</p></div>
                <div><span class="text-gray-500">Tempat, Tanggal Lahir</span><p class="font-semibold text-gray-800 mt-0.5">{{ ($wali->tempat_lahir ?? '-') . ', ' . ($wali->tanggal_lahir ?? '-') }}</p></div>
                <div><span class="text-gray-500">Pendidikan</span><p class="font-semibold text-gray-800 mt-0.5">{{ $wali->pendidikan ?? '-' }}</p></div>
                <div><span class="text-gray-500">Pekerjaan</span><p class="font-semibold text-gray-800 mt-0.5">{{ $wali->pekerjaan ?? '-' }}</p></div>
                <div><span class="text-gray-500">Penghasilan</span><p class="font-semibold text-gray-800 mt-0.5">{{ $wali->penghasilan ?? '-' }}</p></div>
                <div><span class="text-gray-500">Nomor HP</span><p class="font-semibold text-gray-800 mt-0.5">{{ $wali->no_hp ?? '-' }}</p></div>
            </div>

            <div class="mt-6 pt-5 border-t border-gray-100 grid grid-cols-1 md:grid-cols-2 gap-8 text-sm">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Alamat Sesuai KK</p>
                    <p class="text-gray-800 font-medium">{{ $wali->kk_alamat ?? '-' }}</p>
                    <p class="text-gray-500">RT {{ $wali->kk_rt ?? '-' }} / RW {{ $wali->kk_rw ?? '-' }}, {{ $wali->kk_kelurahan ?? '-' }}, {{ $wali->kk_kecamatan ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Alamat Domisili</p>
                    <p class="text-gray-800 font-medium">{{ $wali->domisili_alamat ?? '-' }}</p>
                    <p class="text-gray-500">RT {{ $wali->domisili_rt ?? '-' }} / RW {{ $wali->domisili_rw ?? '-' }}, {{ $wali->domisili_kelurahan ?? '-' }}, {{ $wali->domisili_kecamatan ?? '-' }}</p>
                </div>
            </div>
        </x-card>
    @endif

    {{-- E. Data Tambahan --}}
    <x-card title="E. Data Tambahan" class="mb-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-4 gap-x-8 text-sm">
            <div><span class="text-gray-500">Sekolah Asal</span><p class="font-semibold text-gray-800 mt-0.5">{{ $student->sekolah_asal ?? '-' }}</p></div>
            <div><span class="text-gray-500">Penerima Bantuan</span><p class="font-semibold text-gray-800 mt-0.5">{{ $student->penerima_bantuan ?? '-' }}</p></div>
            @if(($student->penerima_bantuan ?? '') == 'Ya')
                <div><span class="text-gray-500">Jenis Bantuan</span><p class="font-semibold text-gray-800 mt-0.5">{{ $student->jenis_bantuan ?? '-' }}</p></div>
                <div><span class="text-gray-500">Nomor Bantuan</span><p class="font-semibold text-gray-800 mt-0.5">{{ $student->nomor_bantuan ?? '-' }}</p></div>
            @endif
            <div><span class="text-gray-500">No. Reg Akta Lahir</span><p class="font-semibold text-gray-800 mt-0.5">{{ $student->no_reg_akta ?? '-' }}</p></div>
            <div><span class="text-gray-500">Anak Ke- / Dari</span><p class="font-semibold text-gray-800 mt-0.5">{{ ($student->anak_ke ?? '-') . ' dari ' . ($student->dari_saudara ?? '-') . ' bersaudara' }}</p></div>
            <div><span class="text-gray-500">No. KK</span><p class="font-semibold text-gray-800 mt-0.5">{{ $student->no_kk ?? '-' }}</p></div>
            <div><span class="text-gray-500">Tinggi / Berat Badan</span><p class="font-semibold text-gray-800 mt-0.5">{{ ($student->tinggi_badan ?? '-') . ' cm / ' . ($student->berat_badan ?? '-') . ' kg' }}</p></div>
            <div><span class="text-gray-500">Lingkar Kepala</span><p class="font-semibold text-gray-800 mt-0.5">{{ ($student->lingkar_kepala ?? '-') . ' cm' }}</p></div>
            <div><span class="text-gray-500">Hobi</span><p class="font-semibold text-gray-800 mt-0.5">{{ $student->hobi ?? '-' }}</p></div>
            <div><span class="text-gray-500">Cita-cita</span><p class="font-semibold text-gray-800 mt-0.5">{{ $student->cita_cita ?? '-' }}</p></div>
        </div>
    </x-card>

    {{-- Dokumen --}}
    <x-card title="Dokumen" class="mb-6">
        @php
            $docList = [
                'pas_foto' => 'Pas Foto',
                'kk' => 'Kartu Keluarga',
                'akta' => 'Akta Kelahiran',
                'rapor' => 'Rapor',
                'tka' => 'Sertifikat TKA',
                'ijazah' => 'SKL / Ijazah',
            ];
        @endphp
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
            @foreach($docList as $field => $label)
                <div class="flex items-center gap-2 p-3 rounded-lg {{ isset($document) && $document->$field ? 'bg-green-50 border border-green-200' : 'bg-gray-50 border border-gray-200' }}">
                    @if(isset($document) && $document->$field)
                        <svg class="w-5 h-5 text-green-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    @else
                        <svg class="w-5 h-5 text-gray-400 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    @endif
                    <span class="text-sm {{ isset($document) && $document->$field ? 'text-green-700 font-medium' : 'text-gray-500' }}">{{ $label }}</span>
                </div>
            @endforeach
        </div>
    </x-card>

    {{-- Action Buttons --}}
    <div class="flex justify-center p-5 sm:p-6 bg-white rounded-xl shadow-sm border border-gray-100">
        <x-button variant="accent" :href="url('/student/print')">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
            </svg>
            Cetak Formulir
        </x-button>
    </div>
@endsection
