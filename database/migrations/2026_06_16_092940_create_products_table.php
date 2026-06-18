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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel users (siapa seller yang menjual produk ini)
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        
        // Relasi ke tabel categories (apa kategori produk ini)
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        
        $table->string('nama_produk');
        $table->text('deskripsi');
        $table->integer('harga');
        $table->integer('stok');
        $table->string('foto')->nullable(); // Menyimpan nama file gambar produk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
