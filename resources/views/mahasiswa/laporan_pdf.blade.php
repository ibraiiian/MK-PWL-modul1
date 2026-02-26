<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            color: #1a1a1a;
            background: #ffffff;
        }

        /* ===== HEADER ===== */
        .header {
            text-align: center;
            border-bottom: 3px solid #1e3a5f;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }

        .header .institution {
            font-size: 16px;
            font-weight: bold;
            color: #1e3a5f;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .header .report-title {
            font-size: 13px;
            font-weight: bold;
            color: #333;
            margin-top: 3px;
        }

        .header .sub-info {
            font-size: 10px;
            color: #666;
            margin-top: 4px;
        }

        /* ===== TABLE ===== */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead tr {
            background-color: #1e3a5f;
            color: #ffffff;
        }

        thead th {
            padding: 9px 8px;
            text-align: left;
            font-size: 11px;
            font-weight: bold;
            border: 1px solid #1e3a5f;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tbody tr {
            background-color: #ffffff;
        }

        tbody tr:nth-child(even) {
            background-color: #f0f4f8;
        }

        tbody td {
            padding: 8px 8px;
            border: 1px solid #c8d8e8;
            font-size: 11px;
            color: #333;
            vertical-align: middle;
        }

        .td-center {
            text-align: center;
        }

        /* ===== FOOTER ===== */
        .footer {
            margin-top: 25px;
            font-size: 10px;
            color: #888;
        }

        .footer .signature-area {
            text-align: right;
            margin-bottom: 5px;
        }

        .footer .signature-area .place-date {
            font-size: 11px;
            color: #444;
        }

        .footer .signature-area .sign-name {
            margin-top: 40px;
            font-size: 11px;
            font-weight: bold;
            color: #1e3a5f;
            text-decoration: underline;
        }

        .footer .sign-role {
            font-size: 10px;
            color: #666;
        }

        .footer .meta {
            border-top: 1px solid #ddd;
            padding-top: 6px;
            margin-top: 10px;
            text-align: center;
        }

        .badge-mk {
            background-color: #e8f0fe;
            color: #1e3a5f;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    {{-- HEADER --}}
    <div class="header">
        <div class="institution">STMIK IKMI Cirebon</div>
        <div class="report-title">DAFTAR MAHASISWA STMIK IKMI</div>
        <div class="sub-info">Sistem Informasi Akademik &bull; Tahun Akademik {{ date('Y') }}/{{ date('Y') + 1 }}</div>
    </div>

    {{-- TABLE --}}
    <table>
        <thead>
            <tr>
                <th class="td-center" style="width: 5%;">No</th>
                <th style="width: 15%;">NIM</th>
                <th style="width: 30%;">Nama Mahasiswa</th>
                <th class="td-center" style="width: 10%;">Kelas</th>
                <th style="width: 40%;">Mata Kuliah</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa as $index => $mhs)
                <tr>
                    <td class="td-center">{{ $index + 1 }}</td>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td class="td-center">{{ $mhs->kelas }}</td>
                    <td>
                        @if ($mhs->matakuliah)
                            <span class="badge-mk">{{ $mhs->matakuliah->kode }}</span>
                            {{ $mhs->matakuliah->nama }}
                        @else
                            <span style="color: #aaa; font-style: italic;">— Belum diisi —</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="td-center" style="padding: 20px; color: #888; font-style: italic;">
                        Belum ada data mahasiswa.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- FOOTER --}}
    <div class="footer">
        <div class="signature-area">
            <div class="place-date">Cirebon, {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y') }}</div>
            <div class="sign-name">{{ Auth::user()->name }}</div>
            <div class="sign-role">Administrator Sistem</div>
        </div>
        <div class="meta">
            Dicetak pada {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y, HH:mm') }} WIB
            &bull; Total: {{ $mahasiswa->count() }} mahasiswa
            &bull; Sistem Informasi Akademik &copy; {{ date('Y') }}
        </div>
    </div>

</body>
</html>
