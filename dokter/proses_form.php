<?php
# 1. Koneksi Database
include('../koneksi.php');

# 2. Mengambil value dari setiap inputan form
$nama = $_POST['nama'];
$poli = $_POST['poli'];

# 4. Menuliskan query tambah data ke tabel pasien
$qry = mysqli_query($koneksi, "INSERT INTO dokter (Nama_Dokter, Poli_ID) VALUES ('$nama', '$poli')");

# 5. Pengalihan halaman jika proses berhasil
header('Location: index.php');
exit;
?>