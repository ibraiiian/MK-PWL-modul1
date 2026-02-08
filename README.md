# 📘 Laravel 12 – CRUD Mahasiswa

Project ini merupakan **project praktikum Pemrograman Web Lanjut** yang dibuat menggunakan **Laravel 12**. Project berfokus pada **integrasi database MySQL** dan **implementasi CRUD dasar (Create, Read, Update, Delete)** pada data Mahasiswa dengan pendekatan MVC (Model–View–Controller).

Pengembangan project ini dilakukan dengan **bantuan AI (DeepSeek)** sebagai *referensi pembelajaran*, bukan sebagai pengganti pemahaman mahasiswa.

---

## 🎯 Tujuan Project

* Mengonfigurasi koneksi database MySQL di Laravel 12
* Memahami dan menerapkan Migration
* Menggunakan Eloquent ORM untuk manipulasi data
* Mengimplementasikan CRUD dasar pada data Mahasiswa
* Melatih penggunaan AI secara **etis dan bertanggung jawab** dalam pembelajaran

---

## 🛠️ Teknologi yang Digunakan

* **Laravel 12**
* **PHP 8.2+**
* **MySQL**
* **Blade Template Engine**
* **Bootstrap 5 (sederhana)**
* **AI Assistant: DeepSeek (sebagai referensi belajar)**

---

## 📂 Struktur Fitur

* Konfigurasi database melalui file `.env`
* Migration tabel `mahasiswas`
* Model `Mahasiswa`
* Controller `MahasiswaController` (resource)
* CRUD Mahasiswa:

  * ✅ Tampil Data (Read)
  * ✅ Tambah Data (Create)
  * ✅ Edit Data (Update)
  * ✅ Hapus Data (Delete)

---

## 🧭 Alur Aplikasi (Sederhana)

1. User mengakses URL melalui browser
2. Route memanggil Controller
3. Controller memproses data menggunakan Model
4. Data ditampilkan melalui View (Blade)
5. Data disimpan / diambil dari database MySQL

---

## 🚀 Cara Menjalankan Project

1. Clone repository ini:

   ```bash
   git clone https://github.com/ibraiiian/MK-PWL-modul1.git
   ```

2. Masuk ke folder project:

   ```bash
   cd MK-PWL-modul1
   ```

3. Install dependency:

   ```bash
   composer install
   ```

4. Copy file `.env`:

   ```bash
   cp .env.example .env
   ```

5. Atur konfigurasi database di file `.env`

6. Generate key:

   ```bash
   php artisan key:generate
   ```

7. Jalankan migration:

   ```bash
   php artisan migrate
   ```

8. Jalankan server:

   ```bash
   php artisan serve
   ```

9. Akses di browser:

   ```
   http://127.0.0.1:8000/mahasiswa
   ```

---

## 🤖 Log Konsultasi AI (DeepSeek)

Berikut adalah ringkasan penggunaan AI (GitHub Copilot) selama proses pengerjaan project ini:

### 1️⃣ Topik Konsultasi

* Penjelasan struktur folder Laravel 12
* Cara membuat Migration tabel Mahasiswa
* Cara mengirim data dari Controller ke View
* Implementasi CRUD dasar Laravel
* Penanganan error *Mass Assignment Exception*
* Integrasi Bootstrap 5 pada template Blade

### 2️⃣ Link Chat DeepSeek

🔗 **DeepSeek Chat Log**: [https://chat.deepseek.com/share/cr0ks2wah90ka5wmhp)

### 3️⃣ Contoh Prompt yang Digunakan

```
Saya sedang belajar Laravel 12.
Tolong jelaskan cara membuat CRUD sederhana untuk data Mahasiswa
menggunakan Migration, Model, dan Controller resource.
```

```
Saya mendapatkan error 'Add [nim] to fillable property to allow mass assignment'.
Apa maksud error tersebut dan bagaimana cara memperbaikinya?
```

### 4️⃣ Catatan Etika Penggunaan AI

* AI digunakan sebagai **alat bantu belajar**, bukan untuk menyalin seluruh kode
* Kode hasil referensi AI dipahami dan diketik ulang secara mandiri
* Mahasiswa tetap bertanggung jawab atas logika dan hasil akhir program

---

## 📝 Catatan Akademik

> AI (DeepSeek) digunakan sebagai *kopilot pembelajaran*. Seluruh implementasi dilakukan dengan pemahaman mandiri terhadap konsep Laravel, MVC, dan CRUD.

---

## 👨‍🎓 Identitas

* **Nama**: Ibrahim Bahaly
* **NIM**: 43240381
* **Mata Kuliah**: Pemrograman Web Lanjut
* **Framework**: Laravel 12

---

✨ *Project ini dibuat untuk keperluan pembelajaran dan praktikum akademik.*
