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
                    <h2 style="text-align: center; margin-bottom: 20px;">Tambah Anggota</h2><br><br>
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
                    <form action="{{ url('add_member') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Anggota</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter member name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter member email" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status Anggota</label>
                            <input type="text" name="status" class="form-control" placeholder="Enter member status" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">No. HP</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter member phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter member address" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="button-container">
                            <button type="submit" class="btn btn-success mt-3">Add Member</button>
                        </div>
                    </form>
                </div>
            </div>
            @include('superadmin.footer')
        </div>
        @include('superadmin.js')
    </div>
</body>
</html>
