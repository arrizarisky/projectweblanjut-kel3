# Sistem Inventory Barang

Sistem Inventory Barang adalah aplikasi berbasis Laravel yang digunakan untuk mengelola stok barang secara efektif dan efisien. Aplikasi ini menyediakan fitur-fitur seperti pencatatan barang, penambahan stok (restock), riwayat restock, dan notifikasi untuk memudahkan pengelolaan inventaris.

## Fitur Utama

- Manajemen Barang: Menambah, mengedit, dan menghapus data barang beserta kategori dan supplier.
- Restock Barang: Penambahan stok barang dengan pencatatan riwayat restock.
- Notifikasi: Memberikan notifikasi kepada admin ketika staf menambah stok barang.
- Dashboard: Menampilkan ringkasan data barang dan statistik stok dalam bentuk grafik.
- Autentikasi & Hak Akses: Login untuk admin dan staff dengan middleware pengaman.

## Tech Stack

- Laravel Framework 10
- PHP 8.2
- MySQL
- Tailwind CSS + DaisyUI + Flowbite (UI/Styling)
- Chart.js (Untuk grafik statistik stok)
- Git (Version control)

## Instalasi

1. Clone repository

    ```bash
    git clone https://github.com/username/repo-inventory.git
    cd repo-inventory
    ```

2. Install dependencies

    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Setup environment

    - Copy file `.env.example` ke `.env`

    ```bash
    cp .env.example .env
    ```

    - Sesuaikan konfigurasi database di `.env`

4. Generate application key

    ```bash
    php artisan key:generate
    ```

5. Migrasi database dan seeder (jika ada)

    ```bash
    php artisan migrate --seed
    ```

6. Jalankan server

    ```bash
    php artisan serve
    ```

## Penggunaan

- Buka browser dan akses `http://localhost:8000`
- Login menggunakan akun admin atau staff
- Gunakan menu untuk mengelola barang, supplier, kategori, dan restock stok
- Admin akan menerima notifikasi saat staf menambah stok barang

## Struktur Folder Penting

- `app/Http/Controllers` — Controller aplikasi
- `app/Models` — Model Eloquent
- `resources/views` — Blade templates untuk UI
- `routes/web.php` — Definisi route aplikasi
- `database/migrations` — File migrasi database

## Kontributor

- Muhammad Arriza Risky
- Sultan Rafi Djafar
- Ronatal Habeahan

## Lisensi

Project ini menggunakan lisensi MIT — lihat file [LICENSE](LICENSE) untuk detail.
