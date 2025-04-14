@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        
        <!-- Main Content -->
        <div class="col-md-20 p-4">
            <div class="container-fluid bg-white shadow-lg rounded p-5">
                <h1 class="display-4 font-weight-bold mb-5 text-center text-primary">Daftar Petugas</h1>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                @if($search)
                <p class="text-muted">Menampilkan hasil pencarian untuk: <strong>{{ $search }}</strong></p>
                @endif

                
                <div class="mb-3 d-flex justify-content-between">
                    <a href="{{ route('petugas.create') }}" class="btn btn-primary btn-lg shadow-sm">
                        <i class="bx bx-plus"></i> Tambah Petugas
                    </a>
                </div>
                
                <div class="table-responsive mb-4">
                    <table class="table table-striped table-hover table-bordered text-center">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($petugas->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Tidak ada data petugas.</td>
                                </tr>
                            @else
                                @foreach ($petugas as $item)
                                    <tr>
                                        <td class="align-middle">{{ $item->name }}</td>
                                        <td class="align-middle">{{ $item->email }}</td>
                                        <td class="align-middle">{{ $item->role ?? '-' }}</td>
                                        <td class="align-middle">
                                            
                                                <form action="{{ route('petugas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus petugas ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                                                        <i class='bx bxs-trash'></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $petugas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
