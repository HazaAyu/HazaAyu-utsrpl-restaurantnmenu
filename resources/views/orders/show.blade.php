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
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <header class="mb-6">
                <h1 class="text-3xl font-semibold text-gray-800">Detail Pesanan</h1>
            </header>

            <div class="space-y-6">
                <!-- Order ID -->
                <div class="flex justify-between">
                    <p class="text-lg font-medium text-gray-700">ID:</p>
                    <p class="text-lg text-gray-600">{{ $order->id }}</p>
                </div>

                <!-- Menu Name (instead of Menu ID) -->
                <div class="flex justify-between">
                    <p class="text-lg font-medium text-gray-700">Menu:</p>
                    <p class="text-lg text-gray-600">{{ $order->menu->name }}</p> <!-- Assuming 'menu' relationship is defined in the Order model -->
                </div>

                <!-- Quantity -->
                <div class="flex justify-between">
                    <p class="text-lg font-medium text-gray-700">Quantity:</p>
                    <p class="text-lg text-gray-600">{{ $order->quantity }}</p>
                </div>

                <!-- Created At -->
                <div class="flex justify-between">
                    <p class="text-lg font-medium text-gray-700">Tanggal Pesanan:</p>
                    <p class="text-lg text-gray-600">{{ $order->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-6">
                <a href="{{ route('orders.index') }}" class="text-blue-600 hover:underline">Kembali ke Daftar Pesanan</a>
            </div>
        </div>
    </div>

</body>
</html>