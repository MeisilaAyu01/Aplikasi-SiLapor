<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kegiatan Baru</title>
</head>
<body>
    <h2>Laporan Kegiatan Baru</h2>
    <p><strong>Kegiatan:</strong> {{ $laporan->nama_kegiatan }}</p>
    <p><strong>Dibuat oleh:</strong> {{ $laporan->user->name }}</p>
    <p><strong>Tanggal:</strong> {{ $laporan->created_at->format('d M Y H:i') }}</p>
    
    <br>
    @if (!$laporan->tanggapan)
    <!-- Misal di dalam foreach($laporans as $laporan) -->
    <a href="{{ route('tanggapan.create', $laporan->laporanID) }}" class="btn btn-success">
        Buat Tanggapan
    </a>
    @endif
    
    <br>
    <p>Terima kasih,</p>
    <p><strong>Admin Sekolah</strong></p>
</body>
</html>
