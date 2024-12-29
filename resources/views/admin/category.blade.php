<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')
    <link rel="stylesheet" href="{{asset('/admincss/css/custom.css')}}">
    <style type="text/css">
        input[type='text'] {
            width: 400px;
            height: 50px;
            border: 1px solid skyblue;
            border-radius: 5px;
            padding: 10px;
        }
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
            flex-direction: column;
        }
        .table_deg {
            text-align: center;
            margin: auto;
            border: 2px solid greenyellow;
            margin-top: 50px;
            width: 600px;
            border-radius: 10px;
            overflow: hidden;
        }
        th {
            background-color: #7BD5F5;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: white;
            border: 2px solid greenyellow;
        }
        td {
            color: white;
            padding: 10px;
            border: 2px solid greenyellow;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            margin-left: 10px;
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
            <h1 style="color: white; font-size: 20px;">Tambah Kategori</h1>
        </div>
        <div class="div_deg">
            <form action="{{url('add_category')}}" method="post">
                @csrf
                <div>
                    <input type="text" name="category" required>
                    <input class="btn btn-primary" type="submit" value="Add Category">
                </div>
            </form>
        </div>
        <div>
            <table class="table_deg">
                <tr>
                    <th>Nama Kategori</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->category_name}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('edit_category',$data->id)}}">Edit</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category',$data->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div> 
        @include('admin.footer')
    </div>
    @include('admin.js')
</body>
</html>
