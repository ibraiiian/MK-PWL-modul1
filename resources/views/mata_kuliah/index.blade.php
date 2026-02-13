<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mata Kuliah</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 30px 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        h1 {
            font-size: 2rem;
            color: #2c3e50;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        .btn-warning {
            background-color: #f39c12;
            color: white;
            padding: 6px 12px;
            font-size: 0.9rem;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
            padding: 6px 12px;
            font-size: 0.9rem;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .btn-info {
            background-color: #3498db;
            color: white;
            padding: 6px 12px;
            font-size: 0.9rem;
        }

        .btn-info:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border-radius: 8px 8px 0 0;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #ecf0f1;
            color: #2c3e50;
        }

        tbody tr {
            transition: background-color 0.3s ease;
        }

        tbody tr:hover {
            background-color: #f8f9fa;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .empty-message {
            text-align: center;
            padding: 40px;
            color: #7f8c8d;
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 1.5rem;
            }

            .header {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                width: 100%;
                text-align: center;
            }

            table {
                font-size: 0.9rem;
            }

            th,
            td {
                padding: 10px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>📚 Daftar Mata Kuliah</h1>
            <a href="{{ route('mata-kuliah.create') }}" class="btn btn-primary">+ Tambah Mata Kuliah</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.style.display='none';"
                    style="background: none; border: none; font-size: 1.5rem; cursor: pointer;">×</button>
            </div>
        @endif

        @if ($mataKuliah->count())
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Dosen</th>
                        <th>Jumlah Mahasiswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mataKuliah as $mk)
                        <tr>
                            <td><strong>{{ $mk->kode }}</strong></td>
                            <td>{{ $mk->nama }}</td>
                            <td><span
                                    style="background-color: #ecf0f1; padding: 4px 8px; border-radius: 4px;">{{ $mk->sks }}</span>
                            </td>
                            <td>{{ $mk->dosen }}</td>
                            <td>
                                <span
                                    style="background-color: #d5f5e3; padding: 4px 10px; border-radius: 4px; font-weight: 600; color: #27ae60;">{{ $mk->mahasiswas_count }}
                                    mahasiswa</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('mata-kuliah.show', $mk->id) }}" class="btn btn-info">👥 Lihat
                                        Mahasiswa</a>
                                    <a href="{{ route('mata-kuliah.edit', $mk->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('mata-kuliah.destroy', $mk->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-message">
                <p>📭 Belum ada data mata kuliah</p>
            </div>
        @endif
    </div>
</body>

</html>
