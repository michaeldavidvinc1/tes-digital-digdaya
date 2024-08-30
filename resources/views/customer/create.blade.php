@extends('app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Add Customer</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('customer.index') }}" type="button" class="btn btn-primary btn-sm">
                    Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="p-4">
                    <form action="{{ route('customer.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama</label>
                                <div class="form-icon position-relative">
                                    <input type="text" value="{{ old('name') }}" name="name" id="name"
                                        class="form-control @error('name')
                                        is-invalid
                                    @enderror">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <div class="form-icon position-relative">
                                    <input type="email" value="{{ old('email') }}" name="email" id="email"
                                        class="form-control @error('email')
                                        is-invalid
                                    @enderror">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No Telepon</label>
                                <div class="form-icon position-relative">
                                    <input type="text" value="{{ old('phone') }}" name="phone" id="phone"
                                        class="form-control @error('phone')
                                        is-invalid
                                    @enderror">
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Alamat</label>
                                <div class="form-icon position-relative">
                                    <textarea name="address" id="address"
                                        class="form-control @error('address')
                                        is-invalid
                                    @enderror">{{ old('address') }}</textarea>
                                    @error('address')
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
