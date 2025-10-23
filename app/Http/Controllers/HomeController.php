<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class HomeController extends Controller
{
    // Tampilkan daftar ToDo
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return view('todos.home', compact('todos'));
    }

    // Form tambah
    public function create()
    {
        return view('todos.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'tanggal_selesai' => 'nullable|date',
        ]);

        Todo::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'tanggal_selesai' => $request->tanggal_selesai,
            'selesai' => false,
        ]);

        return redirect()->route('home')->with('success', 'ToDo berhasil ditambahkan!');
    }

    // Form edit
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'tanggal_selesai' => 'nullable|date',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'tanggal_selesai' => $request->tanggal_selesai,
            'selesai' => $request->has('selesai'),
        ]);

        return redirect()->route('home')->with('success', 'ToDo berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        Todo::findOrFail($id)->delete();
        return redirect()->route('home')->with('success', 'ToDo berhasil dihapus!');
    }
}
