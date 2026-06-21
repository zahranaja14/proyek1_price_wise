<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    // 1. Menampilkan halaman form checkout (Detail harga & upload bukti transfer)
    public function checkout($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('buyer.checkout', compact('product'));
    }

    // 2. Memproses data checkout langsung beserta upload bukti transfer manual
    public function storeTransaction(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);

        // Validasi input file gambar bukti transfer
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Proses upload file gambar bukti transfer
        $nama_file_bukti = null;
        if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $nama_file_bukti = 'bukti_' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/bukti_transfer'), $nama_file_bukti);
        }

        // Gunakan DB Transaction agar jika salah satu simpan gagal, database otomatis rollback (aman)
        DB::transaction(function () use ($product, $nama_file_bukti) {
            // 1. Simpan ke tabel orders utama
            $order = Order::create([
                'user_id' => Auth::id(), // ID Buyer yang membeli
                'total_harga' => $product->harga,
                'status' => 'menunggu_verifikasi', // Langsung menunggu verifikasi seller karena bukti langsung dikirim
                'bukti_transfer' => $nama_file_bukti,
            ]);

            // 2. Simpan ke tabel rincian order_details
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'jumlah' => 1, // Sistem jual beli barang bekas biasanya 1 unit per item
                'harga_saat_beli' => $product->harga,
            ]);
        });

        return redirect()->route('orders.history')->with('success', 'Bukti transfer berhasil dikirim! Menunggu verifikasi dari penjual.');
    }

    // 3. Menampilkan riwayat pembelian barang dari sisi Buyer
    public function history()
    {
        // Hubungkan ke orderDetails dan produk agar bisa ditampilkan di riwayat pembelian buyer
        $orders = Order::where('user_id', Auth::id())->with('orderDetails.product')->latest()->get();
        return view('buyer.history', compact('orders'));
    }

    // 4. Menampilkan daftar pesanan masuk dari sisi Seller
    public function sellerOrders()
    {
        // Mengambil order details yang produknya milik seller yang sedang login
        $orderDetails = OrderDetail::whereHas('product', function ($query) {
            $query->where('user_id', Auth::id());
        })->with(['product', 'order.user'])->latest()->get();

        return view('seller.orders.index', compact('orderDetails'));
    }

    // 5. Verifikasi pesanan (Approve / Reject) dari sisi Seller
    public function verifyOrder(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id);

        // Pastikan order ini berisi produk milik seller yang sedang login
        $hasAccess = OrderDetail::where('order_id', $order->id)
            ->whereHas('product', function ($query) {
                $query->where('user_id', Auth::id());
            })->exists();

        if (!$hasAccess) {
            abort(403, 'Aksi tidak sah.');
        }

        $request->validate([
            'action' => 'required|in:approve,reject',
        ]);

        try {
            DB::transaction(function () use ($order, $request) {
                if ($request->action === 'approve') {
                    $order->update(['status' => 'lunas']);

                    // Kurangi stok produk yang dibeli
                    foreach ($order->orderDetails as $detail) {
                        $product = $detail->product;
                        if ($product->stok >= $detail->jumlah) {
                            $product->decrement('stok', $detail->jumlah);
                        } else {
                            throw new \Exception("Stok untuk produk '{$product->nama_produk}' tidak mencukupi.");
                        }
                    }
                } else {
                    $order->update(['status' => 'dibatalkan']);
                }
            });

            $statusMessage = $request->action === 'approve' ? 'Pesanan berhasil disetujui (Lunas)!' : 'Pesanan berhasil dibatalkan.';
            return redirect()->route('seller.orders')->with('success', $statusMessage);
        } catch (\Exception $e) {
            return redirect()->route('seller.orders')->with('error', $e->getMessage());
        }
    }
}