<?php
# 1. Koneksi Database
include('../koneksi.php');

# 2. Mengambil value dari setiap inputan form
$nama      = $_POST['nama'];
$tgl_lahir = $_POST['tgl'];
$jk        = $_POST['jk'];
$alamat    = $_POST['alamat'];

# 3. Validasi tanggal lahir harus lebih kecil dari hari ini
$today = date('Y-m-d');
if ($tgl_lahir >= $today) {
    // Redirect kembali ke form dengan pesan error
    header("Location: form.php?error=Tanggal lahir tidak boleh lebih dari hari ini.");
    exit;
}

# 4. Menuliskan query tambah data ke tabel pasien
$qry = mysqli_query($koneksi, "INSERT INTO pasien (Nama_PasienKlinik, Tanggal_LahirPasien, Jenis_KelaminPasien, Alamat_Pasien) VALUES ('$nama', '$tgl_lahir', '$jk', '$alamat')");

# 5. Pengalihan halaman jika proses berhasil
header('Location: index.php');
exit;
?>
