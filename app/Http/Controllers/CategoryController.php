<?php

namespace App\Http\Controllers;

use App\Models\Category; // Impor model Category
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('categories.index', compact('categories')); // Kirim kategori ke view
    }

    public function create()
    {
        return view('categories.create'); // Tampilkan form untuk membuat kategori baru
    }

    public function store(Request $request)
{
    // Debugging: tampilkan data yang diterima
    \Log::info($request->all());
    
    // Validasi input dari pengguna
    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name', // Validasi nama kategori harus unik
    ]);

    // Simpan kategori baru
    Category::create($request->only(['name']));
    
    return redirect()->route('categories.index')->with('success', 'Category created successfully.');
}


    public function edit(Category $category)
    {
        return view('categories.edit', compact('category')); // Kirim kategori yang akan diedit ke view
    }

    public function update(Request $request, Category $category)
    {
        // Validasi input dari pengguna
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id, // Validasi dengan pengecualian ID yang ada
        ]);

        // Update kategori dengan kolom yang diizinkan
        $category->update($request->only(['name']));
        
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // Hapus kategori
        $category->delete();
        
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
