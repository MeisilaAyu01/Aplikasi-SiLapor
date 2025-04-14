@extends('layouts.template')

@section('content')

<style>
    .container {
        max-width: 1100px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    .card:hover {
        transform: scale(1.02);
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    body.modal-open {
    padding-right: 0px !important;
    }

    .modal {
        animation: none !important;
        transform: none !important;
    }

    .modal-body input {
        width: 100%;
    }

    .table thead {
        background: linear-gradient(to right,#87CEEB, #007bff);
        color: white;
    }

    .btn-primary, .btn-danger, .btn-success, .btn-warning {
        border-radius: 8px;
        font-weight: bold;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .img-thumbnail {
        border-radius: 10px;
    }

</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold text-primary">Daftar Laporan</h1>
        <a href="{{ route('laporan.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle"></i> Tambah Laporan
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($search)
    <p class="text-muted">Menampilkan hasil pencarian untuk: <strong>{{ $search }}</strong></p>
    @endif


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kegiatan</th>
                            <th>Gambar</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Tanggapan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-bold">{{ $item->nama_kegiatan }}</td>
                                <td class="text-center">
                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="Gambar" class="img-thumbnail" width="60">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ optional($item->tanggapan)->tanggapan ?? 'Belum ada' }}</td>
                                <td class="text-center">
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('laporan.show', $item->laporanID) }}" class="btn btn-sm btn-info mb-1" title="Lihat">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                            <!-- Tampilkan Button Lihat PDF Jika Sudah Ada -->
                                            @if ($item->pdf_file)
                                            <a href="{{ Storage::url($item->pdf_file) }}" target="_blank" class="btn btn-warning btn-sm">
                                                <i class="bi bi-file-earmark-pdf"></i> Lihat PDF
                                            </a>
                                          @else
                                            <span class="text-muted">Tidak ada PDF</span>
                                          @endif
                                            
                                               
                                         
                                            <button class="btn btn-primary dropdown-toggle w-100" type="button" id="dropdownEmail" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center; justify-content: center;">
                                                <i class="bx bx-envelope"></i> Kirim Email
                                            </button>
                                            <ul class="dropdown-menu shadow-lg" aria-labelledby="dropdownEmail" style="min-width: 350px; border-radius: 8px; padding: 10px; list-style: none;">
                                                <div>
                                                    <h6 class="dropdown-header text-center m-0">Masukkan Email Tujuan</h6>
                                                </div>
                                                <form action="{{ route('laporan.kirimEmail', $item->laporanID) }}" method="POST">
                                                    @csrf
                                                    <div class="mb-2">
                                                        <label for="email" class="form-label">Email Tujuan:</label>
                                                        <input type="text" name="email" id="email" class="form-control" required placeholder="Pisahkan dengan koma jika lebih dari satu">
                                                    </div>
                                                    <button type="submit" class="btn btn-success w-100 d-flex align-items-center justify-content-center">
                                                        <i class="bx bx-send me-2"></i> Kirim
                                                    </button>
                                                </form>
                                            </ul>
                                        
                                                                                                                                                                                                 

                                            @if (!$item->tanggapan)
                                                <!-- Misal di dalam foreach($laporans as $laporan) -->
                                                <a href="{{ route('tanggapan.create', $item->laporanID) }}" class="btn btn-success">
                                                    Buat Tanggapan
                                                </a>
                                            @endif

                                            <form action="{{ route('laporan.destroy', $item->laporanID) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class='bx bxs-trash'></i>
                                                </button>
                                            </form>
                                        </div>
                                </td>
                            </tr>
                        @endforeach

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                // Tangkap semua tombol kirim email
                                document.querySelectorAll('.btn-kirim-email').forEach(button => {
                                    button.addEventListener('click', function() {
                                        var laporanID = this.getAttribute('data-laporan-id');
                                        var form = document.getElementById('emailForm');
                        
                                        // Set action form sesuai laporan yang diklik
                                        form.action = "/laporan/" + laporanID + "/kirim-email";
                                    });
                                });
                            });
                        </script>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
