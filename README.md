# SPK COPRAS — Sistem Pendukung Keputusan

Sistem Pendukung Keputusan berbasis web menggunakan metode **COPRAS** (COmplex PRoportional Assessment), dibangun dengan Laravel 12.

---

## Tentang Metode COPRAS

Metode COPRAS diperkenalkan oleh Zavadskas pada tahun 1994. Metode ini biasanya diterapkan dalam keadaan di mana pembuat keputusan dipaksa untuk memilih di antara banyak alternatif sambil mempertimbangkan serangkaian kriteria yang biasanya saling bertentangan.

Metode COPRAS memiliki kemampuan untuk memperhitungkan kriteria positif (**Benefit** — semakin tinggi semakin baik) dan negatif (**Cost** — semakin rendah semakin baik), yang dapat dinilai secara terpisah dalam proses evaluasi.

Keunggulan utama metode COPRAS:
- Penerapannya sederhana dan sistematis
- Mempertimbangkan rasio terhadap opsi dan solusi ideal secara bersamaan
- Menghasilkan peringkat alternatif berdasarkan **tingkat utilitas** (degree of utility)
- Mengembalikan hasil dalam waktu singkat

---

## Struktur Proyek

```
app/
│
├── Models/
│   ├── User.php
│   ├── Kriteria.php
│   ├── SubKriteria.php
│   ├── Alternatif.php
│   └── NilaiAlternatif.php
│
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   ├── RegisterController.php
│   │   ├── DashboardController.php
│   │   ├── KriteriaController.php
│   │   ├── SubKriteriaController.php
│   │   ├── AlternatifController.php
│   │   ├── PenilaianController.php
│   │   ├── PerhitunganController.php
│   │   ├── HasilAkhirController.php
│   │   ├── UserController.php
│   │   ├── ProfileController.php
│   │   ├── ForgotPasswordController.php
│   │   └── ResetPasswordController.php
│   │
│   ├── Middleware/
│   │   ├── IsAdmin.php
│   │   └── IsUser.php
│   │
│   └── Requests/
│       ├── LoginRequest.php
│       ├── RegisterRequest.php
│       ├── ForgotPasswordRequest.php
│       └── ResetPasswordRequest.php
│
database/
├── migrations/
│   ├── 0001_01_01_000000_create_users_table.php
│   ├── 0001_01_01_000001_create_cache_table.php
│   ├── 0001_01_01_000002_create_jobs_table.php
│   ├── 2025_05_17_031620_create_kriterias_table.php
│   ├── 2025_05_17_031629_create_sub_kriterias_table.php
│   ├── 2025_05_17_031637_create_alternatifs_table.php
│   ├── 2025_05_17_031646_create_nilai_alternatifs_table.php
│   └── 2026_06_24_145233_remove_verification_columns_from_users_table.php
│
└── seeders/
    ├── DatabaseSeeder.php
    ├── KriteriaSeeder.php
    ├── SubKriteriaSeeder.php
    ├── AlternatifSeeder.php
    ├── NilaiAlternatifSeeder.php
    └── UserSeeder.php

resources/
└── views/
    ├── auth/
    │   ├── login.blade.php
    │   ├── register.blade.php
    │   ├── forgot_password.blade.php
    │   ├── reset_password.blade.php
    │   └── reset_password_email.blade.php
    ├── dashboard/
    │   └── index.blade.php
    ├── layouts/
    │   └── app.blade.php
    ├── kriteria/
    ├── subkriteria/
    ├── alternatif/
    ├── penilaian/
    ├── perhitungan/
    ├── hasilakhir/
    ├── user/
    └── profile/

routes/
└── web.php
```

---

## Struktur Database

```sql
CREATE TABLE kriteria (
    id_kriteria INT AUTO_INCREMENT PRIMARY KEY,
    kode_kriteria VARCHAR(10),
    nama_kriteria VARCHAR(100) NOT NULL,
    jenis VARCHAR(10) CHECK (jenis IN ('Benefit', 'Cost')),
    bobot DECIMAL(5,2)
);

CREATE TABLE sub_kriteria (
    id_subkriteria INT AUTO_INCREMENT PRIMARY KEY,
    id_kriteria INT,
    nama_subkriteria VARCHAR(100),
    Nilai INT,
    FOREIGN KEY (id_kriteria) REFERENCES kriteria(id_kriteria) ON DELETE CASCADE
);

CREATE TABLE alternatif (
    id_alternatif INT AUTO_INCREMENT PRIMARY KEY,
    kode_alternatif VARCHAR(10) UNIQUE,
    nama_alternatif VARCHAR(100)
);

CREATE TABLE nilai_alternatif (
    id_nilai INT AUTO_INCREMENT PRIMARY KEY,
    id_alternatif INT,
    id_kriteria INT,
    nilai_subkriteria VARCHAR(100),
    bobot_subkriteria INT,
    FOREIGN KEY (id_alternatif) REFERENCES alternatif(id_alternatif) ON DELETE CASCADE,
    FOREIGN KEY (id_kriteria) REFERENCES kriteria(id_kriteria) ON DELETE CASCADE
);

CREATE TABLE users (
    id_user BIGINT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    status ENUM('Active', 'Inactive') DEFAULT 'Inactive',

    reset_pass_token VARCHAR(64),
    reset_pass_token_expiry TIMESTAMP NULL,

    remember_token VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX idx_email_status (email, status),
    INDEX idx_username_status (username, status),
    INDEX idx_reset_pass_token (reset_pass_token)
);
```

---

## Panduan Instalasi

### Prasyarat
- PHP 8.3+
- MySQL 8.x
- Composer
- Laragon / XAMPP

### Langkah-langkah

1. **Clone repositori** ke folder web server Anda (misal `C:\laragon\www\`):
   ```bash
   git clone https://github.com/MuhammadIlhamFahrezi/SPK_COPRAS.git
   cd SPK_COPRAS
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Salin file konfigurasi** dan sesuaikan:
   ```bash
   cp .env.example .env
   ```

4. **Edit `.env`** sesuai konfigurasi database Anda:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=Copras_V1
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generate application key**:
   ```bash
   php artisan key:generate
   ```

6. **Jalankan migration dan seeder**:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. **Jalankan aplikasi**:
   ```bash
   php artisan serve
   ```

8. Buka browser dan akses:
   ```
   http://127.0.0.1:8000
   ```

### Perintah Tambahan

Reset dan isi ulang database:
```bash
php artisan migrate:refresh
php artisan db:seed
```

Jalankan seeder tertentu saja:
```bash
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=AlternatifSeeder
```

---

## Informasi Login

Akun default tersedia di [`database/seeders/UserSeeder.php`](database/seeders/UserSeeder.php).

| Nama | Username | Role |
|---|---|---|
| Ilham Fahrezi | rezi | admin |
| Rayner Aditya | rayner | admin |
| Anjuan Kaisar | anjuan | admin |
| Pengguna Biasa | user | user |

> **Catatan:** Pendaftaran akun baru tidak memerlukan verifikasi email. Akun langsung aktif setelah registrasi.

---

## Fitur

- 🔐 Autentikasi (Login, Register)
- 👤 Manajemen Pengguna (Admin)
- 📋 Manajemen Kriteria & Sub-Kriteria
- 🏆 Manajemen Alternatif
- 📊 Input Penilaian
- 🧮 Perhitungan COPRAS otomatis
- 📈 Hasil Akhir & Peringkat

---

## Tim Pengembang

1. M. Ilham Fahrezi
2. Anjuan Kaisar
3. Rayner Aditya

---

## Lisensi

Framework Laravel dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).
