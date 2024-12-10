<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <h2>Daftar Siswa</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>NIS</th>
                <th>Rombel</th>
                <th>Kelas</th>
                <th>Rayon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['name'] }}</td> <!-- Mengakses data sebagai array -->
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['nis'] }}</td>
                    <td>{{ $item['rombel'] }}</td>
                    <td>{{ $item['kelas'] }}</td>
                    <td>{{ $item['rayon'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
