<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">📝 Tambah Laporan</h4>
                </div>
                <div class="card-body p-4">

                    <!-- Alert error -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="bi bi-exclamation-triangle-fill"></i> Error:</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Form Utama -->
                    <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="userID" value="{{ auth()->id() }}">

                        <!-- Nama Pengirim -->
                        <div class="mb-3">
                            <label for="name" class="form-label">👤 Nama Pengirim</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name ?? '' }}" readonly>
                        </div>

                        <!-- Nama Kegiatan -->
                        <div class="mb-3">
                            <label for="nama_kegiatan" class="form-label">📌 Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan nama kegiatan" required>
                        </div>

                        <!-- Upload Gambar -->
                        <div class="mb-3">
                            <label for="image" class="form-label">🖼️ Upload Gambar</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <!-- Tanggal Kegiatan -->
                        <div class="mb-3">
                            <label for="tanggal_kegiatan" class="form-label">📅 Tanggal Kegiatan</label>
                            <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" required>
                        </div>

                        <!-- Lokasi -->
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">📍 Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan lokasi kegiatan" required>
                        </div>

                        <!-- Pilih Bidang -->
                        <div class="mb-3">
                            <label for="bidangID" class="form-label">🏢 Bidang</label>
                            <select class="form-select" id="bidangID" name="bidangID" required>
                                <option value="">-- Pilih Bidang --</option>
                                @foreach ($bidang as $bidang)
                                    <option value="{{ $bidang->bidangID }}">{{ $bidang->nama_bidang }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Upload PDF -->
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="bi bi-file-earmark-pdf"></i> Unggah PDF</label>
                            <input type="file" name="pdf_file" class="form-control" accept="application/pdf">
                        </div>
                        
                        <!-- Tombol Simpan & Batal -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
                            <a href="{{ route('laporan.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
