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
    $tmp_lahir = $_POST['alamat'];
    $tgl_lahir = $_POST['email'];
    $gender = $_POST['tanggal_lahir'];

    // Query untuk update data unit_farmasi berdasarkan ID
    $query = "UPDATE unit_farmasi SET kode = :kode, nama = :nama, alamat = :email, email = :email tanggal_lahir = :tanggal_lahir, WHERE id = :id";

    // Persiapkan statement
    $stmt = $dbh->prepare($query);

    // Bind parameter
    $stmt->bindParam(':kode', $kode);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tanggal_lahir', $tgl_lahir);

    // Jalankan statement
    if ($stmt->execute()) {
        // Jika berhasil, redirect kembali ke halaman data unit_farmasi
        header("Location: unit_farmasi.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal mengedit data unit farmasi.";
    }
}
?>