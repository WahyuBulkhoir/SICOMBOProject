<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <link rel="stylesheet" href="{{asset('/admincss/css/custom.css')}}">

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
            flex-direction: column; /* Mengatur arah flex untuk vertikal */
        }

        label {
            display: inline-block;
            width: 200px;
            padding: 10px; /* Mengurangi padding untuk tampilan yang lebih rapi */
            color: white; /* Mengubah warna label menjadi putih */
        }

        input[type='text'],
        input[type='number'] {
            width: 300px;
            height: 60px;
            border: 1px solid skyblue; /* Menambahkan border */
            border-radius: 5px; /* Menambahkan sudut membulat */
            padding: 10px; /* Menambahkan padding */
            margin-bottom: 20px; /* Menambahkan jarak bawah */
        }

        textarea {
            width: 450px;
            height: 100px;
            border: 1px solid skyblue; /* Menambahkan border */
            border-radius: 5px; /* Menambahkan sudut membulat */
            padding: 10px; /* Menambahkan padding */
            margin-bottom: 20px; /* Menambahkan jarak bawah */
        }

        select {
            width: 300px;
            height: 60px;
            border: 1px solid skyblue; /* Menambahkan border */
            border-radius: 5px; /* Menambahkan sudut membulat */
            padding: 10px; /* Menambahkan padding */
            margin-bottom: 20px; /* Menambahkan jarak bawah */
        }

        .btn-success {
            background-color: #28a745; /* Warna hijau untuk tombol */
            border: none; /* Menghilangkan border */
            padding: 10px 20px; /* Menambahkan padding */
            color: white; /* Mengubah warna teks menjadi putih */
            border-radius: 5px; /* Menambahkan sudut membulat */
        }

        .btn-success:hover {
            background-color: #218838; /* Warna saat hover */
        }

    </style>

</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
      
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h2 style="color: white;">Update Product</h2>

                <div class="div_deg">
                    <form action="{{url('edit_product', $data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label style="color: white;">Title</label>
                            <input type="text" name="title" value="{{$data->title}}" required>
                        </div>

                        <div>
                            <label style="color: white;">Description</label>
                            <textarea name="description" required>{{$data->description}}</textarea>
                        </div>

                        <div>
                            <label style="color: white;">Price</label>
                            <input type="text" name="price" value="{{$data->price}}" required>
                        </div>

                        <div>
                            <label style="color: white;">Quantity</label>
                            <input type="number" name="quantity" value="{{$data->quantity}}" required>
                        </div>

                        <div>
                            <label style="color: white;">Category</label>
                            <select name="category" required>
                                <option value="{{$data->category}}">{{$data->category}}</option>
                                @foreach($category as $category)
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>            		
                        </div>

                        <div>
                            <label style="color: white;">Current Image</label>
                            <img width="150" src="/products/{{$data->image}}" alt="Current Image">
                        </div>

                        <div>
                            <label style="color: white;">New Image</label>
                            <input type="file" name="image">
                        </div>

                        <div>
                            <input class="btn btn-success" type="submit" value="Update Product">
                        </div>
                    </form>
                </div>

            </div>  
        </div>
    </div>
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
