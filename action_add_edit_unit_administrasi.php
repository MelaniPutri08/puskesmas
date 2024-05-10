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
    $kode = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $akamat = $_POST['alamat'];

    // Query untuk update data dokter berdasarkan ID
    $query = "UPDATE unit_administrasi SET kode = :kode, nama = :nama, email = :alamat, alamat = :alamat = WHERE id = :id";

    // Persiapkan statement
    $stmt = $dbh->prepare($query);

    // Bind parameter
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':alamat', $alamat);

    // Jalankan statement
    if ($stmt->execute()) {
        // Jika berhasil, redirect kembali ke halaman data unit administrasi
        header("Location: unit_administrasi.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal mengedit data unit Administrasi.";
    }
}
?>