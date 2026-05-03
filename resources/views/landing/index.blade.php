<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Penerimaan Murid Baru (PMB) SMA Laboratorium UPGRIS Tahun Ajaran 2026/2027. Daftar sekarang secara online! SPP hanya Rp 265.000/bulan, Akreditasi A.">
    <meta name="keywords" content="PPDB, SMA Laboratorium UPGRIS, Penerimaan Murid Baru, SMA Semarang, Pendaftaran Siswa Baru">
    <title>PMB 2026/2027 — SMA Laboratorium UPGRIS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-white font-['Poppins'] text-gray-800 antialiased">

    {{-- ═══════════════════════════════════════════
         1. NAVBAR
    ═══════════════════════════════════════════ --}}
    <nav id="navbar" class="fixed top-0 inset-x-0 z-50 bg-white border-b border-gray-100 transition-shadow duration-300">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                {{-- Logo --}}
                <a href="/" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo-sma-lab.png') }}" alt="Logo SMA Lab UPGRIS" class="w-10 h-10 object-contain transition-transform group-hover:scale-110">
                    <div class="hidden sm:block">
                        <h1 class="text-base font-bold text-gray-800 leading-tight">SMA Laboratorium</h1>
                        <p class="text-xs text-gray-500 leading-tight">UPGRIS</p>
                    </div>
                </a>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center gap-3">
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-primary-600 hover:text-primary-700 hover:bg-primary-50 rounded-xl transition-all duration-200">
                        <i data-lucide="log-in" class="w-4 h-4"></i> Masuk
                    </a>
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 rounded-xl shadow-md shadow-primary-200 hover:shadow-lg hover:shadow-primary-300 transition-all duration-200">
                        <i data-lucide="user-plus" class="w-4 h-4"></i> Daftar
                    </a>
                </div>

                {{-- Mobile Hamburger --}}
                <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors" aria-label="Open menu">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>

            {{-- Mobile Menu --}}
            <div id="mobile-menu" class="md:hidden hidden pb-4 border-t border-gray-100 mt-2 pt-4">
                <div class="flex flex-col gap-2">
                    <a href="{{ route('login') }}" class="flex items-center gap-2 px-4 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-50 rounded-xl transition-colors">
                        <i data-lucide="log-in" class="w-4 h-4"></i> Masuk
                    </a>
                    <a href="{{ route('register') }}" class="flex items-center justify-center gap-2 px-4 py-3 text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 rounded-xl text-center transition-colors">
                        <i data-lucide="user-plus" class="w-4 h-4"></i> Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- ═══════════════════════════════════════════
         2. HERO SECTION
    ═══════════════════════════════════════════ --}}
    <section id="hero" class="relative pt-24 pb-16 md:pt-28 md:pb-24 overflow-hidden invisible">
        
        {{-- Background Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-[#730101] via-[#850101] to-[#5e0000]"></div>
        {{-- Decorative Blobs --}}
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-accent-400/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-red-400/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/3"></div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                
                {{-- Left: Text --}}
                {{-- Tambahkan ID hero-text-container --}}
                <div id="hero-text-container" class="text-white">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/15 backdrop-blur-sm rounded-full text-sm font-medium mb-6 border border-white/20">
                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                        Pendaftaran Gelombang I Dibuka {{-- Teks diubah agar lebih urgent --}}
                    </div>

                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight">
                        Penerimaan<br>Murid Baru
                        <span class="block text-accent-400 mt-1">2026/2027</span>
                    </h2>
                    <p class="mt-4 text-xl md:text-2xl font-medium text-blue-100 leading-relaxed">
                        Wujudkan Masa Depan Gemilang bersama SMA Laboratorium UPGRIS
                    </p>

                    {{-- Highlights --}}
                    <div class="mt-8 flex flex-wrap gap-3">
                        <div class="flex items-center gap-2 px-4 py-2.5 bg-white/10 backdrop-blur-sm rounded-xl border border-white/15 text-sm font-medium">
                            <i data-lucide="star" class="w-5 h-5 text-accent-400"></i>
                            Program Unggulan "Life Skill"
                        </div>
                    </div>

                    {{-- CTA Buttons --}}
                    <div class="mt-10 flex flex-wrap gap-4">
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center gap-2 px-8 py-4 bg-accent-400 hover:bg-accent-500 text-gray-900 font-bold rounded-2xl shadow-xl shadow-accent-400/30 hover:shadow-2xl hover:shadow-accent-400/40 hover:-translate-y-0.5 transition-all duration-300 text-base">
                            Daftar Sekarang
                            <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </a>
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center gap-2 px-8 py-4 bg-white/15 hover:bg-white/25 text-white font-semibold rounded-2xl backdrop-blur-sm border border-white/20 hover:-translate-y-0.5 transition-all duration-300 text-base">
                            Sudah Punya Akun? Masuk
                        </a>
                    </div>
                </div>

                {{-- Right: Image / Visual --}}
                <div class="hidden md:flex justify-center">
                    {{-- ID hero-image-wrapper dan class floating-element ditambahkan di sini --}}
                    <div id="hero-image-wrapper" class="relative floating-element">
                        <div class="w-[350px] h-[350px] md:w-[400px] md:h-[400px] lg:w-[450px] lg:h-[450px] rounded-3xl overflow-hidden shadow-2xl border-4 border-white/20 rotate-2 transition-transform duration-500 hover:rotate-0">
                            <img src="{{ asset('images/sma-lab-upgris.jpg') }}" alt="SMA Laboratorium UPGRIS" class="w-full h-full object-cover">
                        </div>
                        {{-- Floating badge --}}
                        <div class="absolute -top-6 -right-6 md:-top-10 md:-right-10 w-28 h-28 md:w-36 md:h-36 floating-element z-10" style="animation-delay: 1.5s;">
                            <img src="{{ asset('images/akreditasi.png') }}" alt="Akreditasi A" class="w-full h-full object-contain drop-shadow-2xl">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════
         3. JADWAL PENDAFTARAN (GELOMBANG)
    ═══════════════════════════════════════════ --}}
    <section id="jadwal" class="py-20 md:py-28 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div>
                <x-landing.section-title
                    title="Jadwal Pendaftaran"
                    subtitle="Pilih gelombang pendaftaran sesuai waktumu"
                />
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1500">          
                    {{-- Gelombang 1 --}}
                    <div class="rounded-2xl bg-white border border-gray-200 p-8 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                        <div class="w-12 h-12 bg-primary-50 rounded-xl flex items-center justify-center mb-5 text-primary-600">
                            <i data-lucide="calendar" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Gelombang I</h3>
                        <p class="text-gray-500 text-sm mb-4">2 Februari — 29 Maret 2026</p>
                        <div class="flex items-center gap-2 text-sm text-gray-400">
                            <i data-lucide="check-circle-2" class="w-4 h-4"></i>
                            Bebas biaya pendaftaran
                        </div>
                    </div>
                </div>
                
                <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1500" data-aos-delay="100">  
                    {{-- Gelombang 2 — Highlighted --}}
                    <div class="relative rounded-2xl bg-linear-to-br from-primary-600 to-primary-700 text-white p-8 shadow-xl shadow-primary-200 hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                        <div class="absolute top-0 right-0 bg-accent-400 text-gray-900 text-xs font-bold px-4 py-1.5 rounded-bl-xl">
                            SAAT INI
                        </div>
                        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/5 rounded-full"></div>
                        <div class="relative">
                            <div class="w-12 h-12 bg-white/15 rounded-xl flex items-center justify-center mb-5">
                                <i data-lucide="calendar" class="w-6 h-6"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-2">Gelombang II</h3>
                            <p class="text-blue-100 text-sm mb-4">30 Maret — 31 Mei 2026</p>
                            <div class="flex items-center gap-2 text-sm text-accent-400 font-medium">
                                <i data-lucide="clock" class="w-4 h-4"></i>
                                Pendaftaran sedang dibuka
                            </div>
                        </div>
                    </div>
                </div>

                <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1500" data-aos-delay="300">
                    {{-- Gelombang 3 --}}
                    <div class="rounded-2xl bg-white border border-gray-200 p-8 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                        <div class="w-12 h-12 bg-primary-50 rounded-xl flex items-center justify-center mb-5 text-primary-600">
                            <i data-lucide="calendar" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Gelombang III</h3>
                        <p class="text-gray-500 text-sm mb-4">1 Juni — 3 Juli 2026</p>
                        <div class="flex items-center gap-2 text-sm text-gray-400">
                            <i data-lucide="clock" class="w-4 h-4"></i>
                            Pendaftaran reguler
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════
         4. ALUR PENDAFTARAN ONLINE
    ═══════════════════════════════════════════ --}}
    <section id="alur" class="py-20 md:py-28 bg-white" data-aos="fade-up" data-aos-duration="1000">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <x-landing.section-title
                title="Alur Pendaftaran Online"
                subtitle="Proses pendaftaran mudah, cepat, dan 100% online"
            />

            {{-- Steps: vertical grid on mobile, horizontal grid on desktop --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 relative z-10">

                <x-landing.step-item number="1" title="Buat Akun" description="Gunakan NISN untuk membuat akun pendaftaran">
                    <x-slot:icon>
                        <i data-lucide="user-plus" class="w-7 h-7"></i>
                    </x-slot:icon>
                </x-landing.step-item>

                <x-landing.step-item number="2" title="Isi Data Diri" description="Lengkapi formulir pendaftaran secara online">
                    <x-slot:icon>
                        <i data-lucide="file-text" class="w-7 h-7"></i>
                    </x-slot:icon>
                </x-landing.step-item>

                <x-landing.step-item number="3" title="Upload Berkas" description="Unggah dokumen yang diperlukan">
                    <x-slot:icon>
                        <i data-lucide="upload" class="w-7 h-7"></i>
                    </x-slot:icon>
                </x-landing.step-item>

                <x-landing.step-item number="4" title="Finalisasi" description="Pastikan semua data sudah benar sebelum dikirim">
                    <x-slot:icon>
                        <i data-lucide="check-square" class="w-7 h-7"></i>
                    </x-slot:icon>
                </x-landing.step-item>

                <x-landing.step-item number="5" title="Cetak & Verifikasi" description="Cetak formulir dan tunggu verifikasi dari sekolah">
                    <x-slot:icon>
                        <i data-lucide="printer" class="w-7 h-7"></i>
                    </x-slot:icon>
                </x-landing.step-item>
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════
         5. JALUR PRESTASI
    ═══════════════════════════════════════════ --}}
    <section id="prestasi" class="py-20 md:py-28 bg-gray-50" data-aos="fade-up" data-aos-duration="1000">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <x-landing.section-title
                title="Jalur Prestasi"
                subtitle="Raih keuntungan spesial bagi siswa berprestasi"
            />

            <div class="grid md:grid-cols-2 gap-10 items-start">
                {{-- Left: Explanation --}}
                <div>
                    <div class="bg-white rounded-2xl border border-gray-200 p-8 shadow-sm">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-12 h-12 bg-accent-400/20 rounded-xl flex items-center justify-center shrink-0">
                                <i data-lucide="award" class="w-6 h-6 text-accent-600"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Siapa yang bisa mendaftar?</h3>
                                <p class="text-gray-500 leading-relaxed">
                                    Diperuntukkan bagi siswa yang memiliki prestasi akademik maupun non-akademik
                                    <strong class="text-gray-700">minimal tingkat kabupaten/kota atau memiliki nilai rata-rata TKA (...)</strong>.
                                    Wajib melampirkan sertifikat prestasi.
                                </p>
                            </div>
                        </div>

                        {{-- Benefits --}}
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 p-4 bg-green-50 rounded-xl border border-green-100">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center shrink-0">
                                    <i data-lucide="check-circle-2" class="w-5 h-5 text-green-600"></i>
                                </div>
                                <span class="text-sm font-medium text-green-800">Bebas biaya pendaftaran (Gelombang I)</span>
                            </div>
                            <div class="flex items-center gap-3 p-4 bg-green-50 rounded-xl border border-green-100">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center shrink-0">
                                    <i data-lucide="check-circle-2" class="w-5 h-5 text-green-600"></i>
                                </div>
                                <span class="text-sm font-medium text-green-800">Potensi bebas uang gedung</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right: Social Proof —  Prestasi Examples --}}
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Prestasi Siswa Kami</h3>
                    <div class="space-y-3">
                        @php
                            $prestasi = [
                                ['emoji' => '🏆', 'text' => 'Juara 1 Lomba Macapat Gumebyaring Wyaksa 2025'],
                                ['emoji' => '🥋', 'text' => 'Juara 1 Pencak Silat Kelas Seni Ganda Putra Remaja SPOC 2025'],
                                ['emoji' => '✍️', 'text' => 'Juara 2 Lomba Menulis Cerpen Kota Semarang 2025'],
                                ['emoji' => '🥋', 'text' => 'Juara 2 Pencak Silat Laga Kelas B Remaja Kejurkot IPSI 2025'],
                                ['emoji' => '🥊', 'text' => 'Juara 2 Kumite Karate Tingkat Provinsi HIMURA Championship II 2026'],
                                ['emoji' => '🥋', 'text' => 'Juara 3 Pencak Silat Seni Beregu PRAPORPROV XVII JATENG 2025'],
                            ];
                        @endphp

                        @foreach($prestasi as $item)
                            <div class="flex items-start gap-3 p-4 bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                                <span class="text-xl shrink-0">{{ $item['emoji'] }}</span>
                                <p class="text-sm font-medium text-gray-700 leading-relaxed">{{ $item['text'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════
         6. CTA — DAFTAR SEKARANG
    ═══════════════════════════════════════════ --}}
    <section id="cta" class="relative py-20 md:py-28 overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
        {{-- Background --}}
        <div class="absolute inset-0 bg-gradient-to-br from-[#730101] via-[#850101] to-[#5e0000]"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-accent-400/5 rounded-full blur-3xl"></div>

        <div class="relative max-w-3xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-5xl font-extrabold text-white leading-tight tracking-tight">
                Siap Bergabung<br>Bersama Kami?
            </h2>
            <p class="mt-4 text-lg text-blue-200 max-w-xl mx-auto">
                Segera daftarkan dirimu sekarang juga. Raih masa depan bersama SMA Laboratorium UPGRIS.
            </p>

            {{-- Highlight Tags --}}
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <span class="px-4 py-2 bg-white/10 rounded-full text-sm text-white/90 border border-white/15 backdrop-blur-sm font-medium">
                    💰 SPP Terjangkau
                </span>
                <span class="px-4 py-2 bg-white/10 rounded-full text-sm text-white/90 border border-white/15 backdrop-blur-sm font-medium">
                    🏫 Sekolah Unggulan
                </span>
                <span class="px-4 py-2 bg-white/10 rounded-full text-sm text-white/90 border border-white/15 backdrop-blur-sm font-medium">
                    🎯 Fasilitas Lengkap
                </span>
            </div>

            <div class="mt-10">
                <a href="{{ route('register') }}"
                   class="inline-flex items-center gap-3 px-10 py-5 bg-accent-400 hover:bg-accent-500 text-gray-900 font-bold rounded-2xl shadow-2xl shadow-accent-400/30 hover:shadow-accent-400/50 hover:-translate-y-1 transition-all duration-300 text-lg">
                    Daftar Sekarang
                    <i data-lucide="arrow-right" class="w-6 h-6"></i>
                </a>
            </div>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════
         7. FOOTER
    ═══════════════════════════════════════════ --}}
    <footer class="bg-gradient-to-br from-[#4a0000] via-[#330000] to-[#1f0000] text-white/80 py-12 relative overflow-hidden">
        {{-- Decorative Blobs for footer --}}
        <div class="absolute top-0 right-0 w-[300px] h-[300px] bg-accent-400/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="grid md:grid-cols-3 gap-8">
                {{-- School Info --}}
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('images/logo-sma-lab.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                        <div>
                            <h4 class="text-white font-bold text-sm">SMA Laboratorium UPGRIS</h4>
                            <p class="text-xs text-white/60">Unggul dan Berjati Diri</p>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed text-white/70">
                        Jl. Gajah Raya No. 40<br>
                        (Kompleks Kampus IV UPGRIS)<br>
                        Semarang, Jawa Tengah
                    </p>
                </div>

                {{-- Contact --}}
                <div>
                    <h4 class="text-white font-bold text-sm mb-4">Kontak</h4>
                    <div class="space-y-3 text-sm text-white/70">
                        <div class="flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                            <p>smalabschoolupgris@gmail.com</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="globe" class="w-4 h-4"></i>
                            <p>smalaboratoriumupgris.sch.id</p>
                        </div>
                        <a href="https://instagram.com/smalabschoolupgris" target="_blank" class="flex items-center gap-2 hover:text-white transition-colors">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
                            <p>@smalabschoolupgris</p>
                        </a>
                    </div>
                </div>

                {{-- WhatsApp --}}
                <div>
                    <h4 class="text-white font-bold text-sm mb-4">Hubungi via WhatsApp</h4>
                    <div class="space-y-3 text-sm">
                        <a href="https://wa.me/6282131406996" target="_blank" class="flex items-center gap-2 text-white/70 hover:text-green-400 transition-colors">
                            <i data-lucide="phone" class="w-4 h-4 text-green-400"></i> Humas — 0821 3140 6996
                        </a>
                        <a href="https://wa.me/6285950519315" target="_blank" class="flex items-center gap-2 text-white/70 hover:text-green-400 transition-colors">
                            <i data-lucide="phone" class="w-4 h-4 text-green-400"></i> Bu Suci — 0859 5051 9315
                        </a>
                        <a href="https://wa.me/6282220599520" target="_blank" class="flex items-center gap-2 text-white/70 hover:text-green-400 transition-colors">
                            <i data-lucide="phone" class="w-4 h-4 text-green-400"></i> Pak Arif — 0822 2059 9520
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-white/10 text-center text-xs text-white/50">
                &copy; {{ date('Y') }} SMA Laboratorium UPGRIS. All rights reserved.
            </div>
        </div>
    </footer>


    {{-- ═══════════════════════════════════════════
         STICKY MOBILE CTA
    ═══════════════════════════════════════════ --}}
    <div id="mobile-cta" class="fixed bottom-0 inset-x-0 z-40 md:hidden bg-white/90 backdrop-blur-lg border-t border-gray-200 p-3 transform translate-y-full transition-transform duration-300">
        <a href="{{ route('register') }}"
           class="flex items-center justify-center gap-2 w-full py-3.5 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl shadow-lg text-sm transition-colors">
            Daftar Sekarang
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
    </div>


    {{-- Scripts --}}
    {{-- Animasi GSAP dan interaksi sudah dipindahkan ke resources/js/app.js agar dimuat lewat Vite --}}
</body>
</html>
