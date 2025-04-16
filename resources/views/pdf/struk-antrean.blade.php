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
        .small { font-size: 10px; }
    </style>
</head>
<body>
    {{-- Header Institusi --}}
    <div class="text-center bold">BANK INDONESIA</div>
    <div class="text-center">Bank Sentral Republik Indonesia</div>

    {{-- Informasi Layanan --}}
    <div class="text-center mt-2">
        <div>KPBI</div>
        <div>Layanan Non-Bank (Pegawai)</div>
        <div>Penukaran Uang Pecahan Kecil</div>
    </div>

    {{-- Nomor Antrean --}}
    <div class="text-center mt-4">
        <div>NO. ANTRIAN:</div>
        <div class="bold" style="font-size: 20px;">{{ $nomor ?? 'G-005' }}</div>
        <div class="mt-2">Sisa antrian: {{ $sisa ?? 4 }} nomor</div>

        {{-- QR Kode Dummy --}}
        <div class="mt-2">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAABbUlEQVRYR+2WvUrEQBBGH2EG7BfYJLRsLdCCkIBaGwgURgS/gFBbsLSwoDKxsDI2/pgtr28R+cjR8PLt/fpXUn4qSS7RQhGS0lWTsZlkG0BXw7iHvzGwAi6AWOTMI4BdIW9cdZ2C2Rxil0eWQFwHwBmVrq7qqRbdtiJ5V8ApRYkKTKpJJPTarqEkx+lJwC8DFh+Z0pmoZcAWqVG9eIhdvj5KDXypMyoNH9V0lSTKQAOeyz+54BOMvjmsFzFMkZqIPYyHJPBzWT9ifv+ISRPQC/8mFGusgxU+bvAX4GCUBklNc1eEHrVvqHG/5zqCjAcJ/U6A3ytMEpOSWYDZFSazYtEij6XJGZNNsOuwjdrEWAOuSAnF52ZgmUAAAAASUVORK5CYII=" width="40" height="40" alt="QR">
        </div>

        {{-- Kode unik --}}
        <div class="small mt-2">Kode: {{ substr(md5($nomor . now()), 0, 6) }}</div>
    </div>

    {{-- Informasi Pegawai --}}
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

    {{-- Tabel Pecahan --}}
    <table>
        <thead>
            <tr>
                <th>Pecahan</th>
                <th class="right">Masuk</th>
                <th class="right">Keluar</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($dataPecahan))
                @foreach ($dataPecahan as $pecahan)
                <tr>
                    <td>Rp. {{ number_format((int) $pecahan['nominal'], 0, ',', '.') }},-</td>
                    <td class="right">Rp. {{ number_format((int) $pecahan['masuk'], 0, ',', '.') }},-</td>
                    <td class="right">Rp. {{ number_format((int) $pecahan['keluar'], 0, ',', '.') }},-</td>
                </tr>
                @endforeach
                <tr class="bold">
                    <td>Total</td>
                    <td class="right">Rp. {{ number_format((int) $totalMasuk, 0, ',', '.') }},-</td>
                    <td class="right">Rp. {{ number_format((int) $totalKeluar, 0, ',', '.') }},-</td>
                </tr>
            @else
                <tr><td colspan="3" class="text-center">Tidak ada data pecahan</td></tr>
            @endif
        </tbody>
    </table>

    {{-- Tanggal dan Jam --}}
    <div class="text-center mt-4">
        <div>{{ now()->format('H:i:s') }}</div>
        <div>{{ now()->format('d-m-Y') }}</div>
    </div>

    {{-- Catatan --}}
    <div class="text-center mt-2 small">
        * Pembatalan antrean agar melapor kepada petugas<br>
        * Klaim hanya dapat dilakukan sebelum meninggalkan loket
    </div>
</body>
</html>
