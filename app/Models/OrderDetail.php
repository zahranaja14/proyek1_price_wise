<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id', 
        'product_id', 
        'jumlah', 
        'harga_saat_beli'
    ];

    // Relasi ke Order Utama
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi ke Produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
