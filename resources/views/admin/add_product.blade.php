<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')
    <link rel="stylesheet" href="{{asset('/admincss/css/custom.css')}}">
    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }
        h1 {
            color: white;
            text-align: center;
        }
        label {
            display: inline-block;
            width: 250px;
            font-size: 18px !important;
            color: white !important;
        }
        input[type='text'], input[type='number'], select, textarea {
            width: 350px;
            height: 50px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }
        textarea {
            height: 80px;
        }
        .input_deg {
            padding: 15px;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        input[type='text']:focus, input[type='number']:focus, select:focus, textarea:focus {
            border-color: skyblue;
            outline: none;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <h1 style="color: white; font-size: 20px; text-align: left;">Tambah Produk</h1>
        </div>
        <div class="div_deg">
            <form action="{{url('upload_product')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="input_deg">
                    <label>Nama Produk</label>
                    <input type="text" name="title" required>
                </div>
                <div class="input_deg">
                    <label>Deskripsi</label>
                    <textarea name="description" required></textarea>
                </div>
                <div class="input_deg">
                    <label>Harga</label>
                    <input type="text" name="price" required>
                </div>
                <div class="input_deg">
                    <label>Stok</label>
                    <input type="number" name="qty" required>
                </div>
                <div class="input_deg">
                    <label>Kategori Produk</label>
                    <select name="category" required>
                        <option>Pilih Opsi</option>
                        @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input_deg">
                    <label>Gambar Produk</label>
                    <input style="color: white;" type="file" name="image" required>
                    @error('image')
                        <div style="color: red; margin-top: 5px;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input_deg">
                    <input class="btn btn-success" type="submit" value="Add Product">
                </div>
            </form>
        </div>
    </div>
    @include('admin.footer')
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
</body>
</html>
