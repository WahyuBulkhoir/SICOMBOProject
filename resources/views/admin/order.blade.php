<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')
    <link rel="stylesheet" href="{{asset('/admincss/css/custom.css')}}">

    <style type="text/css">
        table {
            border: 2px solid skyblue;
            text-align: center;
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: skyblue;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: white;
        }

        td {
            color: white;
            padding: 10px;
            border: 1px solid skyblue;
        }

        .table_center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .btn {
            margin: 5px;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3>Semua Pesanan</h3>
                <br>

                <!-- Button to export orders to Excel -->
                <a href="{{ url('export_orders') }}" class="btn btn-success" style="margin-bottom: 20px;">Download Data jadi Excel</a>

                <div class="table_center">
                    <table>
                        <tr>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product Title</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Print PDF</th>
                        </tr>

                        @foreach($data as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->rec_address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product->title }}</td>
                            <td>{{ $order->product->price }}</td>
                            <td>
                                <img width="150" src="products/{{ $order->product->image }}">
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
                                <a class="btn btn-success" href="{{ url('delivered', $order->id) }}">Delivered</a>
                            </td>
                            <td>
                                <a class="btn btn-secondary" href="{{ url('print_pdf', $order->id) }}">Print PDF</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

                <!-- Display total number of orders -->
                <div style="color:white; font-size:18px; margin-top:10px;">
                    <strong>Total Semua Pesanan: </strong> {{ $data->count() }}
                </div>

            </div>  
        </div>
    </div>

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
