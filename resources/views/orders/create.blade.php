<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pesanan Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom Styles for the form */
        .form-input {
            @apply mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500;
        }

        .form-button {
            @apply w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500;
        }

        /* Focus effect on inputs */
        .form-input:focus {
            border-color: #3b82f6; /* Focus blue border */
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5); /* Glow effect */
        }

        /* Button hover effect */
        .form-button:hover {
            background-color: #2563eb; /* Lighter blue on hover */
        }

        .form-button:focus {
            background-color: #1e40af; /* Darker blue on focus */
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.6); /* Blue glow on focus */
        }

        /* Spacing and layout improvements */
        .form-container {
            @apply max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md;
        }

        .form-header {
            @apply mb-6 text-3xl font-semibold text-gray-800;
        }

        /* Add custom spacing between form elements */
        .form-item {
            @apply mb-6;
        }
    </style>
</head>
<body class="bg-gray-100 p-8">

<div class="form-container">
    <header class="form-header">
        <h1>Buat Pesanan Baru</h1>
    </header>

    <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
        @csrf
        <!-- Menu Selection -->
        <div class="form-item">
            <label for="menu_id" class="block text-lg font-medium text-gray-700">Pilih Menu</label>
            <select name="menu_id" id="menu_id" required class="form-input">
                <option value="" disabled selected>Pilih Menu</option>
                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Quantity -->
        <div class="form-item">
            <label for="quantity" class="block text-lg font-medium text-gray-700">Quantity</label>
            <input type="number" name="quantity" id="quantity" required min="1" class="form-input" placeholder="Enter Quantity">
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="form-button">Simpan</button>
        </div>
    </form>
</div>

</body>
</html>
