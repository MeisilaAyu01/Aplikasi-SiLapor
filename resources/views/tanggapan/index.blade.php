@extends('layouts.template')

@section('content')
<style>
    .container {
        max-width: 900px;
    }
    .card {
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease-in-out;
    }
    .card:hover {
        transform: scale(1.02);
    }
    .table {
        border-radius: 8px;
        overflow: hidden;
    }
    .table thead {
        background: linear-gradient(to right,#87CEEB, #007bff);
        color: white;
        font-weight: bold;
    }
    .btn {
        border-radius: 6px;
        font-weight: 600;
        padding: 6px 12px;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333;
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 font-weight-bold text-primary">Daftar Tanggapan</h1>
        <a href="{{ route('tanggapan.create', ['laporanID' => $tanggapan->first()->laporanID ?? 1]) }}" class="btn btn-primary">
            + Tambah Tanggapan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($search)
    <p class="text-muted">Menampilkan hasil pencarian untuk: <strong>{{ $search }}</strong></p>
    @endif


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Laporan</th>
                            <th>User</th>
                            <th>Tanggapan</th>
                            <th>Tanggal</th>
                            <th>Bidang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tanggapan as $item)
                        <tr>
                            <td class="text-center">{{ $item->tanggapanID }}</td>
                            <td>{{ $item->laporan->nama_kegiatan ?? '-' }}</td>
                            <td>{{ auth()->user()->name ?? 'Tidak Ada' }}</td>
                            <td>{{ $item->tanggapan }}</td>
                            <td class="text-center">{{ $item->tanggal_tanggapan }}</td>
                            <td>{{ $item->bidang->nama_bidang ?? '-' }}</td>
                            <td class="text-center">
                                <form action="{{ route('tanggapan.destroy', $item->tanggapanID) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
