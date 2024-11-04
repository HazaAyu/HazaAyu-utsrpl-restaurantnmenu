<!-- resources/views/category/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Link to Tailwind CSS -->

</head>
<body class="bg-gray-100 p-8">

<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <header class="mb-6">
        <h1 class="text-2xl font-semibold mb-4">Create New Category</h1>
        <nav>
            <a href="{{ route('categories.index') }}" class="text-blue-600 hover:underline">Back to Categories</a>
        </nav>
    </header>

    <main>
        <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Category Name:</label>
                <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Create Category
            </button>
        </form>
    </main>
</div>

</body>
</html>
