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
        label {
            display: inline-block;
            width: 200px;
            padding: 10px;
            color: white;
        }
        input[type='text'],
        input[type='number'] {
            width: 300px;
            height: 60px;
            border: 1px solid skyblue;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
        textarea {
            width: 450px;
            height: 100px;
            border: 1px solid skyblue;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
        select {
            width: 300px;
            height: 60px;
            border: 1px solid skyblue;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
        }
        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <h2 style="color: white; font-size: 20px;">Edit Profile</h2>
        </div>
        <div class="div_deg">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ url('update_profile_seller') }}" method="POST">
                @csrf
                <div>
                    <label style="color: white;">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{$seller->name}}" required>
                </div>
                <div class="form-group">
                    <label style="color: white;">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $seller->email }}" required>
                </div>
                <div>
                    <label style="color: white;">No. HP</label>
                    <input type="text" name="phone" class="form-control" value="{{$seller->phone}}" required>
                </div>
                <div>
                    <label style="color: white;">Alamat</label>
                    <input type="text" name="address" class="form-control" value="{{$seller->address}}" required>
                </div>
                <div>
                    <input class="btn btn-success" type="submit" value="Update Profile">
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
