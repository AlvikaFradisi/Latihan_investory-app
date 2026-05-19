<!-- Menggunakan file layout utama kita yang bernama 'main' -->
@extends('layouts.main')

<!-- Blok konten di bawah ini yang akan masuk ke dalam tag @yield('content') -->
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Kategori</h2>
        <!-- Link arah ke Route Create -->
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            + Tambah Kategori
        </a>
    </div>

    <!-- Pengecekkan dan pencetakan pesan sukses flash-session -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Kita loop data hasil tarikan Eloquent ORM -->
            <!-- $index untuk mendapat nomor urutan asli bawaan foreach -->
            @foreach ($categories as $index => $cat)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
