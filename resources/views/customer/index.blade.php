@extends('app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">List Customer</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-end">
                <a href="{{ route('customer.create') }}" type="button" class="btn btn-info btn-sm">
                    Tambah Customer
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tableCustomer" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Start Modal Form  --}}

        

        {{-- End Modal Form  --}}

        @include('partials.jquery')
        <script>
            $(document).ready(function() {
                let table = new DataTable('#tableCustomer', {
                    processing: true,
                    serverSide: true,
                    paging: true,
                    searching: true,
                    language: {
                        info: 'Showing page _PAGE_ of _PAGES_',
                        lengthMenu: "Show _MENU_ Page",
                    },
                    ajax: "{{ route('customer.index') }}",
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
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'address',
                            name: 'address'
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
