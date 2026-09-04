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
        ]);

        Todo::create([
            'title' => $request->title,
        ]);

        return redirect()->back()->with('success', 'Todo berhasil ditambahkan!');
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update([
            'is_completed' => !$todo->is_completed,
        ]);

        return redirect()->back()->with('success', 'Status todo berhasil diperbarui!');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->back()->with('success', 'Todo berhasil dihapus!');
    }
}
