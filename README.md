# 📘 Laravel 12 – Sistem Informasi Akademik (SIAKAD)

Project ini adalah **Sistem Informasi Akademik Sederhana** yang dibangun menggunakan **Laravel 12**. Project ini mencakup manajemen data Mahasiswa dan Mata Kuliah dengan fitur lengkap CRUD, Otentikasi (Login/Register), dan pelaporan sederhana melalui Dashboard.

Project ini dikembangkan sebagai bagian dari praktikum **Pemrograman Web Lanjut** dengan fokus pada Clean Code, MVC Pattern, dan Modern UI.

---

## ✨ Fitur Utama

### 1. 🔐 Otentikasi & Keamanan
*   **Login & Register** menggunakan **Laravel Breeze**.
*   **Custom Middleware** (`IkmiEmailOnly`): Membatasi fitur hapus mahasiswa hanya untuk email berakhiran `@ikmi.ac.id`.
*   Proteksi Route dengan middleware `auth`.

### 2. 📊 Dashboard Interaktif
*   Ringkasan total **Mahasiswa**.
*   Ringkasan total **Mata Kuliah**.
*   Tampilan modern dengan **Tailwind CSS**.

### 3. 🎓 Manajemen Mahasiswa (CRUD)
*   Menampilkan daftar mahasiswa dengan pencarian & pagination.
*   Tambah, Edit, dan Hapus data mahasiswa.
*   Relasi ke Mata Kuliah (One-to-Many).
*   Validasi input yang ketat (NIM unik, field wajib isi).
*   Pencatatan otomatis `user_id` penginput data.

### 4. 📚 Manajemen Mata Kuliah (CRUD)
*   Kelola data Mata Kuliah (Kode, Nama, SKS, Dosen).
*   Fitur `Show Details`: Melihat daftar mahasiswa yang mengambil mata kuliah tertentu.
*   Indikator jumlah mahasiswa per mata kuliah.

---

## 🛠️ Teknologi yang Digunakan

*   **Backend**: Laravel 12 (PHP 8.2+)
*   **Frontend**: Blade Templates + **Tailwind CSS**
*   **Database**: MySQL
*   **Auth**: Laravel Breeze
*   **Tools**: VS Code, Composer, NPM, Laragon/XAMPP

---

## 🚀 Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer lokal Anda:

### 1. Clone Repository
```bash
git clone https://github.com/ibraiiian/MK-PWL-modul1.git
cd MK-PWL-modul1
```

### 2. Install Dependencies
Install library PHP dan aset Frontend:
```bash
composer install
npm install
```

### 3. Konfigurasi Environment
Duplikasi file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
Buka file `.env` dan sesuaikan koneksi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_mahasiswa  # Pastikan database ini sudah dibuat di MySQL
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Key & Migration
```bash
php artisan key:generate
php artisan migrate
```

### 5. Jalankan Project
Anda perlu menjalankan **dua terminal** secara bersamaan:

**Terminal 1 (Laravel Server):**
```bash
php artisan serve
```

**Terminal 2 (Vite Dev Server - untuk CSS/JS):**
```bash
npm run dev
```

Akses aplikasi di browser:
👉 **http://127.0.0.1:8000**

---

## 👨‍💻 Akun Demo (Opsional)

Untuk menguji fitur **Custom Middleware** (Hapus Mahasiswa), daftarkan akun dengan email kampus:
*   **Email**: `admin@ikmi.ac.id` (Bisa hapus data)
*   **Email Lain**: `user@gmail.com` (Tidak bisa hapus data - Error 403)

---

## 📂 Struktur Project

*   `app/Models`: Definisi Model (`Mahasiswa`, `MataKuliah`, `User`).
*   `app/Http/Controllers`: Logika aplikasi (`MahasiswaController`, `MatakuliahController`).
*   `app/Http/Middleware`: Middleware kustom (`IkmiEmailOnly`).
*   `resources/views`: Tampilan antarmuka (`dashboard`, `mahasiswa/*`, `mata_kuliah/*`).
*   `routes/web.php`: Definisi jalur URL aplikasi.
*   `database/migrations`: Skema database.

---

## 📝 Credits

*   **Pengembang**: Ibrahim Bahaly (43240381)
*   **Mata Kuliah**: Pemrograman Web Lanjut
*   **Dosen Pengampu**: Bpk. Rudi Kurniawan

---

*Dibuat dengan ❤️ menggunakan Laravel 12*
