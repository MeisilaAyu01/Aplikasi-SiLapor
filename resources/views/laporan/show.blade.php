<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan</title>

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            border-radius: 12px;
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        .form-control {
            text-align: center;
            background-color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card shadow-lg border-0 mx-auto">
        <div class="card-header bg-primary text-white text-center py-3">
            <h4 class="mb-0"><i class="fas fa-file-alt me-2"></i> Detail Laporan</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label fw-bold"><i class="fas fa-user me-2"></i> Nama Pelapor</label>
                <input type="text" class="form-control" value="{{ $laporan->user->name ?? '-' }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold"><i class="fas fa-tasks me-2"></i> Nama Kegiatan</label>
                <input type="text" class="form-control" value="{{ $laporan->nama_kegiatan }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold"><i class="fas fa-map-marker-alt me-2"></i> Lokasi</label>
                <input type="text" class="form-control" value="{{ $laporan->lokasi }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold"><i class="fas fa-calendar-alt me-2"></i> Tanggal Kegiatan</label>
                <input type="text" class="form-control" value="{{ $laporan->tanggal_kegiatan }}" readonly>
            </div>

            @if ($laporan->image)
                <div class="mb-3">
                    <label class="form-label fw-bold">🖼️ Gambar</label><br>
                    <img src="{{ asset('storage/' . $laporan->image) }}" class="img-fluid rounded" style="max-height: 300px;">
                </div>
            @endif

             <!-- PDF -->
            <div class="mb-3">
                 @if ($laporan->pdf_file)
                 <a href="{{ Storage::url($laporan->pdf_file) }}" target="_blank" class="btn btn-warning btn-sm">
                     <i class="bi bi-file-earmark-pdf"></i> Lihat PDF
                 </a>
               @else
                 <span class="text-muted">Tidak ada PDF</span>
               @endif

            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    <i class="fas fa-comments me-2"></i> Tanggapan
                </label>
                <input type="text" class="form-control" value="{{ optional($laporan->tanggapan)->tanggapan ?? 'Belum ada' }}" readonly>
            </div>
            

            <!-- Tombol Kembali -->
            <div class="text-center mt-4">
                <a href="{{ route('laporan.index') }}" class="btn btn-secondary px-4">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
