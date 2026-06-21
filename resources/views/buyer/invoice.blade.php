<x-app-layout>
    <!-- Menyisipkan CDN Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <div class="bg-[#0B132B] min-h-screen text-white flex flex-col md:flex-row">
        
        <!-- ================= KOLOM KIRI: SIDEBAR NAVIGASI (KONSISTEN) ================= -->
        <aside class="w-full md:w-64 bg-[#1C2541]/80 border-r border-gray-800 p-6 flex flex-col justify-between md:sticky md:top-0 md:h-screen backdrop-blur-md">
            <div class="space-y-8">
                <div class="flex items-center gap-3 pb-4 border-b border-gray-800">
                    <div class="p-2 bg-[#00B4D8]/10 rounded-xl border border-[#00B4D8]/30">
                        <span class="text-xl">📈</span>
                    </div>
                    <div>
                        <h2 class="font-black text-lg tracking-wide bg-gradient-to-r from-[#00B4D8] to-[#7209B7] bg-clip-text text-transparent">Price Wise</h2>
                        <p class="text-[10px] text-gray-500 font-medium uppercase tracking-widest">Buyer Panel</p>
                    </div>
                </div>

                <div class="h-[2px] w-full bg-gradient-to-r from-[#00B4D8] to-[#7209B7] opacity-80 rounded-full"></div>

                <nav class="space-y-2">
                    <a href="/dashboard" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm text-gray-400 hover:bg-[#1C2541] hover:text-white border border-transparent hover:border-gray-800 transition duration-300">
                        <span class="text-base">🏠</span>
                        <span>Home Dashboard</span>
                    </a>
                    <div class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm bg-[#7209B7] text-white font-bold shadow-lg shadow-[#7209B7]/20">
                        <span class="text-base">📄</span>
                        <span>Status Invoice</span>
                    </div>
                </nav>
            </div>

            <div class="text-[11px] text-gray-500 border-t border-gray-800 pt-4 text-center">
                &copy; 2026 Price Wise Project
            </div>
        </aside>

        <!-- ================= KOLOM KANAN: STATUS UTAMA INVOICE ================= -->
        <main class="flex-1 p-6 md:p-12 flex items-center justify-center">
            
            <div class="max-w-md w-full bg-[#1C2541]/50 border border-gray-800 rounded-3xl p-8 space-y-6 text-center relative overflow-hidden shadow-2xl backdrop-blur-md">
                <!-- Decorative Glow -->
                <div class="absolute -top-16 -left-16 w-32 h-32 bg-[#7209B7]/10 rounded-full blur-2xl pointer-events-none"></div>
                
                <!-- Animasi Pulse Icon Loading Status -->
                <div class="w-20 h-20 mx-auto bg-amber-500/10 border border-amber-500/30 rounded-full flex items-center justify-center animate-pulse">
                    <span class="text-3xl text-amber-400">⏳</span>
                </div>

                <!-- Judul Status -->
                <div class="space-y-1">
                    <h2 class="text-xl font-black tracking-wide text-white">Menunggu Verifikasi Admin</h2>
                    <p class="text-xs text-gray-400">Bukti transfer Anda sedang dicek dengan mutasi rekening Rekber kami.</p>
                </div>

                <!-- Detail Invoice Ringkas -->
                <div class="bg-[#0B132B]/80 rounded-2xl p-4 text-left text-xs space-y-3.5 border border-gray-800/60">
                    <div class="flex justify-between">
                        <span class="text-gray-500">ID Transaksi</span>
                        <span class="font-mono text-gray-300 font-bold">#PW-98321A</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Produk</span>
                        <span class="text-gray-300 font-medium">Jaket Varsity Vintage Leather</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Metode Pembayaran</span>
                        <span class="text-[#00B4D8] font-bold">Manual Rekber Price Wise</span>
                    </div>
                    <hr class="border-gray-800">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-400 font-bold">Total Dana Ditahan</span>
                        <span class="text-base font-black text-emerald-400">Rp 350.000</span>
                    </div>
                </div>

                <!-- Edukasi Alur Rekber Ke Buyer -->
                <div class="p-3.5 bg-blue-500/5 border border-blue-500/10 rounded-xl flex gap-3 text-left">
                    <span class="text-sm">🛡️</span>
                    <p class="text-[11px] text-gray-400 leading-relaxed">
                        <strong class="text-gray-300">Sistem Keamanan Rekber:</strong> Uang Anda tidak langsung cair ke Seller. Dana aman di rekening Admin sampai Seller mengirim barang dan Anda mengonfirmasi penerimaannya.
                    </p>
                </div>

                <!-- Tombol Navigasi Kembali -->
                <div class="pt-2">
                    <a href="/dashboard" class="w-full inline-block py-2.5 rounded-xl bg-gray-900 border border-gray-800 text-xs font-bold text-gray-300 hover:bg-[#1C2541] hover:text-white transition duration-300">
                        Kembali ke Dashboard Utama
                    </a>
                </div>
            </div>

        </main>
    </div>
</x-app-layout>