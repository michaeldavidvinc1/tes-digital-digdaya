@extends('app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">List Transaksi</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tableProduct" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Order Date</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="order-info">
                            <p><strong>Customer Name:</strong> <span id="customerName"></span></p>
                            <p><strong>Order Date:</strong> <span id="orderDate"></span></p>
                            <p><strong>Total Amount:</strong> <span id="totalAmount"></span></p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="modalOrderItems">
                                    <!-- Order items will be inserted here -->
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
                    ajax: "{{ route('transaksi.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false,
                        },
                        {
                            data: function(data, type, row) {
                                let customer = data.customer_id ? data.customer_id : 'N/A';
                                return customer;
                            },
                            name: 'customer_id'
                        },
                        {
                            data: 'order_date',
                            name: 'order_date'
                        },
                        {
                            data: 'total_amount',
                            name: 'total_amount'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ],
                });

                $('#tableProduct').on('click', '.edit', function() {
                    let orderId = $(this).data('id');

                    $.ajax({
                        url: `/transaksi/${orderId}`,
                        method: 'GET',
                        success: function(response) {
                            if (response.success) {
                                let order = response.data;
                                let itemsHtml = '';

                                console.log(response.data); // Debugging response

                                // Build order items table HTML
                                if (order.items.length > 0) {
                                    order.items.forEach(item => {
                                        itemsHtml += `
                            <tr>
                                <td>${item.product_name || 'N/A'}</td>
                                <td>${item.category || 'N/A'}</td>
                                <td>${item.unit_price || '0'}</td>
                                <td>${item.quantity || '0'}</td>
                                <td>${item.subtotal || '0'}</td>
                            </tr>
                        `;
                                    });
                                } else {
                                    itemsHtml = '<tr><td colspan="5">No items found</td></tr>';
                                }

                                // Set order details in the modal
                                $('#customerName').text(order.customer_name || 'N/A');
                                $('#orderDate').text(order.order_date || 'N/A');
                                $('#totalAmount').text(order.total_amount || 'N/A');
                                $('#modalOrderItems').html(itemsHtml);

                                // Show the modal
                                $('#exampleModal').modal('show');
                            } else {
                                alert('Order not found');
                            }
                        },
                        error: function() {
                            alert('An error occurred while fetching the order details');
                        }
                    });
                });
            });
        </script>
    </div>
@endsection
