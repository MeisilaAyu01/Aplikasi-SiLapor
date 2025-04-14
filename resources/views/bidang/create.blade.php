@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h2>Tambah Bidang</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bidang.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_bidang" class="form-label">Nama Bidang</label>
            <input type="text" name="nama_bidang" class="form-control" required>
        </div>
        
        

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection