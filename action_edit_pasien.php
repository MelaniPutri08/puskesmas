<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<?php
session_start();

require_once('dbkoneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim melalui form
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $tmp_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tanggal_lahir'];
    $gender = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $kelurahan_id = $_POST['kelurahan_id'];

    // Query untuk update data pasien berdasarkan ID
    $query = "UPDATE pasien SET kode = :kode, nama = :nama, tempat_lahir = :tempat_lahir, tanggal_lahir = :tanggal_lahir, jenis_kelamin = :jenis_kelamin, email = :email, alamat = :alamat, kelurahan_id = :kelurahan_id WHERE id = :id";

    // Persiapkan statement
    $stmt = $dbh->prepare($query);

    // Bind parameter
    $stmt->bindParam(':kode', $kode);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':tempat_lahir', $tempat_lahir);
    $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
    $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':kelurahan_id', $kelurahan_id);
    $stmt->bindParam(':id', $id);

    // Jalankan statement
    if ($stmt->execute()) {
        // Jika berhasil, redirect kembali ke halaman data pasien
        header("Location: data_pasien.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal mengedit data pasien.";
    }
}
?>