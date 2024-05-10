<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<?php

include_once 'layouts/header.php';
include_once 'layouts/sidebar.php';
require_once 'dbkoneksi.php';

$home = 'Home';
$title = 'Data Pasien';

$sql = "SELECT * FROM pasien";
$query = $dbh->query($sql);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="revindex.php"><?= $home ?></a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambah">Add New Data</a>
                            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form aksi="aksi_add.php" method="post" name="add">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="kode" class="form-label">Kode</label>
                                                        <input type="text" class="form-control" id="kode" name="kode">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama Pasien</label>
                                                        <input type="text" class="form-control" id="nama" name="nama">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="jenis_kelamin" class="form-label">jenis kelamin</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L">
                                                            <label class="form-check-label" for="jenis_kelamin">L</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jen" id="jenis_kelamin" value="P">
                                                            <label class="form-check-label" for="jenis_kelamin">P</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="alamat" class="form-label">Alamat</label>
                                                        <input type="text" class="form-control" id="alamat" name="alamat">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kelurahan_id" class="form-label">Kelurahan Id</label>
                                                        <input type="text" class="form-control" id="kelurahan_id" name="kelurahan_id">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" name="submit" value="Add">
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="data_pasien" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="data_pasien_info">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1" aria-sort="ascending">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Kode</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Nama Pasien</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Tempat Lahir</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Tanggal Lahir</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Jenis Kelamin</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Alamat</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    foreach ($query as $row) {
                                    ?>
                                        <tr>
                                            <td class="dtr-control sorting_1" tabindex="0"><?= $nomor++ ?></td>
                                            <td><?= $row['kode'] ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['tempat_lahir'] ?></td>
                                            <td><?= $row['tanggal_lahir'] ?></td>
                                            <td><?= $row['jenis_kelamin'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['alamat'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>">Edit</button>
                                                <a type="button" class="btn btn-danger mb-2" href="aksin_delete.php?id=<?= $row['id'] ?>&delete=delete">Delete</a>
                                            </td>
                                        </tr>
                                        <!-- Modal untuk mengedit data -->
                                        <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Data Pasien</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form aksi="aksi_edit.php" method="post">
                                                            <!-- Hidden input untuk menyimpan ID pasien -->
                                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">

                                                            <!-- Formulir untuk mengedit data -->
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="editKode" class="form-label">Kode</label>
                                                                        <input type="text" class="form-control" id="editKode" name="kode" value="<?= $row['kode'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editNama" class="form-label">Nama Pasien</label>
                                                                        <input type="text" class="form-control" id="editNama" name="nama" value="<?= $row['nama'] ?>">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="editTmpLahir" class="form-label">Tempat Lahir</label>
                                                                        <input type="text" class="form-control" id="editTmpLahir" name="tempat_lahir" value="<?= $row['tempat_lahir'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editTglLahir" class="form-label">Tanggal Lahir</label>
                                                                        <input type="date" class="form-control" id="editTglLahir" name="tanggal_lahir" value="<?= $row['tanggal_lahir'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="editjenis_kelamin" class="form-label">jenis kelamin</label>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="editjenis_kelamin" value="L" <?= ($row['jenis_kelamin'] == 'L') ? 'checked' : '' ?>>
                                                                            <label class="form-check-label" for="editjenis_kelamin">L</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="editjenis_kelamin" value="P" <?= ($row['jenis_kelamin'] == 'P') ? 'checked' : '' ?>>
                                                                            <label class="form-check-label" for="editjenis_kelaminP">P</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editEmail" class="form-label">Email</label>
                                                                        <input type="email" class="form-control" id="editEmail" name="email" value="<?= $row['email'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editAlamat" class="form-label">Alamat</label>
                                                                        <textarea class="form-control" id="editAlamat" name="alamat" rows="3"><?= $row['alamat'] ?></textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editKelurahanId" class="form-label">Kelurahan Id</label>
                                                                        <input type="text" class="form-control" id="editKelurahanId" name="kelurahan_id" value="<?= $row['kelurahan_id'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Modal untuk menambah data -->
<div class="modal fade" id="tambahdatapasien tabindex="-1" aria-labelledby="tambahdatapasienLabel" aria-hidden="true">
        <!-- Isi modal -->
    </div>

    <!-- Modal untuk mengedit data -->
    <div class="modal fade" id="editdatapasien" tabindex="-1" aria-labelledby="editdatapasienLabel" aria-hidden="true">
        <!-- Isi modal -->
    </div>

    <!-- Mengimpor script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <!-- Footer -->
    <?php include_once 'layouts/footer.php'; ?>
</body>
</html>

