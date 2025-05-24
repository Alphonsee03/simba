<!DOCTYPE html>
<html>
<head>
    <title>Hasil Seleksi SAW</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
    </style>
</head>
<body>
    <h3 style="text-align: center;">Laporan Hasil Seleksi Beasiswa (Top 5)</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penilaians as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ number_format($item->nilai_akhir, 4) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
