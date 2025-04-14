<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan path model benar
use App\Models\Petugas; // Pastikan model Petugas di-import jika diperlukan
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    // Menampilkan daftar petugas
    public function index(Request $request)
    {   
        $search = $request->input('search');
    
        // Query pencarian dengan filter
        $petugas = Petugas::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10);
    
        // Mengirim data ke view
        return view('petugas.index', compact('petugas', 'search'));
    }
    
    
        

    // Menampilkan formulir untuk membuat petugas baru
    public function create()
    {
        return view('petugas.create');
    }

    // Menyimpan petugas baru ke dalam database
    public function store(Request $request)
    {
        // Aturan validasi umum
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,user,petugas,sekolah',
            
            
        ];

        $validator = Validator::make($request->all(), $rules);

        // Memeriksa jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan data petugas baru ke dalam database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan.');
    }

    // Menampilkan formulir untuk mengedit petugas
    public function edit($id)
    {
        $petugas = User::findOrFail($id);
        return view('petugas.edit', compact('petugas'));
    }

    // Memperbarui informasi petugas di database
    public function update(Request $request, $id)
    {
        // Aturan validasi
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string|in:admin,user,petugas,sekolah',
        ];

        $validator = Validator::make($request->all(), $rules);

        // Memeriksa jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Mencari petugas berdasarkan ID
        $petugas = User::findOrFail($id);
        $data = $request->except('password');

        // Jika password diisi, hash dan simpan
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $petugas->update($data);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil diperbarui.');
    }

    // Menghapus petugas dari database
    public function destroy($id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus.');
    }
}
