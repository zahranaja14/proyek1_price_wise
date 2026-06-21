<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>
    
    <table class="w-full bg-white rounded shadow p-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">ID</th>
                <th class="p-2">Buyer</th>
                <th class="p-2">Status</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="border-b">
                <td class="p-2 text-center">{{ $order->id }}</td>
                <td class="p-2 text-center">{{ $order->user->name ?? 'Guest' }}</td>
                <td class="p-2 text-center">{{ $order->status }}</td>
                <td class="p-2 text-center">
                    <a href="{{ route('admin.order.detail', $order->id) }}" class="text-blue-500">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>