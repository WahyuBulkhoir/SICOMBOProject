<!DOCTYPE html>
<html lang="en">
<head>
    @include('superadmin.css')
    <title>Candidate Members</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .btn-cv {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        .text-muted {
            color: #ccc !important;
            font-style: italic;
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
        <div class="row p-0 m-0 proBanner" id="proBanner"></div>
        @include('superadmin.sidebar')
        @include('superadmin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Daftar Calon Anggota</h3>
                    </div>
                    <div class="card-body">
                        <table id="candidateTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Calon Anggota</th>
                                    <th>Email</th>
                                    <th>No. HP</th>
                                    <th>Jenis Kelamin</th>
                                    <th>CV</th>
                                    <th>Dibuat Pada</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($candidates as $candidate)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $candidate->name }}</td>
                                    <td>{{ $candidate->email }}</td>
                                    <td>{{ $candidate->phone }}</td>
                                    <td>{{ $candidate->jenis_kelamin }}</td>
                                    <td class="text-center">
                                        @if ($candidate->cv)
                                            <a href="{{ asset('storage/' . $candidate->cv) }}" 
                                               class="btn btn-cv btn-sm" target="_blank">View CV</a>
                                        @else
                                            <span class="text-muted">No CV</span>
                                        @endif
                                    </td>
                                    <td>{{ $candidate->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ url('delete_candidate', $candidate->id) }}" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus calon anggota ini?')">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center">Tidak ada calon anggota saat ini.</td>
                                    <td class="text-center">.</td>
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
                $('#candidateTable').DataTable({
                    "pageLength": 5,
                    "lengthMenu": [5, 10, 25, 50],
                    "ordering": true,
                    "columnDefs": [
                        { "orderable": false, "targets": [5, 7] }
                    ]
                });
            });
            function confirmation(event) {
                if (!confirm('Apakah Anda yakin ingin menghapus calon anggota ini?')) {
                    event.preventDefault();
                }
            }
        </script>
    </div>
</body>
</html>
