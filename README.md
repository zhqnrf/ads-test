# Alfa Travel Application

## Deskripsi Aplikasi

**Alfa Travel** adalah aplikasi pemesanan travel yang dirancang untuk memberikan pengalaman pemesanan yang mudah dan efisien. Aplikasi ini menawarkan dua jenis pengguna, yaitu **Admin** dan **User**. Admin memiliki hak akses penuh untuk mengelola sistem, sementara pengguna dapat memesan perjalanan, melihat riwayat pesanan, dan mengelola pesanan mereka.

### Jenis Pengguna dan Hak Akses

1. **Admin:**
   - **Data Waktu Keberangkatan (CRUD):** Admin dapat menambah, mengubah, menghapus, dan melihat data jadwal keberangkatan.
   - **Data User (Hapus/Ganti Role):** Admin dapat menghapus pengguna atau mengubah peran mereka.
   - **Data Travel (CRUD):** Admin memiliki kontrol penuh atas data travel, termasuk penambahan, pengeditan, dan penghapusan data.
   - **Data Destinasi (CRUD):** Admin dapat mengelola destinasi travel, termasuk menambah, mengedit, dan menghapus data destinasi.
   - **Order Travel (CRUD):** Admin dapat melihat, mengedit, menambah, dan menghapus pesanan travel.

2. **User:**
   - **Pesan Travel:** Pengguna dapat memesan perjalanan sesuai dengan jadwal dan destinasi yang diinginkan.
   - **Checkout Travel:** Pengguna dapat menyelesaikan proses pemesanan dan melakukan pembayaran.
   - **Order Travel (CRD):** Pengguna dapat melihat, membuat, dan menghapus pesanan mereka.
   - **Order History (R):** Pengguna dapat melihat riwayat pemesanan mereka untuk referensi di masa mendatang.

## Informasi Pengguna

Untuk mengakses aplikasi, gunakan kredensial berikut:

- **Admin:**
  - Email: admin@gmail.com
  - Password: admin1234

- **User:**
  - Email: user@gmail.com
  - Password: user1234

*Catatan:* Pengguna juga dapat melakukan registrasi untuk membuat akun baru.

## Dependency

Pastikan sistem Anda memenuhi persyaratan berikut untuk menjalankan aplikasi ini:

- **PHP:** Versi >= ^8.0
- **Composer:** Versi >= ^2.0
- **Laravel Framework:** Versi 11

## Panduan Menjalankan Proyek

1. **Clone Repository:**
   - Buka terminal atau command prompt dan navigasikan ke direktori di mana Anda ingin menyimpan proyek ini.
   - Jalankan perintah berikut untuk mengkloning repository:
     ```bash
       git clone https://github.com/zhqnrf/ads-test.git
     ```
   - Masuk pada direktori dan buka terminal

2. **Instalasi Dependency:**
   - Jalankan perintah berikut untuk menginstal semua dependensi yang dibutuhkan:
     ```bash
     composer install
     ```
   - Kemudian, jalankan perintah berikut untuk menginstal dependency front-end:
     ```bash
     npm install
     ```

3. **Konfigurasi Environment:**
   - Salin file `.env.example` menjadi `.env` dengan perintah:
     - Untuk Linux/Unix:
       ```bash
       cp .env.example .env
       ```
     - Untuk Windows:
       ```bash
       copy .env.example .env
       ```

4. **Generate Kunci Aplikasi:**
   - Jalankan perintah berikut untuk menghasilkan kunci aplikasi:
     ```bash
     php artisan key:generate
     ```

5. **Konfigurasi Database:**
   - Buka file `.env` dan sesuaikan pengaturan koneksi database sesuai dengan konfigurasi yang Anda gunakan.
   - Ubah pengaturan database dari `sqlite` ke `mysqli`.

6. **Migrasi Database:**
   - Jalankan perintah berikut untuk melakukan migrasi database dan menyertakan data awal:
     ```bash
     php artisan migrate --seed
     ```

7. **Menjalankan Aplikasi:**
   - Jalankan server pengembangan lokal dengan perintah:
     ```bash
     php artisan serve
     ```
   - Jika terjadi error, jalankan perintah:
     ```bash
     npm run dev
     ```

8. **Akses Aplikasi:**
   - Buka browser dan akses aplikasi melalui URL [http://localhost:8000](http://localhost:8000) atau sesuai dengan URL yang ditampilkan di terminal.

Aplikasi Alfa Travel siap digunakan untuk mempermudah pemesanan perjalanan Anda!
