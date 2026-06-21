<x-guest-layout>
    <div class="space-y-8">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-white">Buat akun baru</h2>
            <p class="mt-2 text-sm text-slate-400">Daftar untuk mulai membeli atau menjual barang bekas di Price Wise.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Name')" class="text-slate-200" />
                <x-text-input id="name" class="mt-1 block w-full bg-slate-950 text-white border-slate-700 focus:border-teal-500 focus:ring-teal-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-rose-300" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" class="text-slate-200" />
                <x-text-input id="email" class="mt-1 block w-full bg-slate-950 text-white border-slate-700 focus:border-teal-500 focus:ring-teal-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-rose-300" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" class="text-slate-200" />
                <x-text-input id="password" class="mt-1 block w-full bg-slate-950 text-white border-slate-700 focus:border-teal-500 focus:ring-teal-500" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-rose-300" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-slate-200" />
                <x-text-input id="password_confirmation" class="mt-1 block w-full bg-slate-950 text-white border-slate-700 focus:border-teal-500 focus:ring-teal-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-rose-300" />
            </div>

            <div>
                <x-input-label for="role" :value="__('Mendaftar Sebagai:')" class="text-slate-200" />
                <select id="role" name="role" class="mt-1 block w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white focus:border-teal-500 focus:ring-teal-500" required>
                    <option value="buyer">Pembeli (Buyer)</option>
                    <option value="seller">Penjual (Seller)</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2 text-sm text-rose-300" />
            </div>

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <a class="text-sm text-teal-300 hover:text-teal-100 transition" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="w-full sm:w-auto bg-teal-600 hover:bg-teal-500 text-white">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
