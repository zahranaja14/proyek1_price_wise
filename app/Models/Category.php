<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // Relasi ke Produk
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
