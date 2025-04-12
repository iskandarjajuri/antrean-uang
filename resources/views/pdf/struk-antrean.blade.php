<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Antrean</title>
    <style>
        @page { size: 80mm auto; margin: 0; }
        body {
            width: 80mm;
            font-family: monospace;
            font-size: 12px;
            padding: 10px;
        }
        .text-center { text-align: center; }
        .mt-2 { margin-top: 8px; }
        .mt-4 { margin-top: 16px; }
        .bold { font-weight: bold; }
        .border { border-top: 1px dashed #000; margin: 8px 0; }
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        td, th { padding: 2px 4px; }
        .right { text-align: right; }
    </style>
</head>
<body>
    <div class="text-center bold">BANK INDONESIA</div>
    <div class="text-center">Bank Sentral Republik Indonesia</div>

    <div class="text-center mt-2">
        <div>KPBI</div>
        <div>Layanan Non-Bank (Pegawai)</div>
        <div>Penukaran Uang Pecahan Kecil</div>
    </div>

    <div class="text-center mt-4">
        <div>NO. ANTRIAN:</div>
        <div class="bold" style="font-size: 20px;">{{ $nomor ?? 'G-005' }}</div>
        <div class="mt-2">Sisa antrian: {{ $sisa ?? 4 }} nomor</div>
    </div>

    <div class="mt-4">
        <table>
            <tr>
                <td><strong>Nama</strong></td>
                <td>: {{ $nama ?? 'Gunawan Saichu' }}</td>
            </tr>
            <tr>
                <td><strong>SATKER</strong></td>
                <td>: {{ $satker ?? 'DPT. DEPARTEMEN JASA PERBANKAN PERIZINAN & OPERASIONAL TRESURI' }}</td>
            </tr>
        </table>
    </div>

    <div class="border"></div>

    <table>
        <thead>
            <tr>
                <th>Pecahan</th>
                <th class="right">Masuk</th>
                <th class="right">Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPecahan as $pecahan)
            <tr>
                <td>Rp {{ number_format($pecahan['nominal'], 0, ',', '.') }}</td>
                <td class="right">Rp {{ number_format($pecahan['masuk'], 0, ',', '.') }}</td>
                <td class="right">Rp {{ number_format($pecahan['keluar'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr class="bold">
                <td>Total</td>
                <td class="right">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</td>
                <td class="right">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="text-center mt-4">
        <div>{{ now()->format('H:i:s') }}</div>
        <div>{{ now()->isoFormat('dddd, D MMMM Y') }}</div>
    </div>

    <div class="text-center mt-2" style="font-size: 11px;">
        * Pembatalan antrean agar melapor kepada petugas<br>
        * Klaim hanya dapat dilakukan sebelum meninggalkan loket
    </div>
</body>
</html>
