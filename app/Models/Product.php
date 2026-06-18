<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
use HasFactory;

    // Kolom yang diizinkan diisi secara massal
    protected $fillable = [
        'user_id', 
        'category_id', 
        'nama_produk', 
        'deskripsi', 
        'harga', 
        'stok', 
        'foto'
    ];

    // Relasi ke Kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
