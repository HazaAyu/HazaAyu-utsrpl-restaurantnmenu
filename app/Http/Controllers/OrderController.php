<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Menampilkan semua pesanan
    public function index()
    {
        $orders = Order::all();  // Ambil semua data pesanan
        return view('orders.index', compact('orders'));
    }

    // Menampilkan form untuk menambah pesanan baru
    public function create()
    {
        $menus = Menu::all(); // Ambil semua data menu
        return view('orders.create', compact('menus'));
    }

    // Menyimpan pesanan baru
    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',  // Pastikan menu_id ada di tabel menus
            'quantity' => 'required|integer|min:1',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index');
    }

    // Menampilkan detail pesanan
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    // Menampilkan form untuk mengedit pesanan
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $menus = Menu::all();
        return view('orders.edit', compact('order','menus'));
    }

    // Menyimpan perubahan pesanan
    public function update(Request $request, $id)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('orders.index');
    }

    // Menghapus pesanan
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index');
    }
}
