# Database Kuliner

File ini berisi dump SQL untuk database yang berhubungan dengan data kuliner. Database ini dapat digunakan untuk mengelola informasi terkait kuliner, seperti restoran, menu, atau kategori makanan.

## Struktur Database

Struktur database berikut mencakup tabel-tabel utama yang ada dalam file SQL ini:

- **Tabel 1**: [Nama Tabel]  
  Deskripsi tabel dan kolomnya.
- **Tabel 2**: [Nama Tabel]  
  Deskripsi tabel dan kolomnya.
- Tambahkan sesuai jumlah tabel.

*(Detail tabel dapat diperinci setelah analisis mendalam pada file SQL)*

## Prasyarat

Untuk menggunakan file ini, pastikan Anda memiliki:

- Server database MariaDB atau MySQL
- Akses ke phpMyAdmin (opsional) atau alat lain untuk mengimpor file SQL

## Clone Repository

Untuk mendapatkan file ini, Anda dapat meng-clone repository dengan perintah berikut:

```bash
git clone [URL_REPOSITORY]
```

Ganti `[URL_REPOSITORY]` dengan URL repository GitHub Anda.

## Cara Menggunakan

1. Pastikan server database Anda aktif.
2. Impor file SQL ini menggunakan perintah berikut di terminal atau antarmuka database:

   ```bash
   mysql -u [username] -p [nama_database] < db_kuliner.sql
   ```

   Ganti `[username]` dengan nama pengguna database Anda, dan `[nama_database]` dengan nama database yang ingin Anda gunakan.

3. Setelah impor berhasil, Anda dapat menjalankan query untuk mengelola data.

## Catatan

- File SQL ini dibuat menggunakan phpMyAdmin versi 5.2.0 dan kompatibel dengan MariaDB versi 10.4.24.
- Pastikan Anda telah membuat backup database sebelum mengimpor.

## Kontribusi

Jika Anda ingin menambahkan atau memperbarui data, silakan buat pull request. Pastikan Anda mengikuti standar penulisan SQL yang konsisten.

## Lisensi

Proyek ini dilisensikan di bawah [NOVITASARI License].

