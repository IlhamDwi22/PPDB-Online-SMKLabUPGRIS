@extends('layouts.app')

@section('title', 'Step 2 — Alamat Murid')

@section('content')
    <x-stepper :currentStep="2" />

    <form method="POST" action="{{ url('/student/form/step/2') }}">
        @csrf

        @php
            $alamatKK = $addresses->where('type', 'kk')->first();
            $alamatDomisili = $addresses->where('type', 'domisili')->first();
        @endphp

        {{-- Card A: Alamat sesuai KK --}}
        <x-card title="Alamat Sesuai Kartu Keluarga (KK)" class="mb-6">
            <div class="space-y-5">
                <x-textarea
                    label="Alamat Lengkap"
                    name="kk_alamat_lengkap"
                    placeholder="Jalan, Nomor Rumah, Gang, dll."
                    :value="$alamatKK->alamat_lengkap ?? ''"
                    :required="true"
                    :rows="2"
                />
                <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-5">
                    <x-input label="RT" name="kk_rt" placeholder="Contoh: 01" :value="$alamatKK->rt ?? ''" :required="true" />
                    <x-input label="RW" name="kk_rw" placeholder="Contoh: 05" :value="$alamatKK->rw ?? ''" :required="true" />
                    <x-input label="Kelurahan" name="kk_kelurahan" placeholder="Contoh: Bulusan" :value="$alamatKK->kelurahan ?? ''" :required="true" />
                    <x-input label="Kecamatan" name="kk_kecamatan" placeholder="Contoh: Tembalang" :value="$alamatKK->kecamatan ?? ''" :required="true" />
                </div>
            </div>
        </x-card>

        {{-- Card B: Alamat Domisili --}}
        <x-card title="Alamat Domisili" class="mb-6">
            <div class="space-y-5">
                <x-textarea
                    label="Alamat Lengkap"
                    name="domisili_alamat_lengkap"
                    placeholder="Jalan, Nomor Rumah, Gang, dll."
                    :value="$alamatDomisili->alamat_lengkap ?? ''"
                    :required="true"
                    :rows="2"
                />
                <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-5">
                    <x-input label="RT" name="domisili_rt" placeholder="Contoh: 01" :value="$alamatDomisili->rt ?? ''" :required="true" />
                    <x-input label="RW" name="domisili_rw" placeholder="Contoh: 05" :value="$alamatDomisili->rw ?? ''" :required="true" />
                    <x-input label="Kelurahan" name="domisili_kelurahan" placeholder="Contoh: Bulusan" :value="$alamatDomisili->kelurahan ?? ''" :required="true" />
                    <x-input label="Kecamatan" name="domisili_kecamatan" placeholder="Contoh: Tembalang" :value="$alamatDomisili->kecamatan ?? ''" :required="true" />
                </div>
            </div>
        </x-card>

        {{-- Navigation Buttons --}}
        <div class="flex justify-between mt-2">
            <x-button variant="secondary" :href="url('/student/form/step/1')" type="button">
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
@endsection
