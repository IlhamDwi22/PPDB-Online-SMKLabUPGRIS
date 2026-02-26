@extends('layouts.auth')

@section('title', 'Registrasi')

@section('content')
    <h2 class="text-xl font-bold text-gray-800 mb-1">Buat Akun Baru</h2>
    <p class="text-sm text-gray-500 mb-6">Daftarkan diri kamu untuk memulai PPDB Online</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <x-input
            label="NISN"
            name="nisn"
            type="text"
            placeholder="Masukkan 10 digit NISN"
            :required="true"
        />

        <x-input
            label="Nama Lengkap"
            name="name"
            type="text"
            placeholder="Sesuai ijazah / akta kelahiran"
            :required="true"
        />

        <x-input
            label="Tanggal Lahir"
            name="tanggal_lahir"
            type="date"
            :required="true"
        />

        <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 mb-6">
            <p class="text-xs text-blue-700 flex items-start gap-2">
                <svg class="w-4 h-4 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd"/>
                </svg>
                <span>Password otomatis diambil dari tanggal lahir kamu. Gunakan tanggal lahir untuk login.</span>
            </p>
        </div>

        <x-button variant="primary" class="w-full">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
            Daftar Sekarang
        </x-button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-6">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-primary-600 font-semibold hover:underline">Login di sini</a>
    </p>
@endsection
