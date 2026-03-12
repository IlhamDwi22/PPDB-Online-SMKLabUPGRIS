<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- NISN -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('NISN')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                required autocomplete="username" placeholder="Masukkan 10 digit NISN" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Nama Lengkap -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" placeholder="Sesuai ijazah/akta kelahiran" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Password (Tanggal Lahir) -->
        <div>
            <x-input-label for="tgl_lahir" :value="__('Tanggal Lahir')" />
            <x-text-input id="tgl_lahir" class="block mt-1 w-full" type="date" name="tgl_lahir"
                :value="old('tgl_lahir')" required autofocus autocomplete="tgl_lahir" />
            <x-input-error :messages="$errors->get('tgl_lahir')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>