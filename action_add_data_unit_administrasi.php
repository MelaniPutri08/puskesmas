<?php
require_once("dbkoneksi.php");

if (isset($_POST['submit'])) {
    $kode = htmlspecialchars($_POST['id']);
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['email']); // Perbaikan: variabel $email
    $email = htmlspecialchars($_POST['alamat']); // Perbaikan: variabel $alamat

    // Check for empty fields
    if (empty($id) || empty($nama) || empty($email) || empty($alamat)) {
        // Handle empty fields
        echo "<p><font color='red'>All fields are required!</font></p>";
    } else {
        // If all fields are filled, insert data into database
        $query = "INSERT INTO unit_administrasi (id, nama, email, alamat) VALUES (:id, :nama, :email, :alamat)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':alamat', $alamat);   

        if ($stmt->execute()) {
            header("Location: unit_administrasi.php");
            exit(); // Perlu untuk menghentikan eksekusi skrip setelah mengarahkan ke halaman lain
        } else {
            echo "<p><font color='red'>Failed to add data.</font></p>";
        }
        
    }
}
?>
