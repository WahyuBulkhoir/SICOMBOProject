<!DOCTYPE html>
<html lang="en">
<head>
    @include('superadmin.css')
    <title>List of Meetings</title>

    <link rel="stylesheet" 
          href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <style>

        tbody tr:nth-child(odd) {
            background-color: #333;
        }

        tbody tr:nth-child(even) {
            background-color: #444;
        }

        tbody tr:hover {
            background-color: #4CAF50;
            transition: background-color 0.3s;
        }

        tbody tr:hover td {
            color: white !important;
        }

        tbody td {
            color: white;
        }

        td.tides {
            white-space: normal;
            word-wrap: break-word;
            max-width: 500px;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .dataTables_filter input,
        .dataTables_length select {
            color: white;
            background-color: #333;
            border: 1px solid #555;
        }

        .dataTables_filter input::placeholder,
        .dataTables_length select option {
            color: white;
        }

        .dataTables_filter input:hover,
        .dataTables_length select:hover {
            background-color: #333;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('superadmin.sidebar')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Daftar Pertemuan</h3>
                    </div>
                    <div class="card-body">
                        <table id="meetingTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($meetings as $meeting)
                                    <tr>
                                        <td class="tides">{{ $meeting->title }}</td>
                                        <td class="tides">{{ $meeting->description }}</td>
                                        <td>{{ \Carbon\Carbon::parse($meeting->date)->format('d M Y') }}</td>
                                        <td>{{ $meeting->location }}</td>
                                        <td>{{ \Carbon\Carbon::parse($meeting->start_time)->format('H:i') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($meeting->end_time)->format('H:i') }}</td>
                                        <td>
                                            <a href="{{ url('edit_meeting', $meeting->id) }}" 
                                               class="btn btn-success btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('delete_meeting', $meeting->id) }}" 
                                               onclick="confirmation(event)" 
                                               class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No meetings available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('superadmin.js')

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#meetingTable').DataTable({
                    "pageLength": 5,
                    "lengthMenu": [5, 10, 25, 50],
                    "ordering": true,
                    "columnDefs": [
                        { "orderable": false, "targets": [6, 7] }
                    ]
                });
            });

            function confirmation(event) {
                if (!confirm("Are you sure you want to delete this meeting?")) {
                    event.preventDefault();
                }
            }
        </script>
    </div>
</body>
</html>
