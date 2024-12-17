<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('superadmin.css')
    <style>
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            width: 100%;
            background-color: white;
            color: black;
            border: 2px solid #0a58ca;
            border-radius: 8px;
            padding: 10px;
            transition: box-shadow 0.3s, border-color 0.3s;
        }
        .form-control:focus {
            background-color: white;
            border-color: #084298;
            box-shadow: 0 0 8px rgba(10, 88, 202, 0.3);
            outline: none;
        }
        .form-control::placeholder {
            color: #aaa;
        }
        .btn-primary {
            background-color: #0a58ca;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #084298;
        }
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('superadmin.sidebar')
        @include('superadmin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="form-container">
                    <h2 style="text-align: center; margin-bottom: 20px;">Edit Event</h2><br><br>
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
                        <form action="{{ url('update_event', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label style="color: white;">Nama Event</label>
                                <input type="text" name="title" class="form-control" value="{{ $data->title }}" required>
                            </div>
                            <div class="form-group">
                                <label style="color: white;">Deskripsi</label>
                                <textarea name="description" class="form-control" required>{{ $data->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label style="color: white;">Tanggal</label>
                                <input type="date" name="date" class="form-control" value="{{ $data->date }}" required>
                            </div>
                            <div class="form-group">
                                <label style="color: white;">Lokasi</label>
                                <input type="text" name="location" class="form-control" value="{{ $data->location }}" required>
                            </div>
                            <div class="button-container">
                                <button type="submit" class="btn btn-success mt-3">Update Event</button>
                            </div>
                        </form>
                    </div>
                </div>
                @include('superadmin.footer') 
            </div>
            @include('superadmin.js')
        </div>
    </div>
</body>
</html>