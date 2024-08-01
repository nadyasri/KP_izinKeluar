<!DOCTYPE html>
<html>
<head>
    <title>Surat Izin Keluar Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-top: 20px;
        }
        .content p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Surat Izin Keluar Pegawai</h2>
        </div>
        <div class="content">
            <p><strong>Nama:</strong> {{ $name }}</p>
            <p><strong>NIP:</strong> {{ $nip }}</p>
            <p><strong>Pangkat/Gol/Ruang:</strong> {{ $pangkat }}</p>
            <p><strong>Tanggal:</strong> {{ $tanggal }}</p>
            <p><strong>Waktu Keluar:</strong> {{ $waktu_keluar }}</p>
            <p><strong>Waktu Kembali:</strong> {{ $waktu_kembali }}</p>
            <p><strong>Keperluan:</strong> {{ $keperluan }}</p>
        </div>
    </div>
</body>
</html>
