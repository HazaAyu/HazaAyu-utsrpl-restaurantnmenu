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
                <h1 class="text-3xl font-semibold text-gray-800">Edit Pesanan</h1>
            </header>

            <form action="{{ route('orders.update', $order->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Menu Selection -->
                <div>
                    <label for="menu_id" class="block text-lg font-medium text-gray-700">Pilih Menu</label>
                    <select name="menu_id" id="menu_id" required class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled>Pilih Menu</option>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}" {{ $order->menu_id == $menu->id ? 'selected' : '' }}>
                                {{ $menu->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantity -->
                <div>
                    <label for="quantity" class="block text-lg font-medium text-gray-700">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $order->quantity) }}" required min="1" 
                        class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Masukkan Quantity">
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>