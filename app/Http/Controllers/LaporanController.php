<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\User;
use App\Models\Bidang;
use App\Events\LaporanDibuat;
use App\Mail\LaporanKegiatanMail;
use Illuminate\Support\Facades\Mail; // 🔹 Tambahkan ini!
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    // Menampilkan daftar laporan
    public function index(Request $request)
    {
        $search = $request->input('search');

        $laporan = Laporan::with('tanggapan')
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_kegiatan', 'like', '%' . $search . '%');
            })
            ->paginate(10);
    
        return view('laporan.index', compact('laporan', 'search'));
    }

    // Menampilkan form tambah laporan
    public function create()
    {
        $users = User::all();
        $bidang = Bidang::all();
        return view('laporan.create', compact('users', 'bidang'));
    }
    
    // Menyimpan laporan baru
    public function store(Request $request)
    {        
            $user = Auth::user(); // Mendapatkan user yang sedang login
        
            // Validasi input
            $validated = $request->validate([
                'nama_kegiatan' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tanggal_kegiatan' => 'required|date',
                'lokasi' => 'required|string|max:255',
                'bidangID' => 'required|exists:bidang,bidangID',
                'pdf_file' => 'nullable|file|mimes:pdf|max:2048', // Validasi PDF (max 2MB)
            ]);
        
            // Tambahkan userID secara manual
            $validated['userID'] = Auth::id();
        
            // Buat instance Laporan
            $laporan = new Laporan($validated);
        
            // Proses upload gambar jika ada
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $laporan->image = $imagePath;
            }
        
            // Proses upload file PDF jika ada
            if ($request->hasFile('pdf_file')) {
                $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');
                $laporan->pdf_file = $pdfPath; // Simpan path langsung
            }
        
            // Simpan ke database
            $laporan->save();
        
            // Debugging - Pastikan file benar-benar tersimpan        
        

        // Simpan data laporan ke database
    
        // Dispatch event setelah laporan dibuat
        event(new LaporanDibuat($laporan));


        // Ambil email tujuan, pisahkan menjadi array
        $emailTujuan = is_string($request->email_tujuan) ? array_map('trim', explode(',', $request->email_tujuan)) : [];

        // Kirim email ke setiap penerima atas nama admin
        foreach ($emailTujuan as $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // Validasi email
                Mail::to($email)->send(new LaporanKegiatanMail($laporan));
            }
        }

        $laporan->save();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dikirim.');
    
        
    }

    // Menampilkan laporan tertentu
    public function show($id)
    {
        $laporan = Laporan::with('user', 'tanggapan')->findOrFail($id);
        return view('laporan.show', compact('laporan'));
    }

    // Menampilkan form edit laporan
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        $users = User::all();
        $bidang = Bidang::all(); // Ambil semua bidang dari tabel 'bidangs'

        return view('laporan.edit', compact('laporan', 'users'));
    }

    // Menyimpan perubahan laporan
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $validated = $request->validate([
          'userID' => 'required|exists:users,id',
            'nama_kegiatan' => 'string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal_kegiatan' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'bidangID' => 'required|exists:bidang,bidangID',
            'tanggapan_laporan' => 'nullable|string',
            'pdf' => 'required|mimes:pdf|max:2048',
        ]);

        // Tambahkan userID secara manual
    $validated['userID'] = Auth::id();

        $laporan->update($validated);

        if ($request->hasFile('image')) {
            if ($laporan->image) {
                Storage::delete('public/' . $laporan->image);
            }
            $laporan->image = $request->file('image')->store('images', 'public');
        }

        $laporan->save();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Menghapus laporan
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);

        if ($laporan->image) {
            Storage::delete('public/' . $laporan->image);
        }

        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }

    public function kirimEmail(Request $request, $id)
{
    $laporan = Laporan::findOrFail($id);

    // Ambil email dari input form
    $emailTujuan = explode(',', $request->email); // Pisahkan jika lebih dari satu email

    // Kirim email ke setiap penerima
    foreach ($emailTujuan as $email) {
        Mail::to(trim($email))->send(new LaporanKegiatanMail($laporan));
    }

    return redirect()->back()->with('success', 'Email notifikasi berhasil dikirim.');
}

public function __construct()
{
    $this->middleware('auth');
}



}