<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan daftar semua order di dashboard admin
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('admin.dashboard', compact('orders'));
    }

    // Menampilkan detail order spesifik
    public function show($id)
    {
        $order = Order::with(['user', 'orderDetails.product'])->findOrFail($id);
        return view('admin.detail', compact('order'));
    }

    // Aksi untuk verifikasi (approve/reject)
    public function verify(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status; // 'lunas' atau 'dibatalkan'
        $order->save();

        return redirect('/admin/dashboard')->with('success', 'Status pesanan berhasil diupdate!');
    }
}