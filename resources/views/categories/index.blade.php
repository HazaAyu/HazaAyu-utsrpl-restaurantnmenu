<!-- resources/views/category/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Link to Tailwind CSS -->

</head>
<body class="bg-gray-100 p-8">

<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <header class="mb-6">
        <h1 class="text-3xl font-semibold mb-4">Categories</h1>
        <nav class="space-x-4">
            <a href="{{ route('categories.create') }}" class="text-blue-600 hover:underline">Create New Category</a>
            <a href="{{ route('menus.index') }}" class="text-blue-600 hover:underline">See All Menu</a>
        </nav>
    </header>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-left text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Name</th>
                    <th class="py-3 px-6">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($categories as $category)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $category->id }}</td>
                        <td class="py-3 px-6">{{ $category->name }}</td>
                        <td class="py-3 px-6">
                            <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600 hover:underline mr-3">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
