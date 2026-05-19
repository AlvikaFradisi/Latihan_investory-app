@extends('layouts.main')

@section('content')
    <div class="card w-50 mx-auto">
        <div class="card-header">
            <h4>Tambah Kategori Baru</h4>
        </div>
        <div class="card-body">
            <!-- Route action menuju STORE sebagai titik akhir proses simpan baru -->
            <form action="{{ route('categories.store') }}" method="POST">
                <!-- Token wajib pelindung serangan CSRF Laravel -->
                @csrf

                <div class="mb-3">
                    <label>Nama Kategori</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <!-- Tombol Action -->
                <button type="submit" class="btn btn-success">Simpan Kategori</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
