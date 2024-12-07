<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')
    <link rel="stylesheet" href="{{asset('/admincss/css/custom.css')}}">
    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            padding: 20px;
            align-items: center;
            margin-top: 60px;
            flex-direction: column;
        }
        .table_deg {
            border: 2px solid greenyellow;
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }
        td {
            border: 1px solid greenyellow;
            text-align: center;
            color: white;
            padding: 10px;
        }
        input[type='search'] {
            width: 400px;
            height: 40px;
            margin: 20px;
            padding: 10px;
            border: 1px solid skyblue;
            border-radius: 5px;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        tr:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
        <h1 style="color: white; font-size: 20px;">Semua Produk</h1>
        </div>
        <form action="{{url('product_search')}}" method="get" style="text-align: center; margin-bottom: 20px;">
            <input type="search" name="search" placeholder="Cari produk berdasarkan nama atau kategori..." required>
            <input type="submit" class="btn btn-secondary" value="Search">
        </form>
        <div class="div_deg">
            <table class="table_deg">
                <tr>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @forelse($product as $products)
                <tr>
                    <td>{{$products->title}}</td>
                    <td>{!!Str::limit($products->description, 50)!!}</td>
                    <td>{{$products->category}}</td>
                    <td>{{$products->price}}</td>
                    <td>{{$products->quantity}}</td>
                    <td>
                        <img height="120" width="120" src="products/{{$products->image}}" alt="{{$products->title}}">
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{url('update_product', $products->slug)}}">Edit</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product', $products->id)}}">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center" style="color:white; background-color:rgba(255, 255, 255, 0.1); padding:20px; font-size:18px;">
                        Tidak ada produk yang ditambahkan.
                    </td>
                </tr>
                @endforelse
            </table>               
        </div>
        <div class="div_deg">
            {{$product->onEachSide(1)->links()}}
        </div>
    </div>
    @include('admin.footer')
    @include('admin.js')
</body>
</html>
