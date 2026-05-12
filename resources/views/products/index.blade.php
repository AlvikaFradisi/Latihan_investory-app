@extends('layouts.main')

@section('content')
<div class="mb-4">
    <h1>Daftar Barang Inventaris</h1>
    <a href="{{ url('/insert') }}" class="btn btn-primary mt-2">Tambah Barang</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <table class="table table-striped table-hover mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->category->name }}</td>
                <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                <td>{{ $p->stock }}</td>
                <td>
                    @if($p->status === 'tersedia')
                        <span class="badge bg-success">Tersedia</span>
                    @else
                        <span class="badge bg-danger">Tidak Tersedia</span>
                    @endif
                </td>
                <td>{{ $p->description }}</td>
                <td>
                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection
