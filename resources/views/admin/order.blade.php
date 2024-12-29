<!DOCTYPE html>
<html>
<head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.css')
    <link rel="stylesheet" href="{{asset('/admincss/css/custom.css')}}">
    <style type="text/css">
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        .table_deg {
            border: 2px solid greenyellow;
            width: 100%;
            border-collapse: collapse;
        }
        .div_deg {
            display: flex;
            justify-content: center;
            padding: 20px;
            align-items: center;
            color: white;
            flex-direction: column;
        }
        td {
            border: 2px solid greenyellow;
            text-align: center;
            padding: 5px;
            word-wrap: break-word;
            max-width: 300px;
        }
        th {
            background-color: #7BD5F5;
            text-align: center;
            color:rgb(255, 255, 255);
            font-weight: bold;
            border: 2px solid greenyellow;
            word-wrap: break-word;
            max-width: 300px;
        }
        tr:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .btn {
            margin: 5px;
        }
        .filter-container {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: -60px;
            margin-bottom: 20px;
            gap: 20px;
        }
        .filter-section {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .filter-section label {
            margin-right: 10px;
            font-weight: bold;
            color: white;
        }
        .filter-section select, .filter-section input {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 250px;
        }
        .filter-section button {
            background-color: skyblue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .filter-section button:hover {
            background-color: #007bff;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <h3>Semua Pesanan</h3>
        </div>
        <br>
        <div class="filter-container">
            <a href="{{ url('export_orders') }}" class="btn btn-success">Download Data jadi Excel</a>
            <div class="filter-section">
                <form method="GET" action="{{ url('view_orders') }}">
                    <div>
                        <label for="payment_status">Status Pembayaran:</label>
                        <select name="payment_status" id="payment_status">
                            <option value="">-- Pilih Status Pembayaran --</option>
                            <option value="paid" {{ request('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="cash on delivery" {{ request('payment_status') == 'cash on delivery' ? 'selected' : '' }}>COD</option>
                        </select>
                    </div>                           
                    <div>
                        <label for="status">Status Orderan:</label>
                        <select name="status" id="status">
                            <option value="">-- Pilih Status Orderan --</option>
                            <option value="in progress" {{ request('status') == 'in progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="On the way" {{ request('status') == 'On the way' ? 'selected' : '' }}>On the way</option>
                            <option value="Delivered" {{ request('status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>
        <div class="div_deg">
            <div class="table-responsive">
                <table class="table_deg">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Nama Pembeli</th>
                            <th style="text-align: center;">Alamat</th>
                            <th>No. HP</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Status Pembayaran</th>
                            <th>Status Orderan</th>
                            <th>Ganti Status Orderan</th>
                            <th>Tanggal Orderan</th>
                            <th>Print PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $order)
                        <tr>
                            <td style="text-align: left;">{{ $order->name }}</td>
                            <td style="text-align: left;">{{ $order->rec_address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product->title }}</td>
                            <td>Rp {{ number_format($order->product->price, 0, ',', '.') }}</td>
                            <td>
                                <img height="auto" width="120" src="products/{{ $order->product->image }}">
                            </td>
                            <td>{{ $order->payment_status }}</td>
                            <td>
                                @if($order->status == 'in progress')
                                    <span style="color:red">{{ $order->status }}</span>
                                @elseif($order->status == 'On the way')
                                    <span style="color:skyblue;">{{ $order->status }}</span>
                                @else
                                    <span style="color:yellow;">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('on_the_way', $order->id) }}">On The Way</a>
                                <a class="btn btn-warning" href="{{ url('delivered', $order->id) }}">Delivered</a>
                            </td>
                            <td>{{$order->created_at}}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{ url('print_pdf', $order->id) }}">Print PDF</a>
                            </td>
                        </tr>
                            @empty
                        <tr>
                            <td colspan="11" class="text-center" style="color:white; background-color:rgba(255,255,255,0.1); padding:20px; font-size:18px;">
                                Belum ada produk yang diorder.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div style="color:white; font-size:18px; margin-top:10px; padding: 20px;">
            <strong>Total Semua Pesanan: </strong> {{ $data->count() }}
        </div> 
    </div>
    @include('admin.footer')
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>
</html>