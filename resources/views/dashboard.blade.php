<x-app-layout>
    <div class="min-h-screen bg-[#0B132B] text-white p-8">
        
        <!-- HEADER KONTEN -->
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold mb-2">Selamat Datang di Price Wise</h1>
            <p class="text-gray-400 text-sm mb-8">Pilih produk terbaik di bawah ini untuk melakukan simulasi pembelian manual.</p>

            <h3 class="font-bold border-l-4 border-teal-500 pl-3 mb-6">Katalog Barang Premium</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($products as $product)
                <div class="bg-[#1C2541] p-6 rounded-xl border border-gray-700">
                    <div class="text-4xl mb-4">📦</div>
                    
                    <!-- Detail Produk -->
                    <h4 class="font-bold text-lg">{{ $product->nama_produk }}</h4>
                    <p class="text-xs text-gray-400 mt-1 mb-4">{{ Str::limit($product->deskripsi, 50) }}</p>

                    <!-- Harga dan Tombol -->
                    <div class="flex justify-between items-center">
                        <span class="text-teal-400 font-bold">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                        <a href="{{ route('checkout', $product->id) }}" class="bg-[#00B4D8] text-black text-xs font-bold px-4 py-1.5 rounded">Beli</a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center text-gray-500 py-10">
                    Belum ada produk yang tersedia.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>