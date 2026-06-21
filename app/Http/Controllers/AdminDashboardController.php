<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Pastikan model Order sudah di-import

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Mengambil semua order untuk ditampilkan di tabel
        $orders = Order::all(); 
        return view('admin.dashboard', compact('orders'));
    }
}