<!DOCTYPE html>
<html lang="en">
<head>
    @include('superadmin.css')
    <title>Produk dari seller</title>
    <link rel="stylesheet" 
          href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        tbody tr:nth-child(odd) {
            background-color: #333;
        }
        tbody tr:nth-child(even) {
            background-color: #444;
        }
        tbody tr:hover {
            background-color: #4CAF50;
            transition: background-color 0.3s;
        }
        tbody tr:hover td {
            color: white !important;
        }
        tbody td {
            color: white;
        }
        td img {
            max-height: 150px;
            width: auto;
            object-fit: contain;
        }
        td.tides {
            white-space: normal;
            word-wrap: break-word;
            max-width: 500px;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
            height: 40px;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .dataTables_filter input,
        .dataTables_length select {
            color: white;
            background-color: #333;
            border: 1px solid #555;
        }
        .dataTables_filter input::placeholder,
        .dataTables_length select option {
            color: white;
        }
        .dataTables_filter input:hover,
        .dataTables_length select:hover {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('superadmin.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>Produk dari Seller</h2><br>
                        <a href="{{ url('export_seller_product', $product_seller->id) }}" class="btn btn-success">Export data jadi Excel</a>
                    </div>
                    <div class="card-body">
                        <table id="productTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Seller ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->seller_id }}</td>
                                        <td class="tides">{{ $product->title }}</td>
                                        <td class="tides">{{ $product->description }}</td>
                                        <td>
                                            <img style="height: 80px; width: 80px;" src="{{ asset('products/' . $product->image) }}">
                                        </td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('superadmin.js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#productTable').DataTable({
                    "pageLength": 5,
                    "lengthMenu": [5, 10, 25, 50],
                    "ordering": true
                });
            });
        </script>
    </div>
</body>
</html>
