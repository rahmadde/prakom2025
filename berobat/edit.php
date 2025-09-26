<?php

# 1. Koneksi Database
include('../koneksi.php');

# 2. Mengambil value ID hapus
$id = $_GET['id'];

#3. menjalankan query hapus
$qry = mysqli_query($koneksi, "SELECT * FROM berobat WHERE No_Transaksi = '$id'");

#4. memisahkan field/kolom tabel pasien menjadi data array
$row = mysqli_fetch_array($qry);

$trans = $row["No_Transaksi"];
$pasien = $row["PasienKlinik_ID"];

$tgl_berobat = $row["Tanggal_Berobat"];
$pecah_tgl = explode("-", $tgl_berobat);
$thn = $pecah_tgl[0];
$bln = $pecah_tgl[1];
$tgl = $pecah_tgl[2];

$dokter = $row["Dokter_ID"];
$keluhan = $row["Keluhan_Pasien"];
$biaya = $row["Biaya_Adm"];

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
                        <h3 class="mb-0">Edit Data Berobat</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="proses_edit.php">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No Transaksi</label>
                                <input value="<?= $trans ?>" readonly name="trans" type="text" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Nama Pasien</label>
                                <select name="pasien" class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Pasien</option>
                                    <?php
                                    include('../koneksi.php');
                                    $qry = mysqli_query($koneksi, "SELECT * FROM pasien");
                                    foreach ($qry as $row) {
                                        ?>
                                        <option <?php echo ($pasien == $row['pasienKlinik_ID']) ? 'selected' : '' ?>
                                            value="<?= $row['pasienKlinik_ID'] ?>"><?= $row['Nama_pasienKlinik'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Berobat</label>
                                <div class="row">
                                    <div class="col-4">
                                        <select class="form-control" name="tgl" id="">
                                            <option value="">Pilih Tanggal</option>
                                            <?php
                                            for ($i = 1; $i <= 31; $i++) {
                                                ?>
                                                <option <?php echo ($tgl == $i) ? 'selected' : '' ?> value="<?= $i ?>">
                                                    <?= $i ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="bln" id="">
                                            <option value="">Pilih Bulan</option>
                                            <?php
                                            $bulan = array(
                                                1 => 'Januari',
                                                2 => 'Februari',
                                                3 => 'Maret',
                                                4 => 'April',
                                                5 => 'Mei',
                                                6 => 'Juni',
                                                7 => 'Juli',
                                                8 => 'Agustus',
                                                9 => 'September',
                                                10 => 'Oktober',
                                                11 => 'November',
                                                12 => 'Desember'
                                            );

                                            foreach ($bulan as $k => $v) {
                                                ?>
                                                <option <?php echo ($bln == $k) ? 'selected' : '' ?> value="<?= $k ?>">
                                                    <?= $v ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <input value="<?= $thn ?>" type="number" class="form-control" name="thn"
                                            placeholder="Masukkan Tahun" id="">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Nama Dokter</label>
                                <select name="dokter" class="form-select" aria-label="Default select example">
                                    <option selected>Pilih Dokter</option>
                                    <?php
                                    include('../koneksi.php');
                                    $qry = mysqli_query($koneksi, "SELECT * FROM dokter");
                                    foreach ($qry as $row) {
                                        ?>
                                        <option <?php echo ($dokter == $row['Dokter_ID']) ? 'selected' : '' ?>
                                            value="<?= $row['Dokter_ID'] ?>"><?= $row['Nama_Dokter'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Keluhan Pasien</label>
                                <input value="<?= $keluhan ?>" name="keluhan" type="text" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Biaya Administrasi</label>
                                <input value="<?= $biaya ?>" name="biaya" type="number" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
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