<!DOCTYPE html>
<html>
<head>
    <title>Detail Order #{{ $order->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Detail Pesanan #{{ $order->id }}</h1>
        <p><strong>Buyer:</strong> {{ $order->user->name }}</p>
      <div class="border-t mt-4 pt-4">
    <h2 class="font-bold mb-2">Bukti Transfer:</h2>
    @if($order->bukti_transfer)
        <div class="p-2 border bg-gray-50">
          <img src="{{ url('images/' . $order->bukti_transfer) }}" 
     class="max-w-xs h-auto border rounded shadow-sm hover:scale-105 transition-transform duration-200" 
     alt="Bukti Transfer">
    @else
        <p class="text-red-500 italic">User belum mengupload bukti transfer.</p>
    @endif
</div>
        <a href="/admin/dashboard" class="mt-6 block text-blue-500 hover:underline">← Kembali ke Dashboard</a>
    </div>
</body>
</html>