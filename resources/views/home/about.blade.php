<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .event_section {
            background-color: #e9ecef;
            border-radius: 8px;
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .event_section h3 {
            margin-bottom: 15px;
            text-align: center;
        }

        .event_section ul {
            list-style: none;
            padding: 0;
        }

        .event_section li {
            border: 1px solid #0a58ca;
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .event_section li:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .event_section li strong {
            font-size: 18px;
            color: #000;
        }

        .event_section li p {
            color: #333;
            margin: 5px 0;
        }

        .btn-primary {
            background-color: #0a58ca;
            border: none;
            color: white;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #084298;
        }

        .registration_section {
            margin-top: 40px;
            padding: 20px;
            background-color: #e9ecef;
            border-radius: 8px;
        }

        .registration_section h3 {
            text-align: center;
            margin-bottom: 15px;
        }

        .registration_section .form-control {
            border: 1px solid #0a58ca;
        }

        .registration_section button {
            width: 100%;
            background-color: #0a58ca;
            color: white;
        }

        .registration_section button:hover {
            background-color: #084298;
        }

        .registration_section .form-label 
        {
            color: black;
        }

    </style>
</head>


<body>
    <div class="hero_area">
        @include('home.header')
    </div>

    <section class="about_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                   PIK-R Bukit Gado-Gado
                </h2>
            </div><br><br>
            <p>
                PIK-R Bukit Gado-Gado adalah sebuah organisasi yang berkomitmen untuk mempromosikan pengembangan dan pemberdayaan kaum muda melalui berbagai program dan acara. Fokus kami adalah menyediakan sumber daya, bimbingan, dan peluang bagi kaum muda untuk bisa mengembangkan potensi yang ada dalam dirinya.
            </p>

            <div class="event_section">
                <h3>Pertemuan Mendatang</h3>
                <ul>
                    @forelse($meetings as $meeting)
                        <li>
                            <strong>{{ $meeting->title }}</strong><br>
                            <p>Tanggal: {{ \Carbon\Carbon::parse($meeting->date)->format('d M Y') }}</p>
                            <p>Waktu: {{ \Carbon\Carbon::parse($meeting->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($meeting->end_time)->format('H:i') }} WIB</p>
                            <p>Lokasi: {{ $meeting->location }}</p>
                            <p>Deskripsi: {{ $meeting->description }}</p>
                        </li>
                    @empty
                        <li>Tidak ada pertemuan saat ini.</li>
                    @endforelse
                </ul>
            </div>

            <div class="event_section">
                <h3>Event Mendatang</h3>
                <ul>
                    @forelse($events as $event)
                        <li>
                            <strong>{{ $event->title }}</strong><br>
                            <p>Tanggal: {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>
                            <p>Lokasi: {{ $event->location }}</p>
                            <p>Deskripsi: {{ $event->description }}</p>
                        </li>
                    @empty
                        <li>Tidak ada event saat ini.</li>
                    @endforelse
                </ul>
            </div>

            <div class="registration_section">
                <h3>Ingin menjadi anggota PIK-R ?</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('register_candidate_pikr_member') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No. Handphone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cv" class="form-label">Unggah CV (opsional)</label>
                        <input type="file" class="form-control" id="cv" name="cv" accept=".pdf, .doc, .docx">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </section>

</body>

</html>
