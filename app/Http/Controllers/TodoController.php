<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
        ]);

        Todo::create([
            'title' => $request->title,
            'category' => $request->category,
        ]);

        return redirect()->back()->with('success', 'Barang inventaris berhasil ditambahkan!');
    }

    public function update(Request $request, Todo $todo)
    {
        // Jika request membawa input edit nama/kategori barang
        if ($request->has('title')) {
            $request->validate([
                'title' => 'required|string|max:255',
                'category' => 'required|string|max:100',
            ]);

            $todo->update([
                'title' => $request->title,
                'category' => $request->category,
            ]);

            return redirect()->back()->with('success', 'Data barang berhasil diperbarui!');
        }

        // Jika request toggle status selesai
        $todo->update([
            'is_completed' => !$todo->is_completed,
        ]);

        return redirect()->back()->with('success', 'Status barang berhasil diperbarui!');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->back()->with('success', 'Data barang berhasil dihapus!');
    }
}
