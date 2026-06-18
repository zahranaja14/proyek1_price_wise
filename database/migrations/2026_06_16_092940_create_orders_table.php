<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel users (siapa buyer yang membeli)
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        
        $table->integer('total_harga');
        
        // Status transaksi menggunakan enum untuk pembayaran manual
        $table->enum('status', [
            'menunggu_pembayaran', 
            'menunggu_verifikasi', 
            'lunas', 
            'dibatalkan'
        ])->default('menunggu_pembayaran');
        
        // Tempat menyimpan nama file foto bukti transfer bank dari buyer
        $table->string('bukti_transfer')->nullable();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
