<!DOCTYPE html>
<html>

<head>
    <title>Edit Mata Kuliah</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background-color: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        h1 {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 30px;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 600;
            font-size: 1rem;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ecf0f1;
            border-radius: 8px;
            font-size: 1rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        input:disabled,
        textarea:disabled,
        select:disabled {
            background-color: #ecf0f1;
            cursor: not-allowed;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 35px;
        }

        .btn {
            flex: 1;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
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

        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(149, 165, 166, 0.3);
        }

        .error {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 6px;
        }

        .form-group.has-error input,
        .form-group.has-error textarea,
        .form-group.has-error select {
            border-color: #e74c3c;
        }

        .alert-error {
            background-color: #fadbd8;
            color: #c0392b;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #f5b7b1;
        }

        .info-text {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 25px;
            }

            h1 {
                font-size: 1.5rem;
            }

            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>✏️ Edit Mata Kuliah</h1>

        @if ($errors->any())
            <div class="alert-error">
                <strong>Terjadi kesalahan!</strong>
                <ul style="padding-left: 20px; margin-top: 10px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mata-kuliah.update', $mataKuliah->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kode">Kode Mata Kuliah</label>
                <input type="text" id="kode" name="kode" value="{{ $mataKuliah->kode }}" disabled>
                <div class="info-text">Kode mata kuliah tidak dapat diubah</div>
            </div>

            <div class="form-group @error('nama') has-error @enderror">
                <label for="nama">Nama Mata Kuliah</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $mataKuliah->nama) }}"
                    required>
                @error('nama')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group @error('sks') has-error @enderror">
                <label for="sks">SKS (1-6)</label>
                <input type="number" id="sks" name="sks" value="{{ old('sks', $mataKuliah->sks) }}"
                    min="1" max="6" required>
                @error('sks')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group @error('dosen') has-error @enderror">
                <label for="dosen">Dosen Pengampu</label>
                <input type="text" id="dosen" name="dosen" value="{{ old('dosen', $mataKuliah->dosen) }}"
                    required>
                @error('dosen')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('mata-kuliah.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>
