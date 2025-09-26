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
                        <h3 class="mb-0">Data Berobat</h3>
                    </div>

                    <div class="card-body">
                        <a href="cetak.php" target="_blank" class="btn btn-primary">Print</a>
                        <table class="table table-striped mt-2">
                            <thead>
                                <tr class="">
                                    <th scope="col">No Transaksi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Usia</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Keluhan</th>
                                    <th scope="col">Nama Poli</th>
                                    <th scope="col">Dokter</th>
                                    <th scope="col">Biaya Administrasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #1. koneksi database
                                include('../koneksi.php');

                                #2. query sql
                                $qry = "SELECT * FROM berobat 
                                INNER JOIN pasien ON berobat.PasienKlinik_ID=pasien.pasienKlinik_ID
                                INNER JOIN dokter ON berobat.Dokter_ID=dokter.Dokter_ID
                                INNER JOIN poli ON dokter.Poli_ID=poli.Poli_ID";

                                #3. Menjalankan query
                                $result = mysqli_query($koneksi, $qry);

                                # Nomor Otoamtis
                                $no = 1;

                                #4. Looping data
                                foreach ($result as $row) {
                                    // Format ulang Tanggal Berobat
                                    $tgl_berobat = date_create($row['Tanggal_Berobat']);
                                    $tgl_berobat = date_format($tgl_berobat, 'd/m/Y');

                                    // Usia Pasien
                                    $tanggal_lahir = new DateTime($row['Tanggal_LahirPasien']);
                                    $sekarang = new DateTime("now");
                                    $usia = $sekarang->diff($tanggal_lahir)->y;

                                    // Format biaya jadi rupiah dan ada pemisah ribuan
                                    $biaya_adm = $row['Biaya_Adm'];
                                    $biaya_adm = number_format($biaya_adm, 0, ',', '.');
                                    ?>
                                    <tr>
                                        <td><?= $row['No_Transaksi'] ?></td>
                                        <td><?= $tgl_berobat ?></td>
                                        <td><?= $row['Nama_pasienKlinik'] ?></td>
                                        <td><?= $usia ?></td>
                                        <td><?= $row['Jenis_KelaminPasien'] ?></td>
                                        <td><?= $row['Keluhan_Pasien'] ?></td>
                                        <td><?= $row['Nama_Poli'] ?></td>
                                        <td><?= $row['Nama_Dokter'] ?></td>
                                        <td>Rp <?= $biaya_adm ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
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