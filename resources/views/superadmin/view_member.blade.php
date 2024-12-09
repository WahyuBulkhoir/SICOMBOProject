<!DOCTYPE html>
<html lang="en">
<head>
    @include('superadmin.css')
    <title>List of Members</title>
    <link rel="stylesheet" 
          href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">
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
        @include('superadmin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Daftar Anggota</h3>
                    </div>
                    <div class="card-body">
                    <table id="memberTable" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Jenis Kelamin</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($members as $member)
                                <tr>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->phone }}</td>
                                    <td>{{ $member->address }}</td>
                                    <td>{{ $member->jenis_kelamin }}</td>
                                    <td>
                                        <a href="{{ url('edit_member', $member->id) }}" class="btn btn-success btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('delete_member', $member->id) }}" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center">Tidak ada anggota saat ini.</td>
                                    <td class="text-center">.</td>
                                    <td class="text-center">.</td>
                                    <td class="text-center">.</td>
                                    <td class="text-center">.</td>
                                    <td class="text-center">.</td>
                                    <td class="text-center">.</td>
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
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#memberTable').DataTable({
                    "pageLength": 5,
                    "lengthMenu": [5, 10, 25, 50],
                    "ordering": true,
                    "columnDefs": [
                        { "orderable": false, "targets": [5, 6] }
                    ]
                });
            });
            function confirmation(event) {
                if (!confirm("Apakah Anda yakin ingin menghapus anggota ini?")) {
                    event.preventDefault();
                }
            }
        </script>
    </div>
</body>
</html>
