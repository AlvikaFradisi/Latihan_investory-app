@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Tambah Barang Baru</h2>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                &larr; Kembali
            </a>
        </div>

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                <p class="text-muted mb-0">Silakan isi formulir di bawah ini dengan detail barang yang ingin ditambahkan.</p>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="row g-4 mb-4">
                        <!-- Kolom Kiri / Utama -->
                        <div class="col-md-8">
                            <label for="name" class="form-label fw-bold">Nama Barang</label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama barang..." required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kolom Kanan / Kategori -->
                        <div class="col-md-4">
                            <label for="category_id" class="form-label fw-bold">Kategori</label>
                            <select class="form-select form-select-lg @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                <option value="" disabled selected>Pilih Kategori...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-4 mb-4">
                        <!-- Harga -->
                        <div class="col-md-4">
                            <label for="price" class="form-label fw-bold">Harga</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light border-end-0">Rp</span>
                                <input type="number" class="form-control border-start-0 ps-0 @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="0" required min="0">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Stok -->
                        <div class="col-md-4">
                            <label for="stock" class="form-label fw-bold">Stok Awal</label>
                            <input type="number" class="form-control form-control-lg @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock') }}" placeholder="0" required min="0">
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="col-md-4">
                            <label for="status" class="form-label fw-bold">Status Tersedia</label>
                            <select class="form-select form-select-lg @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="habis" {{ old('status') == 'habis' ? 'selected' : '' }}>Habis</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold">Deskripsi Barang <span class="text-muted fw-normal">(Opsional)</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Tuliskan deskripsi lengkap tentang barang ini secara opsional...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4 text-muted">

                    <div class="d-flex justify-content-end gap-3">
                        <a href="{{ route('products.index') }}" class="btn btn-light px-4 py-2">Batalkan</a>
                        <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                            Simpan Barang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection