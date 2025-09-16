<?php

# 1. Koneksi Database
include('../koneksi.php');

# 2. Mengambil value ID hapus
$id = $_GET['id'];

#3. Menjalankan query hapus
$qry = mysqli_query($koneksi, "DELETE FROM poli WHERE Poli_id = '$id'");

#4. Pengalihan halaman jika proses hapus berhasil
header('Location: index.php');

?>