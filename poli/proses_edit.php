<?php
###### PROSES TAMBAH DATA ######
#1. koneksi ke database
include("../koneksi.php");

#2. mengambil value dari setiap input
$id = $_POST['idedit'];
$nama = $_POST["nama"];

#3. menuliskan query tambah data ke tabel
$qry = mysqli_query($koneksi, "UPDATE poli SET nama_poli='$nama' WHERE Poli_id='$id'");

#5. pengalihan halaman jika proses tambah selesai
header("location:index.php");
?>