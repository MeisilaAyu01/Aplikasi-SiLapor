@extends('layouts.template')

@section('content')
<style>
    .container {
        max-width: 900px;
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
    .table thead {
        background: linear-gradient(to right,#87CEEB, #007bff);
        color: white;
    }
    .btn-primary {
        border-radius: 8px;
        font-weight: bold;
    }
    .btn-danger {
        border-radius: 8px;
        font-weight: bold;
    }
    .btn-danger:hover {
        background-color: #c82333;
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold text-primary">Daftar Bidang</h1>
        <a href="{{ route('bidang.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> Tambah Bidang
        </a>
    </div>


    @if($search)
    <p class="text-muted">Menampilkan hasil pencarian untuk: <strong>{{ $search }}</strong></p>
    @endif


    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Nama Bidang</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bidang as $item)
                        <tr>
                            <td>{{ $item->nama_bidang }}</td>
                            <td class="text-center">
                                <form action="{{ route('bidang.destroy', $item->bidangID) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection