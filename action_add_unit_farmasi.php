<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<?php
require_once("dbkoneksi.php");

if (isset($_POST['submit'])) {
    $kode = htmlspecialchars($_POST['kode']);
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $email = htmlspecialchars($_POST['email']);
    $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);

    // Check for empty fields
    if (empty($kode) || empty($nama) || empty($alamat) || empty($tanggal_lahir)) {
        // Handle empty fields
        echo "<p><font color='red'>All fields are required!</font></p>";
    } else {
        // If all fields are filled, insert data into database
        $query = "INSERT INTO unit_farmasi (kode, nama, alamat, tgl_lahir,) VALUES (:kode, :nama, :alamat, :tgl_lahir)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':kode', $kode);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':tempat_lahir', $tempat_lahir);
        $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
        $stmt->bindParam(':jenis_kelamin', $gender);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':kelurahan_id', $kelurahan_id);        

        if ($stmt->execute()) {
            header("Location: data_pasien.php");
        } else {
            echo "<p><font color='red'>Failed to add data.</font></p>";
        }
        
    }
}
?>