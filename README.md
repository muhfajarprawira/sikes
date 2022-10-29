#sikes

Sistem INFORMSASI KESEHATAN ini menggunakan Framework PHP Codeigniter versi 3

Fiturnya apa saja sih?

Untuk fiturnya masih sangat sederhana, contohnya sebagai berikut:

- Data Pegawai

ini saya membuat fitur untuk menambah, mengubah dan menghapus data Pegawai.

- Data Pasien

ini saya membuat fitur untuk menambah, mengubah dan menghapus data Pasien.

- Data Obat

ini saya membuat fitur untuk menambah, mengubah dan menghapus data Obat.

- Data Dokter

ini saya membuat fitur untuk menambah, mengubah dan menghapus data Dokter.

- Jadwal Praktek Dokter

ini saya membuat fitur untuk menambah, mengubah dan menghapus data Jadwal Praktek Dokter.

Instalasi & Konfigurasi
Untuk cara instalasi dan konfigurasi caranya sangat mudah

Kalian download atau clone repositori ini

- Copy Paste Filenya di xampp/htdocs/disni

- Buat Databse di phpmyadmin dengan nama sikes_db, setelah itu import db dari folder yang bernama sikes_db.sql

- Aktifkan apache & mysql server pada software XAMPP, bagi yang menggunakan OS Windows selanjutnya akses http://localhost/sikes/ 

- Untuk nama folder silahkan kalian ganti sesuai nama folder dari aplikasi ini di komputer atau laptop kalian

- Untuk login kalian bisa menggunakan username = admin@gmail.com dan password 1234

Bagi yang error, bisa pakai cara ini :

- buka file config.php pada Code Igniter, letaknya di public_html/application/config. Kemudian search = $config[‘sess_save_path’] = NULL dan ubah nilai NULL tersebut menjadi = sys_get_temp_dir();

Dan untuk yang masih error dengan menggunakan php versi 8 :
Tambah kan ini

#[\ReturnTypeWillChange]

di semua methods (open, read, write, close, destroy dan gc) di file Session_files_driver.php dan directory dfile nya system/libaries/Session/drivers/Session_files_driver.php

jadi nanti seperti ini :

#[\ReturnTypeWillChange]
public function open($save_path, $name)
{
   ...
}

#[\ReturnTypeWillChange]
public function read($session_id)
{
  ...
}

#[\ReturnTypeWillChange]
public function write($session_id, $session_data)
{
  ...
}

#[\ReturnTypeWillChange]
public function close()
{
  ...
}

#[\ReturnTypeWillChange]
public function destroy($session_id)
{
  ...
}

#[\ReturnTypeWillChange]
public function gc($maxlifetime)
{
  ...
}

restart xampp, done
