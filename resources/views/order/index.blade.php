@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Customer</label>
                            <div class="form-icon position-relative">
                                <select class="form-select form-control" aria-label="Default select example"
                                    name="customer_id" id="customer_id">
                                    <option selected value="">-- Select Customer --</option>
                                    @foreach ($customer as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Tambah Barang
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="mainTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button id="submitOrder" class="btn btn-primary btn-sm">Submit</button>
        </div>
        <!-- Modal Add Product -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableProduct" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produc</th>
                                        <th>Category</th>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
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
                    ajax: "{{ route('order.index') }}",
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

                $('#tableProduct tbody').on('click', '#addProductButton', function() {
                    var tr = $(this).closest('tr');
                    var rowData = table.row(tr).data();

                    // Cek apakah produk sudah ada di tabel utama
                    var existingRow = $('table#mainTable tbody tr').filter(function() {
                        return $(this).find('td:nth-child(2)').text() === rowData.name;
                    });

                    if (existingRow.length > 0) {
                        // Jika produk sudah ada, tambahkan quantity dan update total harga
                        var quantityInput = existingRow.find('.quantity');
                        var currentQuantity = parseInt(quantityInput.val());
                        var newQuantity = currentQuantity + 1;

                        if (newQuantity > rowData.stock) {
                            alert('Stock barang tidak cukup!');
                            return;
                        }

                        quantityInput.val(newQuantity);

                        var price = quantityInput.data('price');
                        var totalPrice = newQuantity * price;
                        existingRow.find('.total-price').text(formatRupiah(totalPrice));
                    } else {
                        // Jika produk belum ada, tambahkan baris baru
                        var mainTable = $('table#mainTable tbody');
                        var newRow = `<tr data-product-id="${rowData.id}">
                            <td>#</td>
                            <td>${rowData.name}</td>
                            <td>${formatRupiah(rowData.price)}</td>
                            <td><input type="number" name="qty[]" class="form-control quantity" value="1" min="1" max="${rowData.stock}" data-price="${rowData.price}" data-stock="${rowData.stock}"></td>
                            <td class="total-price">${formatRupiah(rowData.price)}</td>
                            <td><button type="button" class="btn btn-danger btn-sm remove-product">Hapus</button></td>
                        </tr>`;
                        mainTable.append(newRow);
                    }

                    // Optionally, close the modal after adding the product
                    $('#exampleModal').modal('hide');
                });

                // Update total price when quantity changes
                $('table#mainTable tbody').on('input', '.quantity', function() {
                    var quantity = $(this).val();
                    var stock = $(this).data('stock');
                    var price = $(this).data('price');

                    if (quantity > stock) {
                        alert('Stock barang tidak cukup!');
                        $(this).val(stock);
                        quantity = stock;
                    }

                    var totalPrice = quantity * price;
                    $(this).closest('tr').find('.total-price').text(formatRupiah(totalPrice));
                });

                // Remove a product from the main table
                $('table#mainTable tbody').on('click', '.remove-product', function() {
                    $(this).closest('tr').remove();
                });

                $('#submitOrder').on('click', function() {
                    var orderItems = [];
                    $('table#mainTable tbody tr').each(function() {
                        var productId = $(this).data('product-id');
                        var quantity = $(this).find('.quantity').val();
                        var unitPrice = $(this).find('td:nth-child(3)').text().replace(/[^0-9]/g, '');
                        var subtotal = $(this).find('.total-price').text().replace(/[^0-9]/g, '');

                        orderItems.push({
                            product_id: productId,
                            quantity: quantity,
                            unit_price: unitPrice,
                            subtotal: subtotal
                        });
                    });
                    var customerId = $('#customer_id').val();
                    var orderDate = new Date().toISOString().slice(0, 19).replace('T', ' ');

                    $.ajax({
                        url: '{{ route('order.store') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            customer_id: customerId,
                            order_date: orderDate,
                            order_items: orderItems
                        },
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(xhr) {
                            alert('An error occurred while saving the order.');
                        }
                    });
                });

                // Format Rupiah
                function formatRupiah(amount) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(amount);
                }
            });
        </script>
    </div>
@endsection
