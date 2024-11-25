<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <div class="hero_area">
        @include('home.header')

        <!-- Konten edit profil -->
        <div class="container mt-5">
            <h2>Edit Profile</h2>
            <form action="{{ url('update_profile') }}" method="POST">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="form-group mt-3">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" required>
                </div>

                <div class="form-group mt-3">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}" required>
                </div>

                <div class="form-group mt-3">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                    @if ($user->profile_picture)
                        <img src="{{ asset('public/storage/profile_pictures' . $user->profile_picture) }}" alt="Profile" class="mt-2" style="width: 100px; height: 100px; border-radius: 50%;">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary mt-4">Update Profile</button>
            </form>
        </div>
        <!-- End konten edit profil -->
    </div>

    @include('home.footer')
</body>

</html>
