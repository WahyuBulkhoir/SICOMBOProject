<!DOCTYPE html>
<html>
<head>
    @include('home.css')
</head>
<body>
    <div class="hero_area">
        @include('home.header')
        <div class="container mt-5">
            <h2>Edit Profile</h2>
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
            <form action="{{ url('update_profile') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name" style="color: #333;">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="email" style="color: #333;">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="phone" style="color: #333;">No. Handphone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="address" style="color: #333;">Alamat</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}" required>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Update Profile</button>
            </form>
        </div>
    </div>
    @include('home.footer')
</body>
</html>
