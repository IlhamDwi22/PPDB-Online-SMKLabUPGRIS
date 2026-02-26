@extends('layouts.app')

@section('title', 'Step 4 — Data Tambahan Murid')

@section('content')
    <x-stepper :currentStep="4" />

    <x-card title="Data Tambahan Murid" subtitle="Informasi pendukung sesuai formulir resmi">
        <form method="POST" action="{{ url('/student/form/step/4') }}" x-data="{ penerimaBantuan: '{{ $student->penerima_bantuan ?? 'Tidak' }}' }">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                <x-input
                    label="Sekolah Asal"
                    name="sekolah_asal"
                    placeholder="Contoh: SMP Negeri 1 Semarang"
                    :value="$student->sekolah_asal ?? ''"
                    :required="true"
                />

                {{-- Penerima Bantuan --}}
                <div class="mb-1">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Penerima Bantuan <span class="text-red-500">*</span></label>
                    <div class="flex items-center gap-6 mt-1">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="penerima_bantuan" value="Ya" x-model="penerimaBantuan"
                                class="w-4 h-4 text-primary-600 border-gray-300 focus:ring-primary-500"
                                {{ ($student->penerima_bantuan ?? '') == 'Ya' ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700">Ya</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="penerima_bantuan" value="Tidak" x-model="penerimaBantuan"
                                class="w-4 h-4 text-primary-600 border-gray-300 focus:ring-primary-500"
                                {{ ($student->penerima_bantuan ?? 'Tidak') == 'Tidak' ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700">Tidak</span>
                        </label>
                    </div>
                </div>
            </div>

            {{-- Conditional: Jenis & Nomor Bantuan --}}
            <div x-show="penerimaBantuan === 'Ya'" x-transition class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5 mb-2">
                <x-select
                    label="Jenis Bantuan"
                    name="jenis_bantuan"
                    :options="['KIP' => 'KIP', 'KIS' => 'KIS', 'KKH' => 'KKH', 'PKH' => 'PKH']"
                    :selected="$student->jenis_bantuan ?? ''"
                />

                <x-input
                    label="Nomor Bantuan"
                    name="nomor_bantuan"
                    placeholder="Masukkan nomor bantuan"
                    :value="$student->nomor_bantuan ?? ''"
                />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                <x-input
                    label="No. Reg Akta Lahir"
                    name="no_reg_akta"
                    placeholder="Nomor registrasi akta kelahiran"
                    :value="$student->no_reg_akta ?? ''"
                    :required="true"
                />

                <x-input
                    label="No. KK"
                    name="no_kk"
                    placeholder="16 digit Nomor Kartu Keluarga"
                    :value="$student->no_kk ?? ''"
                    :required="true"
                    maxlength="16"
                />
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-x-5 gap-y-5">
                <x-input
                    label="Anak Ke-"
                    name="anak_ke"
                    type="number"
                    placeholder="1"
                    :value="$student->anak_ke ?? ''"
                    :required="true"
                    min="1"
                />

                <x-input
                    label="Dari (jumlah saudara)"
                    name="dari_saudara"
                    type="number"
                    placeholder="3"
                    :value="$student->dari_saudara ?? ''"
                    :required="true"
                    min="1"
                />

                <x-input
                    label="Tinggi Badan (cm)"
                    name="tinggi_badan"
                    type="number"
                    placeholder="165"
                    :value="$student->tinggi_badan ?? ''"
                    :required="true"
                />

                <x-input
                    label="Berat Badan (kg)"
                    name="berat_badan"
                    type="number"
                    placeholder="55"
                    :value="$student->berat_badan ?? ''"
                    :required="true"
                />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-5">
                <x-input
                    label="Lingkar Kepala (cm)"
                    name="lingkar_kepala"
                    type="number"
                    placeholder="56"
                    :value="$student->lingkar_kepala ?? ''"
                />

                <x-input
                    label="Hobi"
                    name="hobi"
                    placeholder="Contoh: Membaca, Olahraga"
                    :value="$student->hobi ?? ''"
                />

                <x-input
                    label="Cita-cita"
                    name="cita_cita"
                    placeholder="Contoh: Dokter, Insinyur"
                    :value="$student->cita_cita ?? ''"
                />
            </div>

            {{-- Navigation Buttons --}}
            <div class="flex justify-between mt-8 pt-6 border-t border-gray-100">
                <x-button variant="secondary" :href="url('/student/form/step/3')" type="button">
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
