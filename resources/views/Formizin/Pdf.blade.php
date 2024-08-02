<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Izin Keluar Kantor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section p {
            margin: 5px 0;
        }
        .section span {
            display: inline-block;
            width: 200px;
        }
        .underline {
            text-decoration: underline;
        }
        .signature {
            text-align: right;
            margin-top: 50px;
        }
        .signature span {
            display: inline-block;
            margin-top: 70px;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>SURAT IZIN KELUAR KANTOR</h2>
    </div>

    <div class="section">
        <p>Yang bertanda tangan di bawah ini :</p>
        <p><span>Nama</span>: {{ $atasan['nama'] }}</p>
        <p><span>NIP</span>: {{ $atasan['nip'] }}</p>
        <p><span>Pangkat/Gol/Ruang</span>: {{ $atasan['pangkat'] }}</p>
        <p><span>Jabatan</span>: {{ $atasan['jabatan'] }}</p>
        <p><span>Unit Kerja</span>: {{ $atasan['unit_kerja'] }}</p>
    </div>

    <div class="section">
        <p>Memberikan izin keluar kantor kepada :</p>
        <p><span>Nama</span>: {{ $pegawai['nama'] }}</p>
        <p><span>NIP</span>: {{ $pegawai['nip'] }}</p>
        <p><span>Pangkat/Gol/Ruang</span>: {{ $pegawai['pangkat'] }}</p>
        <p><span>Jabatan</span>: {{ $pegawai['jabatan'] }}</p>
        <p><span>Untuk Keperluan</span>: {{ $pegawai['keperluan'] }}</p>
    </div>

    <div class="signature">
        <p>Ciamis, {{ date('d-m-Y') }}</p>
        <p>Pejabat Yang Memberikan Izin</p>
        <span>NIP.</span>
    </div>
</body>
</html>
