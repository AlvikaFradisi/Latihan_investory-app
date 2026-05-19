@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0 text-danger">Konfirmasi Hapus Barang</h2>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                &larr; Kembali
            </a>
        </div>

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden border-danger border-top border-4">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                <p class="text-danger fw-bold mb-0">
                    <i class="bi bi-exclamation-triangle-fill"></i> PERINGATAN: Apakah Anda yakin ingin menghapus data ini? Data yang sudah dihapus tidak dapat dikembalikan.
                </p>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="row g-4 mb-4">
                        <div class="col-md-8">
                            <label class="form-label fw-bold">Nama Barang</label>
                            <input type="text" class="form-control form-control-lg bg-light" value="{{ $product->name }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Kategori</label>
                            <input type="text" class="form-control form-control-lg bg-light" value="{{ $product->category->name }}" readonly>
                        </div>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Harga</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light border-end-0">Rp</span>
                                <input type="text" class="form-control border-start-0 ps-0 bg-light" value="{{ number_format($product->price, 0, ',', '.') }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Stok</label>
                            <input type="number" class="form-control form-control-lg bg-light" value="{{ $product->stock }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Status Tersedia</label>
                            <input type="text" class="form-control form-control-lg bg-light text-capitalize" value="{{ $product->status }}" readonly>
                        </div>
                    </div>

                    @if($product->description)
                    <div class="mb-4">
                        <label class="form-label fw-bold">Deskripsi Barang</label>
                        <textarea class="form-control bg-light" rows="3" readonly>{{ $product->description }}</textarea>
                    </div>
                    @endif

                    <hr class="my-4 text-muted">
                    <div class="d-flex justify-content-end gap-3">
                        <a href="{{ route('products.index') }}" class="btn btn-light px-4 py-2">Batal Hapus</a>
                        <button type="submit" class="btn btn-danger px-5 py-2 fw-bold shadow-sm">
                            Ya, Hapus Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
