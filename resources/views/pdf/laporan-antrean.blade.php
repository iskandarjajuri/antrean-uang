<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Antrean Penukaran Uang</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #f0f0f0;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px 10px;
            text-align: left;
        }

        .footer {
            margin-top: 40px;
            font-size: 10px;
            text-align: right;
        }
    </style>
</head>
<body>
    <h2>Laporan Antrean Penukaran Uang</h2>
    <p><strong>Tanggal Penukaran:</strong> {{ $tanggal }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Nomor Antrean</th>
                <th>Waktu Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($antrean as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->pegawai->nip }}</td>
                <td>{{ $data->pegawai->nama_lengkap }}</td>
                <td>{{ $data->nomor_antrean }}</td>
                <td>{{ \Carbon\Carbon::parse($data->tanggal_daftar)->format('H:i d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}
    </div>
</body>
</html>