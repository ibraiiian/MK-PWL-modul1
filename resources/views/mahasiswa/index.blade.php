<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - Laravel 12</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            padding-top: 20px;
            padding-bottom: 40px;
        }
        
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: none;
            margin-top: 20px;
        }
        
        .card-header {
            background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px 25px;
        }
        
        .table-responsive {
            border-radius: 0 0 15px 15px;
            overflow: hidden;
        }
        
        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 3px solid #3498db;
            font-weight: 600;
            color: #2c3e50;
        }
        
        .table tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
            transition: background-color 0.3s;
        }
        
        .badge-kelas {
            background-color: #3498db;
            color: white;
            font-weight: 500;
        }
        
        .btn-edit {
            background-color: #f39c12;
            border: none;
            color: white;
        }
        
        .btn-edit:hover {
            background-color: #d68910;
        }
        
        .btn-hapus {
            background-color: #e74c3c;
            border: none;
            color: white;
        }
        
        .btn-hapus:hover {
            background-color: #c0392b;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }
        
        .empty-state i {
            font-size: 4rem;
            color: #bdc3c7;
            margin-bottom: 20px;
        }
        
        .search-box {
            max-width: 400px;
        }
        
        .status-badge {
            font-size: 0.8em;
            padding: 5px 10px;
            border-radius: 20px;
        }
        
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #3498db;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col">
                <h1 class="display-5 fw-bold text-primary">
                    <i class="bi bi-people-fill me-2"></i>Data Mahasiswa
                </h1>
                <p class="text-muted">Manajemen data mahasiswa menggunakan Laravel 12 dan Bootstrap 5</p>
            </div>
        </div>

        <!-- Card Utama -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title mb-0">
                        <i class="bi bi-table me-2"></i>Daftar Mahasiswa
                    </h5>
                </div>
                <div class="d-flex align-items-center">
                    <!-- Search Box -->
                    <div class="input-group search-box me-3">
                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Cari mahasiswa..." id="searchInput">
                    </div>
                    
                    <!-- Tombol Tambah Data -->
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Data
                    </a>
                </div>
            </div>

            <div class="card-body">
                <!-- Info Statistik -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card border-0 bg-light">
                            <div class="card-body text-center">
                                <h3 class="text-primary">{{ count($mahasiswas) }}</h3>
                                <p class="text-muted mb-0">Total Mahasiswa</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex flex-wrap">
                            @php
                                $kelasCount = [];
                                foreach($mahasiswas as $mhs) {
                                    $kelasCount[$mhs->kelas] = isset($kelasCount[$mhs->kelas]) ? $kelasCount[$mhs->kelas] + 1 : 1;
                                }
                            @endphp
                            @foreach($kelasCount as $kelas => $jumlah)
                            <div class="me-3 mb-2">
                                <span class="badge bg-primary p-2">
                                    {{ $kelas }}: {{ $jumlah }} mahasiswa
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Tabel Mahasiswa -->
                @if(count($mahasiswas) > 0)
                <div class="table-responsive">
                    <table class="table table-hover" id="mahasiswaTable">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="20%">NIM</th>
                                <th width="25%">Nama</th>
                                <th width="15%">Kelas</th>
                                <th width="25%">Mata Kuliah</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mahasiswas as $index => $mhs)
                            <tr>
                                <td>
                                    <div class="avatar">
                                        {{ substr($mhs->nama, 0, 1) }}
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold text-primary">{{ $mhs->nim }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="mb-0">{{ $mhs->nama }}</h6>
                                            <small class="text-muted">Mahasiswa Aktif</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-kelas p-2">{{ $mhs->kelas }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-book me-2 text-primary"></i>
                                        <span>{{ $mhs->matakuliah }}</span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('mahasiswa.edit', $mhs->nim) }}" class="btn btn-edit btn-sm me-1" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('mahasiswa.destroy', $mhs->nim) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-hapus btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                        
                                        <!-- Tombol Detail (Opsional) -->
                                        <a href="{{ route('mahasiswa.show', $mhs->nim) }}" class="btn btn-info btn-sm ms-1" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination (Opsional) -->
                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
                
                @else
                <!-- State kosong -->
                <div class="empty-state">
                    <i class="bi bi-person-x"></i>
                    <h4 class="text-muted">Data mahasiswa tidak ditemukan</h4>
                    <p class="text-muted">Belum ada data mahasiswa yang tersimpan</p>
                    <a href="#" class="btn btn-primary mt-3">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Data Pertama
                    </a>
                </div>
                @endif
            </div>
            
            <!-- Footer Card -->
            <div class="card-footer text-muted">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="bi bi-info-circle me-1"></i>
                        Total {{ count($mahasiswas) }} data mahasiswa
                    </div>
                    <div>
                        Terakhir diperbarui: {{ now()->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Informasi Tambahan -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-info">
                    <h6><i class="bi bi-lightbulb me-2"></i>Tips:</h6>
                    <ul class="mb-0">
                        <li>Gunakan tombol edit untuk mengubah data mahasiswa</li>
                        <li>Tombol hapus akan menghapus data secara permanen</li>
                        <li>Gunakan kolom pencarian untuk menemukan data dengan cepat</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-light">
                    <h6><i class="bi bi-code me-2"></i>Teknologi:</h6>
                    <div class="d-flex flex-wrap">
                        <span class="badge bg-primary me-2 mb-1">Laravel 12</span>
                        <span class="badge bg-success me-2 mb-1">Bootstrap 5</span>
                        <span class="badge bg-warning me-2 mb-1">Blade Templating</span>
                        <span class="badge bg-info me-2 mb-1">MySQL</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Fitur pencarian sederhana
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#mahasiswaTable tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
        
        // Konfirmasi sebelum menghapus
        document.querySelectorAll('.btn-hapus').forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    e.preventDefault();
                }
            });
        });
        
        // Animasi hover pada baris tabel
        const tableRows = document.querySelectorAll('#mahasiswaTable tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.transition = 'transform 0.2s';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>