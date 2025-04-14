<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use App\Models\Laporan;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    /**
     * Menampilkan daftar tanggapan
     */
    public function index(Request $request) // Tambahkan Request $request di parameter
    {
        $search = $request->input('search'); // Sekarang $request sudah dikenali
    
        $tanggapan = Tanggapan::with('laporan', 'user')
            ->when($search, function ($query) use ($search) {
                return $query->where('tanggapan', 'like', '%' . $search . '%');
            })
            ->paginate(10);
    
        return view('tanggapan.index', compact('tanggapan', 'search'));
    }
    

    /**
     * Menampilkan form tambah tanggapan
     */
    public function create()
    {
        $laporan = Laporan::latest()->first(); // Ambil satu laporan terbaru
        $users = User::all();
        $bidang = Bidang::all(); // Pastikan mengambil data bidang dari database
    
        return view('tanggapan.create', compact('laporan', 'users', 'bidang'));
    }
    

    /**
     * Menyimpan tanggapan baru
     */
    public function store(Request $request)
    {

        $request->validate([
            'laporanID' => 'required|exists:laporan,laporanID',
            'userID' => 'nullable|exists:users,userID',
            'bidangID' => 'required|exists:bidang,bidangID', // Validasi wajib dan memastikan bidangID ada di tabel bidang
            'tanggapan' => 'required|string',
            'tanggal_tanggapan' => 'required|date',
        ]);
        
        

        Tanggapan::create($request->all());

        return redirect()->route('tanggapan.index')->with('success', 'Tanggapan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail tanggapan
     */
    public function show(Tanggapan $tanggapan)
    {
        return view('tanggapan.show', compact('tanggapan'));
    }

    /**
     * Menampilkan form edit tanggapan
     */
    public function edit(Tanggapan $tanggapan)
    {
        $laporan = Laporan::all();
        $bidang = Bidang::all();
        $users = User::all();
        return view('tanggapan.edit', compact('tanggapan', 'laporan', 'bidang', 'users'));
    }

    /**
     * Memperbarui tanggapan
     */
    public function update(Request $request, Tanggapan $tanggapan)
    {
        $request->validate([
            'laporanID' => 'required|exists:laporan,laporanID',
            'userID' => 'nullable|exists:users,userID',
            'tanggapan' => 'required|string',
            'tanggal_tanggapan' => 'required|date',
            'bidangID' => 'required|exists:bidang,bidangID', // Pastikan menggunakan 'id' bukannya 'bidangID'
        ]);
        

        $tanggapan->update($request->all());

        return redirect()->route('tanggapan.index')->with('success', 'Tanggapan berhasil diperbarui.');
    }

    /**
     * Menghapus tanggapan
     */
    public function destroy(Tanggapan $tanggapan)
    {
        $tanggapan->delete();

        return redirect()->route('tanggapan.index')->with('success', 'Tanggapan berhasil dihapus.');
    }
}