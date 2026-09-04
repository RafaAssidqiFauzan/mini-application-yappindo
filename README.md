# Panduan Penggunaan Aplikasi Web Inventaris Barang

Dokumen ini berisi panduan lengkap mengenai tata cara penggunaan aplikasi web inventaris barang berbasis Laravel. Panduan ini disusun secara runtut untuk membantu pengguna memahami setiap langkah operasional aplikasi, mulai dari pengaksesan awal, manajemen akun, hingga pengelolaan data inventaris di dalam dashboard secara mandiri.

---

## 1. Pengaksesan Awal dan Navigasi Landing Page

Aplikasi diawali dari halaman utama yang berfungsi sebagai pintu masuk publik. Saat pengguna membuka alamat web aplikasi melalui browser, sistem akan langsung menampilkan halaman landing page. Pada halaman ini, pengguna disajikan informasi awal mengenai aplikasi beserta dua opsi navigasi utama pada bagian atas atau bilah menu, yaitu tombol **Login** dan tombol **Register**. Pengguna yang sudah memiliki akun dapat langsung memilih menu Login, sedangkan pengguna baru yang belum terdaftar dianjurkan untuk memilih menu Register terlebih dahulu.

---

## 2. Panduan Pendaftaran Akun Baru (Registrasi)

Bagi pengguna baru yang belum memiliki hak akses, proses pendaftaran dilakukan melalui halaman registrasi dengan langkah-langkah berikut:

1. Klik tombol **Register** pada halaman landing page.
2. Pengguna akan diarahkan ke form pendaftaran yang meminta pengisian data identitas berupa nama lengkap, alamat email aktif, kata sandi (*password*), serta konfirmasi kata sandi.
3. Setelah seluruh kolom terisi dengan benar, klik tombol **Register** atau **Daftar** di bawah form untuk mengirimkan data.
4. Sistem akan melakukan validasi data secara otomatis. Jika data valid dan email belum pernah terdaftar sebelumnya, akun baru akan dibuat dan sistem akan mengarahkan pengguna ke halaman login disertai pesan konfirmasi bahwa pendaftaran telah berhasil.
5. Apabila pengguna ingin membatalkan proses pendaftaran dan kembali ke halaman awal, pengguna dapat mengklik tombol **Kembali ke Landing Page** yang tersedia di halaman tersebut.

---

## 3. Panduan Masuk ke Aplikasi (Login)

Proses masuk ke dalam sistem dilakukan untuk mendapatkan hak akses pengelolaan inventaris melalui langkah-langkah berikut:

1. Klik tombol **Login** pada halaman landing page atau akses halaman login setelah melakukan registrasi.
2. Masukkan alamat email dan kata sandi yang telah terdaftar pada kolom yang tersedia.
3. Klik tombol **Login** atau **Masuk** untuk memverifikasi kredensial akun.
4. Jika kombinasi email dan kata sandi benar, sistem akan membuat sesi baru dan secara otomatis mengarahkan pengguna ke halaman **Dashboard Inventaris**.
5. Jika kombinasi email atau kata sandi salah, sistem akan menampilkan notifikasi peringatan di layar dan meminta pengguna memasukkan kembali data yang sesuai.
6. Sama seperti halaman registrasi, pengguna juga dapat memanfaatkan tombol **Kembali ke Landing Page** jika ingin membatalkan proses login.

---

## 4. Panduan Pengelolaan Inventaris di Dashboard

Setelah berhasil masuk, pengguna dialihkan ke halaman dashboard utama yang merupakan pusat seluruh aktivitas manajemen barang. Di halaman ini, pengguna dapat melakukan berbagai operasi pengolahan data inventaris:

* **Melihat Daftar Barang:** Tabel utama di dashboard menampilkan seluruh koleksi barang yang tersimpan di dalam basis data, lengkap dengan nama barang, kategori, serta indikator status pengecekan (*check status*).
* **Menambahkan Barang Baru:** Untuk menambah data, pengguna dapat mengisi form penambahan barang yang berada di bagian atas atau samping tabel. Masukkan nama barang, pilih kategori yang sesuai, lalu klik tombol **Tambah** atau **Simpan**. Data baru akan secara otomatis muncul pada daftar tabel setelah halaman diperbarui.
* **Memperbarui Data dan Status Barang:** Pengguna dapat mengubah rincian barang atau menandai barang yang sudah diperiksa. Klik tombol **Edit** atau centang indikator status pada baris barang yang ingin diperbarui, sesuaikan data pada kolom yang tersedia, lalu simpan perubahan tersebut.
* **Menghapus Data Barang:** Apabila terdapat catatan barang yang sudah tidak diperlukan lagi, pengguna dapat mengklik tombol **Hapus** pada baris barang yang bersangkutan. Sistem akan menampilkan jendela konfirmasi untuk memastikan bahwa tindakan penghapusan memang disengaja sebelum data benar-benar dihapus dari basis data.

---

## 5. Panduan Keluar dari Aplikasi (Logout)

Demi menjaga keamanan akun dan mencegah akses tidak sah oleh pihak lain pada perangkat yang sama, pengguna sangat disarankan untuk selalu keluar dari sistem setelah selesai menggunakan aplikasi.

1. Buka halaman dashboard tempat pengguna sedang aktif bekerja.
2. Cari dan klik tombol **Logout** atau **Keluar** yang terletak pada bilah navigasi bagian atas (navbar).
3. Setelah tombol diklik, sistem akan secara otomatis menghentikan dan menghancurkan sesi login pengguna yang sedang berjalan.
4. Pengguna akan secara aman dikembalikan ke halaman **Login** dan tidak lagi memiliki akses ke halaman dashboard sebelum melakukan proses login ulang.
