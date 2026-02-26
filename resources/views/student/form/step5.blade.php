@extends('layouts.app')

@section('title', 'Step 5 — Upload Dokumen')

@section('content')
    <x-stepper :currentStep="5" />

    <x-card title="Upload Dokumen" subtitle="Unggah dokumen pendukung dalam format JPG, PNG, atau PDF (maks. 2MB per file)">
        <form method="POST" action="{{ url('/student/form/step/5') }}" enctype="multipart/form-data">
            @csrf

            @php
                $documents = [
                    ['name' => 'pas_foto', 'label' => 'Pas Foto', 'desc' => 'Ukuran 3x4, latar merah/biru', 'accept' => 'image/jpeg,image/png', 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
                    ['name' => 'kk', 'label' => 'Kartu Keluarga (KK)', 'desc' => 'Scan/foto halaman utama', 'accept' => 'image/jpeg,image/png,application/pdf', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                    ['name' => 'akta', 'label' => 'Akta Kelahiran', 'desc' => 'Scan/foto akta kelahiran', 'accept' => 'image/jpeg,image/png,application/pdf', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                    ['name' => 'rapor', 'label' => 'Rapor', 'desc' => 'Scan rapor semester terakhir', 'accept' => 'image/jpeg,image/png,application/pdf', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                    ['name' => 'tka', 'label' => 'Sertifikat TKA', 'desc' => 'Tes Kemampuan Akademik (jika ada)', 'accept' => 'image/jpeg,image/png,application/pdf', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
                    ['name' => 'ijazah', 'label' => 'SKL / Ijazah', 'desc' => 'Surat Keterangan Lulus atau Ijazah', 'accept' => 'image/jpeg,image/png,application/pdf', 'icon' => 'M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z'],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach($documents as $doc)
                    <div class="border border-gray-200 rounded-xl p-4 hover:border-primary-300 hover:bg-primary-50/30 transition-all duration-200">
                        <div class="flex items-start gap-3 mb-3">
                            <div class="w-10 h-10 bg-primary-100 text-primary-600 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $doc['icon'] }}"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">{{ $doc['label'] }}</p>
                                <p class="text-xs text-gray-500">{{ $doc['desc'] }}</p>
                            </div>
                        </div>

                        {{-- Show existing file if available --}}
                        @if(isset($document) && $document->{$doc['name']})
                            <div class="mb-2 p-2 bg-green-50 rounded-lg text-xs text-green-700 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                File sudah diunggah
                            </div>
                        @endif

                        <input
                            type="file"
                            name="{{ $doc['name'] }}"
                            accept="{{ $doc['accept'] }}"
                            class="w-full text-sm text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-600 hover:file:bg-primary-100 file:cursor-pointer file:transition-colors"
                        >

                        @error($doc['name'])
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach
            </div>

            <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                <p class="text-xs text-yellow-700 flex items-start gap-2">
                    <svg class="w-4 h-4 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                    </svg>
                    <span>Maksimal ukuran file: <strong>2MB</strong> per dokumen. Format: JPG, PNG, atau PDF.</span>
                </p>
            </div>

            {{-- Navigation Buttons --}}
            <div class="flex justify-between mt-6 pt-6 border-t border-gray-100">
                <x-button variant="secondary" :href="url('/student/form/step/4')" type="button">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                    </svg>
                    Kembali
                </x-button>
                <x-button variant="primary">
                    Simpan & Lanjut
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </x-button>
            </div>
        </form>
    </x-card>
@endsection
