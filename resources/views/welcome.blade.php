<!DOCTYPE html>
<html lang="en" class="h-full bg-[#0B132B]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Wise - Premium Marketplace</title>
    <!-- Menggunakan CDN Tailwind Sementara karena NPM/Node belum terinstal -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex flex-col justify-between text-white font-sans selection:bg-[#00B4D8]">

    <!-- Navbar Minimalis -->
    <header class="p-6 flex justify-between items-center max-w-7xl w-full mx-auto">
        <div class="flex items-center space-x-2">
            <!-- Logo Toko Kamu -->
            <div class="bg-[#00B4D8] p-2 rounded-lg shadow-lg shadow-[#00B4D8]/20">
                <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
            </div>
            <span class="text-xl font-bold tracking-wider bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent">Price Wise</span>
        </div>
    </header>

    <!-- Konten Utama Tengah (Hanya Teks & Tombol Auth) -->
    <main class="flex-1 flex flex-col items-center justify-center px-4 text-center max-w-3xl mx-auto">

        
        <h1 class="text-4xl md:text-6xl font-black tracking-tight mb-6 leading-tight">
            Jual Beli Barang Bekas <br>
            <span class="bg-gradient-to-r from-[#00B4D8] to-[#7209B7] bg-clip-text text-transparent">Lebih Mudah & Aman</span>
        </h1>
        
        

        <!-- Pintu Masuk / Daftar -->
        <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
            <a href="{{ route('login') }}" class="px-8 py-4 rounded-xl bg-[#00B4D8] text-black font-bold text-center hover:bg-[#00B4D8]/90 transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg shadow-[#00B4D8]/20">
                Masuk ke Akun
            </a>
            <a href="{{ route('register') }}" class="px-8 py-4 rounded-xl bg-[#1C2541] text-white border border-gray-700 font-bold text-center hover:bg-[#1C2541]/80 hover:border-gray-600 transition-all duration-300 transform hover:-translate-y-0.5">
                Daftar Sekarang
            </a>
        </div>
    </main>

    
</body>
</html>