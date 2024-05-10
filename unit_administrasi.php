<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Unit Administrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
        include_once 'layouts/header.php';
        include_once 'layouts/sidebar.php';
        require_once 'dbkoneksi.php';

        $home = 'Home';
        $title = 'Data Unit Administrasi';

        $sql = "SELECT * FROM unit_administrasi LIMIT 5";
        $query = $dbh->query($sql);
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="content-wrapper">
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
                        </div>
                    </section>

                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><?= $title ?></h3>
                                        </div>
                                        <div class="card-body">
                                            <a type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahUnitAdministrasi">Add New Data</a>
                                            <table id="data_unit_administrasi" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID</th>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Alamat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $nomor = 1;
                                                    foreach ($query as $row) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $nomor++ ?></td>
                                                            <td><?= $row['id'] ?></td>
                                                            <td><?= $row['nama'] ?></td>
                                                            <td><?= $row['email'] ?></td>
                                                            <td><?= $row['alamat'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk menambah data -->
    <div class="modal fade" id="tambahUnitAdministrasi" tabindex="-1" aria-labelledby="tambahUnitAdministrasiLabel" aria-hidden="true">
        <!-- Isi modal -->
    </div>

    <!-- Modal untuk mengedit data -->
    <div class="modal fade" id="editUnitAdministrasi" tabindex="-1" aria-labelledby="editUnitAdministrasiLabel" aria-hidden="true">
        <!-- Isi modal -->
    </div>

    <!-- Mengimpor script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <!-- Footer -->
    <?php include_once 'layouts/footer.php'; ?>
</body>
</html>
