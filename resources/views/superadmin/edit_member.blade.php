<!DOCTYPE html>
<html lang="en">
<head>
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
        .btn-success {
            background-color: #28a745;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s;
            width: 100%;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        h2 {
            color: white;
            text-align: center;
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
                    <h2>Edit Anggota</h2>
                    <div class="div_deg">
                        <form action="{{ url('update_member', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label style="color: white;">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>
                            </div>
                            <div class="form-group">
                                <label style="color: white;">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $data->email }}" required>
                            </div>
                            <div class="form-group">
                                <label style="color: white;">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $data->phone }}" required>
                            </div>
                            <div class="form-group">
                                <label style="color: white;">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $data->address }}" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="button-container">
                                <button type="submit" class="btn btn-success">Update Member</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('superadmin.js')
        </div>
    </div>
</body>
</html>
