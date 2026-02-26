@extends('layouts.app')

@section('title', 'Step 3 — Data Orang Tua')

@section('content')
    <x-stepper :currentStep="3" />

    <form method="POST" action="{{ url('/student/form/step/3') }}">
        @csrf

        @php
            $ayah = $parents->where('type', 'ayah')->first();
            $ibu = $parents->where('type', 'ibu')->first();
            $wali = $parents->where('type', 'wali')->first();

            $pendidikanOptions = [
                'SD' => 'SD / Sederajat',
                'SMP' => 'SMP / Sederajat',
                'SMA' => 'SMA / Sederajat',
                'D1' => 'Diploma 1',
                'D2' => 'Diploma 2',
                'D3' => 'Diploma 3',
                'S1' => 'Sarjana (S1)',
                'S2' => 'Magister (S2)',
                'S3' => 'Doktor (S3)',
                'Lainnya' => 'Lainnya',
            ];

            $pekerjaanOptions = [
                'PNS' => 'PNS',
                'TNI/Polri' => 'TNI/Polri',
                'Karyawan Swasta' => 'Karyawan Swasta',
                'Wiraswasta' => 'Wiraswasta',
                'Petani' => 'Petani',
                'Nelayan' => 'Nelayan',
                'Buruh' => 'Buruh',
                'Lainnya' => 'Lainnya',
                'Tidak Bekerja' => 'Tidak Bekerja',
            ];

            $penghasilanOptions = [
                '500.000 – 999.999' => 'Rp 500.000 – Rp 999.999',
                '1.000.000 – 1.999.999' => 'Rp 1.000.000 – Rp 1.999.999',
                '2.000.000 – 4.999.999' => 'Rp 2.000.000 – Rp 4.999.999',
                'Lebih dari 5.000.000' => 'Lebih dari Rp 5.000.000',
            ];
        @endphp

        {{-- ======================== DATA AYAH ======================== --}}
        <div class="mb-5">
            <x-expandable-card title="Data Ayah" badge="1" badgeColor="blue" :expanded="true">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Data Pribadi</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                    <x-input label="Nama" name="ayah_nama" :value="$ayah->nama ?? ''" :required="true" placeholder="Nama lengkap ayah" />
                    <x-input label="NIK" name="ayah_nik" :value="$ayah->nik ?? ''" :required="true" placeholder="16 digit NIK" maxlength="16" />
                    <x-input label="Tempat Lahir" name="ayah_tempat_lahir" :value="$ayah->tempat_lahir ?? ''" :required="true" placeholder="Contoh: Semarang" />
                    <x-input label="Tanggal Lahir" name="ayah_tanggal_lahir" type="date" :value="$ayah->tanggal_lahir ?? ''" :required="true" />
                    <x-select label="Pendidikan" name="ayah_pendidikan" :options="$pendidikanOptions" :selected="$ayah->pendidikan ?? ''" :required="true" />
                    <x-select label="Pekerjaan" name="ayah_pekerjaan" :options="$pekerjaanOptions" :selected="$ayah->pekerjaan ?? ''" :required="true" />
                    <x-select label="Penghasilan per Bulan" name="ayah_penghasilan" :options="$penghasilanOptions" :selected="$ayah->penghasilan ?? ''" :required="true" />
                    <x-input label="Nomor HP" name="ayah_no_hp" type="tel" :value="$ayah->no_hp ?? ''" :required="true" placeholder="Contoh: 08123456789" />
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Alamat Ayah — Sesuai KK</p>
                    <div class="space-y-5">
                        <x-textarea label="Alamat Lengkap" name="ayah_kk_alamat" :value="$ayah->kk_alamat ?? ''" :required="true" placeholder="Jalan, Nomor Rumah" :rows="2" />
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-5 gap-y-5">
                            <x-input label="RT" name="ayah_kk_rt" :value="$ayah->kk_rt ?? ''" :required="true" placeholder="01" />
                            <x-input label="RW" name="ayah_kk_rw" :value="$ayah->kk_rw ?? ''" :required="true" placeholder="05" />
                            <x-input label="Kelurahan" name="ayah_kk_kelurahan" :value="$ayah->kk_kelurahan ?? ''" :required="true" placeholder="Bulusan" />
                            <x-input label="Kecamatan" name="ayah_kk_kecamatan" :value="$ayah->kk_kecamatan ?? ''" :required="true" placeholder="Tembalang" />
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Alamat Ayah — Domisili</p>
                    <div class="space-y-5">
                        <x-textarea label="Alamat Lengkap" name="ayah_domisili_alamat" :value="$ayah->domisili_alamat ?? ''" :required="true" placeholder="Jalan, Nomor Rumah" :rows="2" />
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-5 gap-y-5">
                            <x-input label="RT" name="ayah_domisili_rt" :value="$ayah->domisili_rt ?? ''" :required="true" placeholder="01" />
                            <x-input label="RW" name="ayah_domisili_rw" :value="$ayah->domisili_rw ?? ''" :required="true" placeholder="05" />
                            <x-input label="Kelurahan" name="ayah_domisili_kelurahan" :value="$ayah->domisili_kelurahan ?? ''" :required="true" placeholder="Bulusan" />
                            <x-input label="Kecamatan" name="ayah_domisili_kecamatan" :value="$ayah->domisili_kecamatan ?? ''" :required="true" placeholder="Tembalang" />
                        </div>
                    </div>
                </div>
            </x-expandable-card>
        </div>

        {{-- ======================== DATA IBU ======================== --}}
        <div class="mb-5">
            <x-expandable-card title="Data Ibu" badge="2" badgeColor="pink" :expanded="true">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Data Pribadi</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                    <x-input label="Nama" name="ibu_nama" :value="$ibu->nama ?? ''" :required="true" placeholder="Nama lengkap ibu" />
                    <x-input label="NIK" name="ibu_nik" :value="$ibu->nik ?? ''" :required="true" placeholder="16 digit NIK" maxlength="16" />
                    <x-input label="Tempat Lahir" name="ibu_tempat_lahir" :value="$ibu->tempat_lahir ?? ''" :required="true" placeholder="Contoh: Semarang" />
                    <x-input label="Tanggal Lahir" name="ibu_tanggal_lahir" type="date" :value="$ibu->tanggal_lahir ?? ''" :required="true" />
                    <x-select label="Pendidikan" name="ibu_pendidikan" :options="$pendidikanOptions" :selected="$ibu->pendidikan ?? ''" :required="true" />
                    <x-select label="Pekerjaan" name="ibu_pekerjaan" :options="$pekerjaanOptions" :selected="$ibu->pekerjaan ?? ''" :required="true" />
                    <x-select label="Penghasilan per Bulan" name="ibu_penghasilan" :options="$penghasilanOptions" :selected="$ibu->penghasilan ?? ''" :required="true" />
                    <x-input label="Nomor HP" name="ibu_no_hp" type="tel" :value="$ibu->no_hp ?? ''" :required="true" placeholder="Contoh: 08123456789" />
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Alamat Ibu — Sesuai KK</p>
                    <div class="space-y-5">
                        <x-textarea label="Alamat Lengkap" name="ibu_kk_alamat" :value="$ibu->kk_alamat ?? ''" :required="true" placeholder="Jalan, Nomor Rumah" :rows="2" />
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-5 gap-y-5">
                            <x-input label="RT" name="ibu_kk_rt" :value="$ibu->kk_rt ?? ''" :required="true" placeholder="01" />
                            <x-input label="RW" name="ibu_kk_rw" :value="$ibu->kk_rw ?? ''" :required="true" placeholder="05" />
                            <x-input label="Kelurahan" name="ibu_kk_kelurahan" :value="$ibu->kk_kelurahan ?? ''" :required="true" placeholder="Bulusan" />
                            <x-input label="Kecamatan" name="ibu_kk_kecamatan" :value="$ibu->kk_kecamatan ?? ''" :required="true" placeholder="Tembalang" />
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Alamat Ibu — Domisili</p>
                    <div class="space-y-5">
                        <x-textarea label="Alamat Lengkap" name="ibu_domisili_alamat" :value="$ibu->domisili_alamat ?? ''" :required="true" placeholder="Jalan, Nomor Rumah" :rows="2" />
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-5 gap-y-5">
                            <x-input label="RT" name="ibu_domisili_rt" :value="$ibu->domisili_rt ?? ''" :required="true" placeholder="01" />
                            <x-input label="RW" name="ibu_domisili_rw" :value="$ibu->domisili_rw ?? ''" :required="true" placeholder="05" />
                            <x-input label="Kelurahan" name="ibu_domisili_kelurahan" :value="$ibu->domisili_kelurahan ?? ''" :required="true" placeholder="Bulusan" />
                            <x-input label="Kecamatan" name="ibu_domisili_kecamatan" :value="$ibu->domisili_kecamatan ?? ''" :required="true" placeholder="Tembalang" />
                        </div>
                    </div>
                </div>
            </x-expandable-card>
        </div>

        {{-- ======================== DATA WALI (OPSIONAL) ======================== --}}
        <div class="mb-5">
            <x-expandable-card title="Data Wali" subtitle="Opsional — isi jika berbeda dari orang tua" badge="3" badgeColor="gray" :expanded="false">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Data Pribadi</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                    <x-input label="Nama" name="wali_nama" :value="$wali->nama ?? ''" placeholder="Nama lengkap wali" />
                    <x-input label="NIK" name="wali_nik" :value="$wali->nik ?? ''" placeholder="16 digit NIK" maxlength="16" />
                    <x-input label="Tempat Lahir" name="wali_tempat_lahir" :value="$wali->tempat_lahir ?? ''" placeholder="Contoh: Semarang" />
                    <x-input label="Tanggal Lahir" name="wali_tanggal_lahir" type="date" :value="$wali->tanggal_lahir ?? ''" />
                    <x-select label="Pendidikan" name="wali_pendidikan" :options="$pendidikanOptions" :selected="$wali->pendidikan ?? ''" />
                    <x-select label="Pekerjaan" name="wali_pekerjaan" :options="$pekerjaanOptions" :selected="$wali->pekerjaan ?? ''" />
                    <x-select label="Penghasilan per Bulan" name="wali_penghasilan" :options="$penghasilanOptions" :selected="$wali->penghasilan ?? ''" />
                    <x-input label="Nomor HP" name="wali_no_hp" type="tel" :value="$wali->no_hp ?? ''" placeholder="Contoh: 08123456789" />
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Alamat Wali — Sesuai KK</p>
                    <div class="space-y-5">
                        <x-textarea label="Alamat Lengkap" name="wali_kk_alamat" :value="$wali->kk_alamat ?? ''" placeholder="Jalan, Nomor Rumah" :rows="2" />
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-5 gap-y-5">
                            <x-input label="RT" name="wali_kk_rt" :value="$wali->kk_rt ?? ''" placeholder="01" />
                            <x-input label="RW" name="wali_kk_rw" :value="$wali->kk_rw ?? ''" placeholder="05" />
                            <x-input label="Kelurahan" name="wali_kk_kelurahan" :value="$wali->kk_kelurahan ?? ''" placeholder="Bulusan" />
                            <x-input label="Kecamatan" name="wali_kk_kecamatan" :value="$wali->kk_kecamatan ?? ''" placeholder="Tembalang" />
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Alamat Wali — Domisili</p>
                    <div class="space-y-5">
                        <x-textarea label="Alamat Lengkap" name="wali_domisili_alamat" :value="$wali->domisili_alamat ?? ''" placeholder="Jalan, Nomor Rumah" :rows="2" />
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-5 gap-y-5">
                            <x-input label="RT" name="wali_domisili_rt" :value="$wali->domisili_rt ?? ''" placeholder="01" />
                            <x-input label="RW" name="wali_domisili_rw" :value="$wali->domisili_rw ?? ''" placeholder="05" />
                            <x-input label="Kelurahan" name="wali_domisili_kelurahan" :value="$wali->domisili_kelurahan ?? ''" placeholder="Bulusan" />
                            <x-input label="Kecamatan" name="wali_domisili_kecamatan" :value="$wali->domisili_kecamatan ?? ''" placeholder="Tembalang" />
                        </div>
                    </div>
                </div>
            </x-expandable-card>
        </div>

        {{-- Navigation Buttons --}}
        <div class="flex justify-between mt-2">
            <x-button variant="secondary" :href="url('/student/form/step/2')" type="button">
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
