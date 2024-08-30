@extends('app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">List Product</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-end">
                <a href="{{ route('product.create') }}" type="button" class="btn btn-info btn-sm">
                    Tambah Product
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tableProduct" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produc</th>
                                <th>Category</th>
                                <th>Deskripsi</th>
                                <th>Harga Barang</th>
                                <th>Stock</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('partials.jquery')
        <script>
            $(document).ready(function() {
                let table = new DataTable('#tableProduct', {
                    processing: true,
                    serverSide: true,
                    paging: true,
                    searching: true,
                    language: {
                        info: 'Showing page _PAGE_ of _PAGES_',
                        lengthMenu: "Show _MENU_ Page",
                    },
                    ajax: "{{ route('product.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false,
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'category',
                            name: 'category'
                        },
                        {
                            data: 'desc',
                            name: 'desc'
                        },
                        {
                            data: function(data, type, row) {
                                return formatRupiah(data.price);
                            },
                            name: 'price'
                        },
                        {
                            data: 'stock',
                            name: 'stock'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ],
                });

                $(document).on("click", "#buttonDelete", function(e) {
                    e.preventDefault();
                    var url = $(this).data('url');
                    var token = $('meta[name="csrf-token"]').attr('content');

                    if (confirm('Are you sure you want to delete this customer?')) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                "_token": token
                            },
                            success: function(response) {
                                table.ajax.reload();
                            },
                            error: function(err) {
                                console.error('Error:', err);
                            }
                        });
                    }
                });
            });
        </script>
    </div>
@endsection
