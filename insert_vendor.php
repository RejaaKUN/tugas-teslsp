<?php
// Include database connection file
require_once 'koneksi.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted data
    $nama = $_POST["nama"];
    $kontak = $_POST["kontak"];
    $nama_barang = $_POST["nama_barang"];

    // Prepare the insert query
    $stmt = $conn->prepare("INSERT INTO vendor (nama, kontak, nama_barang) VALUES (?, ?, ? )");
    $stmt->bind_param("sss", $nama, $kontak, $nama_barang);
    $stmt->execute();

    // Close the database connection
    $conn->close();

    // Redirect to the inventory page
    header("Location: vendor.php");
    exit;
}
?>

<!-- Create a form to insert new data -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama"><br><br>
    <label for="Kontak">Kontak:</label>
    <input type="text" id="kontak" name="kontak"><br><br>
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" id="nama_barang" name="nama_barang"><br><br>
    <input type="submit" value="submit">
</form>