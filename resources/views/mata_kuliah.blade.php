<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mata Kuliah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            padding: 30px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        th {
            background-color: #eaeaea;
        }
    </style>
</head>
<body>

    <h1>Daftar Mata Kuliah</h1>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Dosen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mataKuliah as $mk)
            <tr>
                <td>{{ $mk['kode'] }}</td>
                <td>{{ $mk['nama'] }}</td>
                <td>{{ $mk['sks'] }}</td>
                <td>{{ $mk['dosen'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
