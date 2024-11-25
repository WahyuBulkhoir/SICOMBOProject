<!DOCTYPE html>
<html lang="en">
<head>
    @include('superadmin.css')

    <style>
        .table-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 2px solid #0a58ca;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #0a58ca;
            color: white;
        }

        tr:hover {
            background-color: rgba(10, 88, 202, 0.1);
        }
    </style>
</head>
<body>
    @include('superadmin.sidebar')
    @include('superadmin.header')

    <div class="table-container">
        <h2 style="text-align: center;">Event List</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ Str::limit($event->description, 50) }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <a href="{{ url('edit_events', $event->id) }}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('superadmin.js')
</body>
</html>
