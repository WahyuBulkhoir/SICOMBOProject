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
            flex-direction: column;
        }
        input[type='text'] {
            width: 400px;
            height: 50px;
            border: 1px solid skyblue;
            border-radius: 5px;
            padding: 10px;
        }
        h1 {
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <h1 style="color: white; font-size: 20px;">Perbarui Kategori</h1>
        </div>
        <div class="div_deg">            
            <form action="{{url('update_category',$data->id)}}" method="post">
                @csrf
                <input type="text" name="category" value="{{$data->category_name}}" required>
                <input class="btn btn-primary" type="submit" value="Update Category">
            </form>
        </div> 
        @include('admin.footer')
    </div>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
</body>
</html>
