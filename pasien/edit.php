<?php

# 1. Koneksi Database
include('../koneksi.php');

# 2. Mengambil value ID hapus
$id = $_GET['id'];

#3. Menjalankan query
$qry = mysqli_query($koneksi, "SELECT *     FROM pasien WHERE PasienKlinik_ID = '$id'");

# 4. Memisahkan field/kolom tabel pasien menjadi data array
$row = mysqli_fetch_array($qry);

$nama = $row['Nama_pasienKlinik'];
$tgl_lahir = $row['Tanggal_LahirPasien'];
$jk = $row['Jenis_KelaminPasien'];
$alamat = $row['Alamat_Pasien'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body style="background-color: #EFF5D2;">
    <?php
    include('../navbar.php');
    ?>
    <div class="container">
        <!-- disini kontennya -->
        <div class="row">
            <div class="col-10 m-auto mt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Edit Data Pasien</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= htmlspecialchars($_GET['error']) ?>
                            </div>
                        <?php endif; ?>
                        <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?= $id ?>" name="idedit" id="">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pasien</label>
                                <input type="text" value="<?= $nama ?>" class="form-control" id="nama" name="nama"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" value="<?= $tgl_lahir ?>" class="form-control" id="tgl_lahir"
                                    name="tgl" required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                <select name="jk" class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" <?= ($jk == "Laki-Laki" ? 'selected' : '') ?>>Laki-Laki
                                    </option>
                                    <option value="Perempuan" <?= ($jk == "Perempuan" ? 'selected' : '') ?>>Perempuan
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                    required><?= $alamat ?></textarea>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>