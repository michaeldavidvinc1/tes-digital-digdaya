@extends('app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Product</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('product.index') }}" type="button" class="btn btn-primary btn-sm">
                    Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="p-4">
                    <form action="{{ route('product.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Barang</label>
                                <div class="form-icon position-relative">
                                    <input type="text" value="{{ $data->name }}" name="name" id="name"
                                        class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                                        required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kategori Barang</label>
                                <div class="form-icon position-relative">
                                    <input type="text" value="{{ $data->category }}" name="category" id="category"
                                        class="form-control @error('category')
                                        is-invalid
                                    @enderror"
                                        required>
                                    @error('category')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Harga</label>
                                <div class="form-icon position-relative">
                                    <input type="number" value="{{ $data->price }}" name="price" id="price"
                                        class="form-control @error('price')
                                        is-invalid
                                    @enderror"
                                        required>
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stock</label>
                                <div class="form-icon position-relative">
                                    <input type="number" value="{{ $data->stock }}" name="stock" id="stock"
                                        class="form-control @error('stock')
                                        is-invalid
                                    @enderror"
                                        required>
                                    @error('stock')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Deskripsi</label>
                                <div class="form-icon position-relative">
                                    <textarea name="desc" id="desc"
                                        class="form-control @error('desc')
                                        is-invalid
                                    @enderror">{{ $data->desc }}</textarea>
                                    @error('desc')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
