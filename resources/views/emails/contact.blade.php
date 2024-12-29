<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Pesan</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .email-body {
            padding: 20px;
            font-size: 16px;
            color: #333;
        }
        .email-body h3 {
            color: #007bff;
        }
        .email-body p {
            margin: 10px 0;
            line-height: 1.6;
        }
        .email-body strong {
            color: #333;
        }
        .email-footer {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            color: #777;
            border-radius: 0 0 8px 8px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            .email-container {
                width: 100%;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Pesan dari Pengguna</h2>
        </div>
        <div class="email-body">
            <h3>Informasi Pengirim</h3>
            <p><strong>Nama:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> <a href="mailto:{{ $email }}">{{ $email }}</a></p>
            <p><strong>Telepon:</strong> {{ $phone }}</p>
            <h3>Pesan</h3>
            <p><strong>Isi Pesan:</strong> </p>
            <p>{{ $description }}</p>
        </div>
        <div class="email-footer">
            <p>Terima kasih telah menghubungi kami. Kami akan merespon pesan Anda secepatnya.</p>
            <p>&copy; {{ date('Y') }} SICOMBO Mail. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
