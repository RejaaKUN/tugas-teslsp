<?php
// Include database connection file
require_once 'koneksi.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted data
    $nama_gudang = $_POST["nama_gudang"];
    $lokasi_gudang = $_POST["lokasi_gudang"];
    $jenis_barang = $_POST["jenis_barang"];

    // Prepare the insert query
    $stmt = $conn->prepare("INSERT INTO storage (nama_gudang, lokasi_gudang, jenis_barang) VALUES (?, ?, ? )");
    $stmt->bind_param("sss", $nama_gudang, $lokasi_gudang, $jenis_barang);
    $stmt->execute();

    // Close the database connection
    $conn->close();

    // Redirect to the inventory page
    header("Location: storage.php");
    exit;
}
?>

<!-- Create a form to insert new data -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="nama_gudang">Nama Gudang:</label>
    <input type="text" id="nama_gudang" name="nama_gudang"><br><br>
    <label for="lokasi_gudang">Lokasi Gudang:</label>
    <input type="text" id="lokasi_gudang" name="lokasi_gudang"><br><br>
    <label for="jenis_barang">Jenis Barang:</label>
    <input type="text" id="jenis_barang" name="jenis_barang"><br><br>
    <input type="submit" value="submit">
</form>