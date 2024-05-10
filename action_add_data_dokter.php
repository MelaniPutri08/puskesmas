<?php
require_once("dbkoneksi.php");

if (isset($_POST['submit'])) {
    $kode = htmlspecialchars($_POST['kode']);
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']); // Perbaikan: variabel $alamat
    $email = htmlspecialchars($_POST['email']); // Perbaikan: variabel $email
    $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']); // Perbaikan: variabel $tgl_lahir

    // Check for empty fields
    if (empty($kode) || empty($nama) || empty($alamat) || empty($email) || empty($tgl_lahir)) {
        // Handle empty fields
        echo "<p><font color='red'>All fields are required!</font></p>";
    } else {
        // If all fields are filled, insert data into database
        $query = "INSERT INTO dokter (kode, nama, alamat, email, tgl_lahir) VALUES (:kode, :nama, :alamat, :email, :tgl_lahir)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':kode', $kode);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tgl_lahir', $tgl_lahir);      

        if ($stmt->execute()) {
            header("Location: data_dokter.php");
            exit(); // Perlu untuk menghentikan eksekusi skrip setelah mengarahkan ke halaman lain
        } else {
            echo "<p><font color='red'>Failed to add data.</font></p>";
        }
        
    }
}
?>
