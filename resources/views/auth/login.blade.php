@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <h2 class="text-xl font-bold text-gray-800 mb-1">Masuk ke Akun</h2>
    <p class="text-sm text-gray-500 mb-6">Gunakan NISN dan tanggal lahir untuk login</p>

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <x-input
            label="NISN"
            name="nisn"
            type="text"
            placeholder="Masukkan NISN kamu"
            :required="true"
        />

        <x-input
            label="Password"
            name="password"
            type="password"
            placeholder="Tanggal lahir (dd-mm-yyyy)"
            :required="true"
        />

        <x-button variant="primary" class="w-full">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
            </svg>
            Masuk
        </x-button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-6">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-primary-600 font-semibold hover:underline">Daftar di sini</a>
    </p>
@endsection
