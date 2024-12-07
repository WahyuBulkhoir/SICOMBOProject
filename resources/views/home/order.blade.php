<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order History</title>
    @include('home.css')
    <style>
        .order-container {
            margin-top: 60px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            max-width: 900px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th,
        td {
            border: 1px solid skyblue;
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #343a40;
            color: white;
            font-size: 18px;
        }
        td img {
            width: 120px;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }
        .empty-order-message {
            font-size: 22px;
            font-weight: bold;
            color: #333;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')
    </div>
    <div class="order-container">
        @if($order->isEmpty())
            <div class="empty-order-message">Kamu belum order apapun.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Delivered Status</th>
						<th>Payment Method</th>
                        <th>Image</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $orderItem)
                        <tr>
                            <td style="color: #333;"><b>{{ $orderItem->product->title }}</b></td>
                            <td style="color: #333;"><b>Rp. {{ number_format($orderItem->product->price, 0, ',', '.') }}</b></td>
                            <td style="color: #333;"><b>{{ $orderItem->status }}</b></td>
							<td style="color: #333;"><b>{{$orderItem->payment_status}}</b></td>
                            <td>
                                <img src="products/{{ $orderItem->product->image }}" alt="{{ $orderItem->product->title }}">
                            </td>                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div><br><br>
    @include('home.footer')
</body>
</html>
