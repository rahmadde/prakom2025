<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
                        <h3 class="mb-0">Data Pasien</h3>
                        <a href="form.php" class="btn btn-primary">Tambah Data</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped mt-2">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #1. koneksi database
                                include('../koneksi.php');

                                #2. query sql
                                $qry = "SELECT * FROM pasien";

                                #3. Menjalankan query
                                $result = mysqli_query($koneksi,$qry);

                                # Nomor Otoamtis
                                $no = 1;

                                #4. Looping data
                                foreach($result as $row){
                                    $tgl_lahir = date_create($row['Tanggal_LahirPasien']);
                                    $tgl_lahir = date_format($tgl_lahir, 'D, d F Y');
                                ?>
                                <tr>
                                    <th scope="row"><?=$no++ ?></th>
                                    <td><?=$row['Nama_PasienKlinik']?></td>
                                    <td><?=$tgl_lahir   ?></td>
                                    <td><?=$row['Jenis_KelaminPasien']?></td>
                                    <td><?=$row['Alamat_Pasien']?></td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-warning me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$row['Politeknik_ID']?>">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <div class="modal fade" id="exampleModal<?=$row['Politeknik_ID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin data pasien <?=$row['Nama_PasienKlinik']?> ingin dihapus?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <a href="hapus.php?id=<?=$row['Politeknik_ID']?>" class="btn btn-danger">Hapus</a>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>