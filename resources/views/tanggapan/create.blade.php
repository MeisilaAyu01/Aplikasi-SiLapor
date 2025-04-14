<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tanggapan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .btn {
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary:hover {
            background-color: #6c757d;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <h2 class="text-center text-primary mb-4">Tambah Tanggapan</h2>

                {{-- Menampilkan error validasi jika ada --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('tanggapan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Laporan</label>
                        <input type="text" class="form-control bg-light" value="{{ $laporan->nama_kegiatan }} - {{ $laporan->description }}" disabled>
                        <input type="hidden" name="laporanID" value="{{ $laporan->laporanID }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">User</label>
                        <input type="text" class="form-control bg-light" value="{{ auth()->user()->name }}" disabled>
                        <input type="hidden" name="userID" value="{{ auth()->user()->userID }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Bidang</label>
                        <input type="text" class="form-control bg-light" value="{{ $laporan->bidang->nama_bidang ?? 'Tidak Ada' }}" disabled>
                        <input type="hidden" name="bidangID" value="{{ $laporan->bidangID }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggapan" class="form-label fw-bold">Tanggapan</label>
                        <textarea name="tanggapan" id="tanggapan" class="form-control" rows="3" required>{{ old('tanggapan') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_tanggapan" class="form-label fw-bold">Tanggal</label>
                        <input type="date" name="tanggal_tanggapan" id="tanggal_tanggapan" class="form-control" value="{{ old('tanggal_tanggapan', now()->format('Y-m-d')) }}" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4">Simpan</button>
                        <a href="{{ route('tanggapan.index') }}" class="btn btn-secondary px-4">Kembali</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
