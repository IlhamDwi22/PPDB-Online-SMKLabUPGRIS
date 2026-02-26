@extends('layouts.app')

@section('title', 'Step 1 — Data Murid')

@section('content')
    <x-stepper :currentStep="1" />

    <x-card title="Data Murid" subtitle="Lengkapi data pribadi calon peserta didik">
        <form method="POST" action="{{ url('/student/form/step/1') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                <x-input
                    label="Nama Lengkap"
                    name="nama_lengkap"
                    placeholder="Sesuai ijazah / akta kelahiran"
                    :value="$student->nama_lengkap ?? ''"
                    :required="true"
                />

                <x-input
                    label="NISN"
                    name="nisn"
                    placeholder="10 digit NISN"
                    :value="$student->nisn ?? Auth::user()->nisn ?? ''"
                    :required="true"
                    :disabled="true"
                />

                <x-input
                    label="NIK"
                    name="nik"
                    placeholder="16 digit Nomor Induk Kependudukan"
                    :value="$student->nik ?? ''"
                    :required="true"
                    maxlength="16"
                    pattern="[0-9]{16}"
                    title="NIK harus 16 digit angka"
                />

                <x-input
                    label="Tempat Lahir"
                    name="tempat_lahir"
                    placeholder="Contoh: Semarang"
                    :value="$student->tempat_lahir ?? ''"
                    :required="true"
                />

                <x-input
                    label="Tanggal Lahir"
                    name="tanggal_lahir"
                    type="date"
                    :value="$student->tanggal_lahir ?? ''"
                    :required="true"
                />

                <x-select
                    label="Agama"
                    name="agama"
                    :options="['Islam' => 'Islam', 'Kristen' => 'Kristen', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Konghucu' => 'Konghucu']"
                    :selected="$student->agama ?? ''"
                    :required="true"
                />

                <x-input
                    label="Nomor HP"
                    name="no_hp"
                    type="tel"
                    placeholder="Contoh: 08123456789"
                    :value="$student->no_hp ?? ''"
                    :required="true"
                />

                <x-input
                    label="No. SKL"
                    name="no_skl"
                    placeholder="Nomor Surat Keterangan Lulus (jika sudah ada)"
                    :value="$student->no_skl ?? ''"
                />
            </div>

            {{-- Navigation Buttons --}}
            <div class="flex justify-end mt-8 pt-6 border-t border-gray-100">
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
