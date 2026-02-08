<!DOCTYPE html>
<html>
<head>
    <title>Modul 1 Laravel 12</title>
    <style>
        /* Reset dasar untuk konsistensi tampilan */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Background dengan gradien lembut */
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        /* Container utama untuk konten */
        .container {
            background-color: white;
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Judul utama yang lebih besar */
        h1 {
            font-size: 2.8rem;
            color: #2c3e50;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            line-height: 1.3;
        }

        /* Warna khusus untuk nama mahasiswa */
        h1 span {
            color: #3498db;
            text-decoration: underline;
            text-decoration-color: #3498db;
        }

        /* Paragraf dengan gaya clean */
        p {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 30px;
            padding: 0 15px;
        }

        /* Box informasi tambahan */
        .info-box {
            background-color: #f8f9fa;
            border-left: 5px solid #3498db;
            padding: 15px;
            margin-top: 25px;
            border-radius: 0 10px 10px 0;
            text-align: left;
        }

        .info-box h3 {
            color: #2c3e50;
            margin-bottom: 8px;
            font-size: 1.2rem;
        }

        .info-box ul {
            padding-left: 20px;
            color: #555;
        }

        .info-box li {
            margin-bottom: 5px;
        }

        /* Footer sederhana */
        .footer {
            margin-top: 30px;
            color: #7f8c8d;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        /* Responsif untuk mobile */
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 2.2rem;
            }
            
            p {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang!</h1>
        
        <p>Ini adalah halaman pertama saya di Laravel 12 dengan bantuan AI. Saya sangat senang memulai perjalanan belajar framework PHP modern ini.</p>
        
        <div class="info-box">
            <h3>Yang sudah dipelajari:</h3>
            <ul>
                <li>Instalasi Laravel 12 dan setup environment</li>
                <li>Struktur folder dasar Laravel</li>
                <li>Routing di file web.php</li>
                <li>Blade templating untuk view</li>
            </ul>
        </div>
        
        <div class="footer">
            <p>Modul 1 - Pemrograman Web dengan Laravel 12<br>
            Universitas Example - Fakultas Ilmu Komputer</p>
        </div>
    </div>
</body>
</html>

<!-- Tampilan dibuat dengan referensi dari DeepSeek -->
