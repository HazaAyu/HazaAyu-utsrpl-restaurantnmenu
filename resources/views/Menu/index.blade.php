<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">

    <header class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl font-bold">Welcome to Our Restaurant</h1>
            <nav class="mt-4">
                <ul class="flex justify-center space-x-6">
                    <li><a href="#food" class="hover:underline">Food Menu</a></li>
                    <li><a href="#drinks" class="hover:underline">Drink Menu</a></li>
                    <li><a href="#contact" class="hover:underline">Contact Us</a></li>
                    <li><a href="{{ route('categories.index') }}" class="hover:underline">Categories</a></li>
                    <li><a href="{{ route('menus.create') }}" class="hover:underline">Create Menu Item</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto my-8 px-4">
        @foreach ($categories as $category)
            <section id="{{ strtolower($category->name) }}" class="mb-12">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ ucfirst($category->name) }} Menu</h2>
                <ul class="space-y-4">
                    @foreach ($menus as $menu)
                        @if ($menu->category_id == $category->id)
                            <li class="bg-white p-4 rounded-lg shadow-md flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold">{{ $menu->name }}</h3>
                                    <p class="text-gray-600">{{ $menu->description }}</p>
                                    <span class="text-gray-800 font-semibold">Price: Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('menus.edit', $menu->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this menu item?');" class="text-red-500 hover:underline">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>
        @endforeach
    </main>

    <footer id="contact" class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <h2 class="text-xl font-semibold">Contact Us</h2>
            <p>If you have any questions or need to make a reservation, feel free to contact us at:</p>
            <p>Email: info@ourrestaurant.com</p>
            <p>Phone: (123) 456-7890</p>
        </div>
    </footer>
</body>
</html>
