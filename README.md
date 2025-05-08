# 📦 Laravel Stok Barang Project – Tim Kolaborasi

Repositori ini merupakan hasil kerja sama tim dalam mengembangkan aplikasi Laravel 10 untuk manajemen stok barang. Panduan ini berisi **langkah-langkah awal yang harus dilakukan oleh setiap anggota tim** agar bisa mulai bekerja secara sinkron dan kolaboratif.

---

## ✅ Langkah-Langkah Awal untuk Setiap Anggota Tim Laravel

### 1. 🔁 Clone Repository GitHub
```bash
git clone https://github.com/nama-user/nama-repo.git
cd nama-repo
```

---

### 2. ⚙️ Buat File `.env` Lokal
Salin dari contoh yang tersedia:
```bash
cp .env.example .env
```

Lalu atur koneksi database sesuai dengan environment lokal Anda:
```env
DB_DATABASE=stok_barang
DB_USERNAME=root
DB_PASSWORD=
```

---

### 3. 🛠️ Buat Database Lokal
Buat database baru secara manual di MySQL/phpMyAdmin:

```sql
CREATE DATABASE stok_barang;
```

---

### 4. 📦 Install Dependency Laravel
Jalankan perintah berikut untuk menginstal semua dependensi PHP dan JavaScript:

```bash
composer install
npm install && npm run dev
```

---

### 5. 🔐 Generate Application Key
```bash
php artisan key:generate
```

---

### 6. 🧱 Membuat Tabel (Migration) Sesuai Fitur
Setiap anggota tim bertanggung jawab membuat tabel migrasi berdasarkan fitur yang dipegang:

| Nama Anggota | Fitur      | Nama Tabel    |
|--------------|------------|---------------|
| A            | Barang     | `barangs`     |
| B            | Kategori   | `kategoris`   |
| C            | Supplier   | `suppliers`   |

Gunakan perintah:
```bash
php artisan make:migration create_nama_tabel --create=nama_tabel
```

---

### 7. 🧩 Buat Model, Controller, dan View
Untuk tiap fitur, buatlah:

- **Model**  
  ```bash
  php artisan make:model NamaModel
  ```

- **Controller**  
  ```bash
  php artisan make:controller NamaController --resource
  ```

- **View**  
  Buat view di:  
  ```
  resources/views/nama_fitur/
  ```

---

### 8. 🔃 Jalankan Migrasi
Setelah semua file migrasi siap:
```bash
php artisan migrate
```

---

### 9. 🌿 Buat dan Kerjakan di Branch Masing-Masing
```bash
git checkout -b fitur/nama-fitur
```

Contoh:  
```bash
git checkout -b fitur/barang
```

---

### 10. 🚀 Push Perubahan ke Branch
```bash
git add .
git commit -m "Selesai fitur barang"
git push origin fitur/barang
```

---

### 11. 🔄 Buat Pull Request di GitHub
- Buka GitHub
- Buat Pull Request dari branch `fitur/nama-fitur` ke `main`
- Tunggu review dan merge oleh ketua tim atau anggota lain

---

## 📌 Catatan Tambahan

- Jangan pernah meng-upload file `.env` ke GitHub (sudah di-.gitignore).
- File `config/database.php` **tidak perlu diubah**.
- Selalu jalankan `git pull origin main` sebelum memulai kerja harian.

---

💬 Jika ada pertanyaan atau konflik dalam Git, segera diskusikan bersama tim.
