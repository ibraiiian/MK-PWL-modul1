<!DOCTYPE html>
<html>

<head>
    <title>Detail Mata Kuliah</title>
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
            font-weight: 600;
        }

        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(149, 165, 166, 0.3);
        }

        /* Detail Card */
        .detail-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .detail-label {
            font-size: 0.85rem;
            opacity: 0.8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .detail-value {
            font-size: 1.3rem;
            font-weight: 700;
        }

        /* Mahasiswa Section */
        .section-title {
            font-size: 1.4rem;
            color: #2c3e50;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .badge-count {
            background-color: #3498db;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
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

        .empty-message {
            text-align: center;
            padding: 40px;
            color: #7f8c8d;
            font-size: 1.1rem;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
            margin-right: 10px;
        }

        .student-name {
            display: flex;
            align-items: center;
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

            .detail-card {
                grid-template-columns: 1fr 1fr;
            }

            table {
                font-size: 0.9rem;
            }

            th,
            td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>📖 Detail Mata Kuliah</h1>
            <a href="{{ route('mata-kuliah.index') }}" class="btn btn-secondary">← Kembali</a>
        </div>

        {{-- Detail Mata Kuliah --}}
        <div class="detail-card">
            <div class="detail-item">
                <span class="detail-label">Kode</span>
                <span class="detail-value">{{ $mataKuliah->kode }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Nama Mata Kuliah</span>
                <span class="detail-value">{{ $mataKuliah->nama }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">SKS</span>
                <span class="detail-value">{{ $mataKuliah->sks }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Dosen Pengampu</span>
                <span class="detail-value">{{ $mataKuliah->dosen }}</span>
            </div>
        </div>

        {{-- Daftar Mahasiswa --}}
        <div class="section-title">
            👥 Daftar Mahasiswa
            <span class="badge-count">{{ $mataKuliah->mahasiswas->count() }} mahasiswa</span>
        </div>

        @if ($mataKuliah->mahasiswas->count())
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mataKuliah->mahasiswas as $index => $mhs)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $mhs->nim }}</strong></td>
                            <td>
                                <div class="student-name">
                                    <div class="avatar">{{ substr($mhs->nama, 0, 1) }}</div>
                                    {{ $mhs->nama }}
                                </div>
                            </td>
                            <td>
                                <span
                                    style="background-color: #ecf0f1; padding: 4px 8px; border-radius: 4px;">{{ $mhs->kelas }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-message">
                <p>📭 Belum ada mahasiswa yang mengambil mata kuliah ini</p>
            </div>
        @endif
    </div>
</body>

</html>
