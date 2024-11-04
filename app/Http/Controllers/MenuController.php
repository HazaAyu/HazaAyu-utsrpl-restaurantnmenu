<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('category')->get(); // Mengambil semua menu beserta kategori mereka
        $categories = Category::all(); // Ambil semua kategori
        
        return view('menu.index', compact('categories', 'menus')); // Kirim categories dan menus ke view
    }

    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('menu.create', compact('categories')); // Kirim categories ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        Menu::create($request->only(['name', 'description', 'price', 'category_id']));
        
        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        $categories = Category::all(); // Ambil semua kategori untuk edit
        return view('menu.edit', compact('menu', 'categories')); // Kirim menu dan categories ke view
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $menu->update($request->only(['name', 'description', 'price', 'category_id']));
        
        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }
}
