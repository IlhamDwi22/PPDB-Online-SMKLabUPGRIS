<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran — SMK Laboratorium UPGRIS</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
            background: #e5e7eb;
        }

        .print-container {
            max-width: 210mm;
            margin: 20px auto;
            background: white;
            padding: 15mm 20mm;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12);
        }

        /* === HEADER / KOP === */
        .kop {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            padding-bottom: 10px;
            border-bottom: 3px double #000;
            margin-bottom: 16px;
        }
        .kop img {
            width: 90px;
            height: auto;
        }
        .kop-text {
            flex: 1;
            /* no flex:1 so it stays centered with the logo */
        }
        .kop-text .line1 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13pt;
            font-weight: bold;
            
        }
        .kop-text .line2 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18pt;
            font-weight: bold;
            color: #1a3a7a;
        }
        .kop-text .line3 {
            font-size: 10pt;
        }

        /* === TITLE === */
        .form-title {
            text-align: center;
            font-weight: bold;
            font-size: 12pt;
            margin-bottom: 16px;
            line-height: 1.6;
        }

        /* === NO PENDAFTARAN === */
        .no-pendaftaran {
            display: table;
            margin: 0 auto;
            width: 65%;
            border: 1px solid #000;
            padding: 4px 16px;
            font-weight: bold;
            font-size: 11pt;
            margin-bottom: 16px;
        }

        /* === SECTION HEADERS === */
        .section-header {
            font-weight: bold;
            font-size: 12pt;
            margin-top: 12px;
            margin-bottom: 6px;
        }

        /* === DATA ROWS === */
        .data-row {
            display: flex;
            align-items: baseline;
            min-height: 24px;
            font-size: 11pt;
        }
        .data-label {
            width: 170px;
            flex-shrink: 0;
            padding-left: 24px;
        }
        .data-colon {
            width: 14px;
            flex-shrink: 0;
        }
        .data-value {
            flex: 1;
            border-bottom: 1px dotted #666;
            min-height: 20px;
            padding-bottom: 1px;
        }
        .data-value.no-dots {
            border-bottom: none;
        }

        /* === PENGHASILAN CHECKBOXES === */
        .penghasilan-group {
            flex: 1;
        }
        .penghasilan-group .cb-row {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 11pt;
            line-height: 1.8;
        }
        .cb {
            display: inline-block;
            width: 13px;
            height: 13px;
            border: 1px solid #000;
            text-align: center;
            line-height: 13px;
            font-size: 10pt;
            vertical-align: middle;
        }
        .cb.checked::after {
            content: '✓';
        }

        /* === PENERIMA BANTUAN === */
        .inline-cb {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-right: 24px;
            font-size: 11pt;
        }

        /* === FOOTER === */
        .declaration-area {
            display: flex;
            gap: 20px;
            margin-top: 36px;
            align-items: flex-start;
        }
        .foto-box {
            width: 100px;
            height: 130px;
            border: 1px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 10pt;
            flex-shrink: 0;
        }
        .declaration-text {
            flex: 1;
            font-size: 11pt;
            text-align: justify;
            line-height: 1.6;
        }

        .signature-area {
            text-align: right;
            margin-top: 24px;
            font-size: 11pt;
        }
        .signature-area .sig-line {
            margin-top: 60px;
        }

        /* === PRINT BUTTON === */
        .no-print {
            max-width: 210mm;
            margin: 16px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #4b5563;
            text-decoration: none;
            font-family: system-ui, sans-serif;
        }
        .btn-back:hover { color: #4f46e5; }
        .btn-print {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 20px;
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: system-ui, sans-serif;
        }
        .btn-print:hover { background: #4338ca; }

        /* === PRINT STYLES === */
        @media print {
            @page {
                size: A4;
                margin: 15mm;
            }
            body {
                background: white;
            }
            .no-print { display: none !important; }
            .print-container {
                max-width: none;
                margin: 0;
                padding: 0;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

    @php
        $student = Auth::user()->student ?? null;
        $addresses = $student ? $student->addresses : collect();
        $parents = $student ? $student->parents : collect();
        $alamatKK = $addresses->where('type', 'kk')->first();
        $alamatDomisili = $addresses->where('type', 'domisili')->first();
        $ayah = $parents->where('type', 'ayah')->first();
        $ibu = $parents->where('type', 'ibu')->first();
        $wali = $parents->where('type', 'wali')->first();

        $penghasilanOptions = [
            '500.000 – 999.999',
            '1.000.000 – 1.999.999',
            '2.000.000 – 4.999.999',
            'Lebih dari 5.000.000',
        ];
    @endphp

    {{-- Print Button --}}
    <div class="no-print">
        <a href="{{ url('/student/dashboard') }}" class="btn-back">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
            </svg>
            Kembali ke Dashboard
        </a>
        <button onclick="window.print()" class="btn-print">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
            </svg>
            Cetak
        </button>
    </div>

    {{-- ==================== PRINT CONTAINER ==================== --}}
    <div class="print-container">

        {{-- === KOP SEKOLAH === --}}
        <div class="kop">
            <img src="{{ asset('images/logo-sma-lab.png') }}" alt="Logo">
            <div class="kop-text">
                <div class="line1">BADAN PENGELOLA LAB SCHOOL</div>
                <div class="line2">SMA Laboratorium UPGRIS</div>
                <div class="line3">Jalan Gajah Raya Nomor 40, Kota Semarang</div>
                <div class="line3">Telepon (024) 8465461 | Email: smklabschoolupgris@gmail.com</div>
            </div>
        </div>

        {{-- === TITLE === --}}
        <div class="form-title">
            FORMULIR PENDAFTARAN<br>
            PENERIMAAN MURID BARU<br>
            SMA LABORATORIUM UPGRIS<br>
            TAHUN AJARAN {{ date('Y') }}/{{ date('Y') + 1 }}
        </div>

        {{-- === NO PENDAFTARAN === --}}
        <div class="no-pendaftaran">
            NO. PENDAFTARAN : {{ $student->no_pendaftaran ?? ''}}
        </div>

        {{-- ============================================================ --}}
        {{-- A. DATA MURID                                                --}}
        {{-- ============================================================ --}}
        <div class="section-header">A. Data Murid</div>

        @php
            $muridRows = [
                'Nama' => $student->nama_lengkap ?? '',
                'NISN' => Auth::user()->nisn ?? '',
                'Tempat, Tgl. Lahir' => ($student->tempat_lahir ?? '') . ', ' . ($student->tanggal_lahir ?? ''),
                'NIK' => $student->nik ?? '',
                'Agama' => $student->agama ?? '',
                'Alamat KK' => $alamatKK->alamat_lengkap ?? '',
                'RT/RW' => ($alamatKK->rt ?? '') . ' / ' . ($alamatKK->rw ?? ''),
                'Kelurahan' => $alamatKK->kelurahan ?? '',
                'Kecamatan' => $alamatKK->kecamatan ?? '',
                'Alamat Domisili' => $alamatDomisili->alamat_lengkap ?? '',
                'RT/RW ' => ($alamatDomisili->rt ?? '') . ' / ' . ($alamatDomisili->rw ?? ''),
                'Kelurahan ' => $alamatDomisili->kelurahan ?? '',
                'Kecamatan ' => $alamatDomisili->kecamatan ?? '',
                'HP' => $student->no_hp ?? '',
                'No. SKL' => $student->no_skl ?? '',
            ];
        @endphp

        @foreach($muridRows as $label => $value)
            <div class="data-row">
                <div class="data-label">{{ trim($label) }}</div>
                <div class="data-colon">:</div>
                <div class="data-value">{{ $value }}</div>
            </div>
        @endforeach

        {{-- ============================================================ --}}
        {{-- B. DATA AYAH                                                 --}}
        {{-- ============================================================ --}}
        <div class="section-header">B. Data Ayah</div>

        <div class="data-row">
            <div class="data-label">Nama</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ayah->nama ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Tempat, Tgl. Lahir</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ ($ayah->tempat_lahir ?? '') . ', ' . ($ayah->tanggal_lahir ?? '') }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Pendidikan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ayah->pendidikan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Pekerjaan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ayah->pekerjaan ?? '' }}</div>
        </div>
        <div class="data-row" style="align-items: flex-start;">
            <div class="data-label">Penghasilan</div>
            <div class="data-colon">:</div>
            <div class="penghasilan-group">
                @foreach($penghasilanOptions as $opt)
                    <div class="cb-row">
                        <span class="cb {{ ($ayah->penghasilan ?? '') == $opt ? 'checked' : '' }}"></span>
                        {{ $opt }}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="data-row">
            <div class="data-label">NIK</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ayah->nik ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Alamat KK</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ayah->kk_alamat ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">RT/RW</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ ($ayah->kk_rt ?? '') . ' / ' . ($ayah->kk_rw ?? '') }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kelurahan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ayah->kk_kelurahan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kecamatan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ayah->kk_kecamatan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Alamat Domisili</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ayah->domisili_alamat ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">RT/RW</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ ($ayah->domisili_rt ?? '') . ' / ' . ($ayah->domisili_rw ?? '') }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kelurahan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ayah->domisili_kelurahan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kecamatan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ayah->domisili_kecamatan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">HP</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ayah->no_hp ?? '' }}</div>
        </div>

        {{-- ============================================================ --}}
        {{-- C. DATA IBU                                                  --}}
        {{-- ============================================================ --}}
        <div class="section-header">C. Data Ibu</div>

        <div class="data-row">
            <div class="data-label">Nama</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ibu->nama ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Tempat, Tgl. Lahir</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ ($ibu->tempat_lahir ?? '') . ', ' . ($ibu->tanggal_lahir ?? '') }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Pendidikan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ibu->pendidikan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Pekerjaan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ibu->pekerjaan ?? '' }}</div>
        </div>
        <div class="data-row" style="align-items: flex-start;">
            <div class="data-label">Penghasilan</div>
            <div class="data-colon">:</div>
            <div class="penghasilan-group">
                @foreach($penghasilanOptions as $opt)
                    <div class="cb-row">
                        <span class="cb {{ ($ibu->penghasilan ?? '') == $opt ? 'checked' : '' }}"></span>
                        {{ $opt }}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="data-row">
            <div class="data-label">NIK</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ibu->nik ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Alamat KK</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ibu->kk_alamat ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">RT/RW</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ ($ibu->kk_rt ?? '') . ' / ' . ($ibu->kk_rw ?? '') }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kelurahan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ibu->kk_kelurahan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kecamatan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ibu->kk_kecamatan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Alamat Domisili</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ibu->domisili_alamat ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">RT/RW</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ ($ibu->domisili_rt ?? '') . ' / ' . ($ibu->domisili_rw ?? '') }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kelurahan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ibu->domisili_kelurahan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kecamatan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ibu->domisili_kecamatan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">HP</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $ibu->no_hp ?? '' }}</div>
        </div>

        {{-- ============================================================ --}}
        {{-- D. DATA WALI                                                 --}}
        {{-- ============================================================ --}}
        <div class="section-header">D. Data Wali</div>

        <div class="data-row">
            <div class="data-label">Nama</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $wali->nama ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Tempat, Tgl. Lahir</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ ($wali->tempat_lahir ?? '') . ', ' . ($wali->tanggal_lahir ?? '') }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Pendidikan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $wali->pendidikan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Pekerjaan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $wali->pekerjaan ?? '' }}</div>
        </div>
        <div class="data-row" style="align-items: flex-start;">
            <div class="data-label">Penghasilan</div>
            <div class="data-colon">:</div>
            <div class="penghasilan-group">
                @foreach($penghasilanOptions as $opt)
                    <div class="cb-row">
                        <span class="cb {{ ($wali->penghasilan ?? '') == $opt ? 'checked' : '' }}"></span>
                        {{ $opt }}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="data-row">
            <div class="data-label">NIK</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $wali->nik ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Alamat KK</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $wali->kk_alamat ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">RT/RW</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ ($wali->kk_rt ?? '') . ' / ' . ($wali->kk_rw ?? '') }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kelurahan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $wali->kk_kelurahan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kecamatan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $wali->kk_kecamatan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Alamat Domisili</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $wali->domisili_alamat ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">RT/RW</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ ($wali->domisili_rt ?? '') . ' / ' . ($wali->domisili_rw ?? '') }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kelurahan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $wali->domisili_kelurahan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Kecamatan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $wali->domisili_kecamatan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">HP</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $wali->no_hp ?? '' }}</div>
        </div>

        {{-- ============================================================ --}}
        {{-- E. DATA TAMBAHAN MURID                                       --}}
        {{-- ============================================================ --}}
        <div class="section-header">E. Data Tambahan Murid</div>

        <div class="data-row">
            <div class="data-label">Sekolah Asal</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $student->sekolah_asal ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Penerima<br><span style="font-size:9pt">(KIP/KIS/KKH/PKH)*</span></div>
            <div class="data-colon">:</div>
            <div class="data-value no-dots" style="display: flex; gap: 24px; align-items: center;">
                <span class="inline-cb">
                    <span class="cb {{ ($student->penerima_bantuan ?? '') == 'Ya' ? 'checked' : '' }}"></span> Ya
                </span>
                <span class="inline-cb">
                    <span class="cb {{ ($student->penerima_bantuan ?? '') != 'Ya' ? 'checked' : '' }}"></span> Tidak
                </span>
            </div>
        </div>
        <div class="data-row">
            <div class="data-label">Nomor<br><span style="font-size:9pt">(KIP/KIS/KKH/PKH)*</span></div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $student->nomor_bantuan ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">No. Reg. Akta Lahir</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $student->no_reg_akta ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Anak Ke-</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ ($student->anak_ke ?? '') . ' dari ' . ($student->dari_saudara ?? '') . ' bersaudara' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">No. KK</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $student->no_kk ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Tinggi Badan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ ($student->tinggi_badan ?? '') ? ($student->tinggi_badan . ' cm') : '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Berat Badan</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ ($student->berat_badan ?? '') ? ($student->berat_badan . ' kg') : '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Lingkar Kepala</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ ($student->lingkar_kepala ?? '') ? ($student->lingkar_kepala . ' cm') : '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Hobi</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $student->hobi ?? '' }}</div>
        </div>
        <div class="data-row">
            <div class="data-label">Cita-cita</div>
            <div class="data-colon">:</div>
            <div class="data-value">{{ $student->cita_cita ?? '' }}</div>
        </div>

        <p style="font-size: 9pt; margin-top: 4px;">*) Coret salah satu yang tidak perlu</p>

        {{-- ============================================================ --}}
        {{-- PERNYATAAN & TANDA TANGAN                                    --}}
        {{-- ============================================================ --}}
        <div class="declaration-area">
            <div class="foto-box">
                Pas Foto<br>3 x 4 cm
            </div>
            <div class="declaration-text">
                Data yang saya isikan pada Formulir Pendaftaran Penerimaan Murid Baru SMK Laboratorium UPGRIS tahun ajaran {{ date('Y') }}/{{ date('Y') + 1 }} adalah data yang sebenar-benarnya, jika di kemudian hari ditemukan kekeliruan pada data formulir ini, saya siap untuk bertanggung jawab.
            </div>
        </div>

        <div class="signature-area">
            Semarang, .................. {{ date('Y') }}<br>
            Calon Murid,<br>
            <div class="sig-line">
                ………………………………
            </div>
        </div>

    </div>

</body>
</html>
