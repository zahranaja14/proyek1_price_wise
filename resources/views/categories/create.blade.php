<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-800/50 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white">Tambah Kategori Baru</h3>
                        <p class="text-xs text-gray-400 mt-1">Buat nama kategori baru untuk produk Anda.</p>
                    </div>
                    <a href="{{ route('categories.index') }}" class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 font-semibold flex items-center gap-1 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali
                    </a>
                </div>

                <form action="{{ route('categories.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Nama Kategori</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Contoh: Sepatu, Gadget, Pakaian" required class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition text-gray-800 dark:text-gray-200">
                        @error('name')
                            <p class="text-sm text-rose-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold transition duration-200 shadow-sm shadow-indigo-600/10">
                            Simpan Kategori
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
