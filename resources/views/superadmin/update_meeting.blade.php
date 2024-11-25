<!DOCTYPE html>
<html lang="en">
<head>
    @include('superadmin.css')

    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            background-color: transparent;
            color: black;
            border: 2px solid #0a58ca;
            border-radius: 8px;
            padding: 10px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            border-color: #084298;
            box-shadow: 0 0 10px rgba(8, 66, 152, 0.5);
            outline: none;
        }

        .btn-primary {
            background-color: #0a58ca;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s;
            display: block;
            margin: 20px auto;
        }

        .btn-primary:hover {
            background-color: #084298;
        }
    </style>
</head>
<body>
    @include('superadmin.sidebar')
    @include('superadmin.header')

    <div class="form-container">
        <h2 style="text-align: center;">Update Meeting</h2>
        <form action="{{ url('update_meeting', $data->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- This is important for PUT requests -->
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $data->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required>{{ $data->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" value="{{ $data->date }}" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" value="{{ $data->location }}" required>
            </div>

            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="time" name="start_time" class="form-control" value="{{ \Carbon\Carbon::parse($data->start_time)->format('H:i') }}" required>
            </div>

            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="time" name="end_time" class="form-control" value="{{ \Carbon\Carbon::parse($data->end_time)->format('H:i') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Meeting</button>
        </form>
    </div>

    @include('superadmin.js')
</body>
</html>
