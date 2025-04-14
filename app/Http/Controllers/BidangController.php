<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    /**
     * Menampilkan daftar semua bidang.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $bidang = Bidang::when($search, function ($query, $search) {
            return $query->where('nama_bidang', 'like', "%{$search}%");
        })->get();
    
        return view('bidang.index', compact('bidang', 'search'));
    }
    

    /**
     * Menampilkan form untuk membuat bidang baru.
     */
    public function create()
    {
        return view('bidang.create'); // Tidak perlu variabel tambahan
    }

    /**
     * Menyimpan bidang baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_bidang' => 'required|string|max:255',
        ]);

        Bidang::create([
            'nama_bidang' => $request->nama_bidang,
        ]);

        return redirect()->route('bidang.index')->with('success', 'Bidang berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail bidang berdasarkan ID.
     */
    public function show($id)
    {
        $bidang = Bidang::findOrFail($id);
        return view('bidang.show', compact('bidang'));
    }

    /**
     * Menampilkan form edit bidang.
     */
    public function edit($id)
    {
        $bidang = Bidang::findOrFail($id);
        return view('bidang.edit', compact('bidang'));
    }

    /**
     * Memperbarui data bidang di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bidang' => 'required|string|max:255',
        ]);

        $bidang = Bidang::findOrFail($id);
        $bidang->update([
            'nama_bidang' => $request->nama_bidang,
        ]);

        return redirect()->route('bidang.index')->with('success', 'Bidang berhasil diperbarui.');
    }

    /**
     * Menghapus bidang dari database.
     */
    public function destroy($id)
    {
        $bidang = Bidang::findOrFail($id);
        $bidang->delete();

        return redirect()->route('bidang.index')->with('success', 'Bidang berhasil dihapus.');
    }
}
