<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Link to Tailwind CSS -->
    
</head>
<body>
    
<div class="bg-gray-100 p-8">
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <header class="mb-6">
                <h1 class="text-3xl font-semibold text-gray-800">Daftar Pesanan</h1>
                <a href="{{ route('orders.create') }}" class="text-white bg-blue-600 hover:bg-blue-700 py-2 px-6 rounded-lg inline-block mt-4">Buat Pesanan Baru</a>
            </header>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                    <thead class="bg-gray-200 text-left text-sm text-gray-700 uppercase leading-normal">
                        <tr>
                            <th class="py-3 px-6">ID</th>
                            <th class="py-3 px-6">Menu</th>
                            <th class="py-3 px-6">Quantity</th>
                            <th class="py-3 px-6">Tanggal</th>
                            <th class="py-3 px-6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-600">
                        @foreach ($orders as $order)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="py-3 px-6 text-center">{{ $order->id }}</td>
                                <td class="py-3 px-6 text-center">
    {{ $order->menu ? $order->menu->name : 'Menu tidak tersedia' }}
</td> <!-- Menampilkan nama menu -->
                                <td class="py-3 px-6 text-center">{{ $order->quantity }}</td>
                                <td class="py-3 px-6 text-center">{{ $order->created_at->format('d M Y, H:i') }}</td>
                                <td class="py-3 px-6 space-x-2 text-center">
                                    <a href="{{ route('orders.show', $order->id) }}" class="text-blue-600 hover:underline">Lihat</a>
                                    <a href="{{ route('orders.edit', $order->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>