<?php
// Include database connection file
require_once 'koneksi.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted data
    $nama_barang = $_POST["nama_barang"];
    $jenis_barang = $_POST["jenis_barang"];
    $harga = $_POST["harga"];
    $kuantitas_stok = $_POST["kuantitas_stok"];
    $lokasi_gudang = $_POST["lokasi_gudang"];
    $serial_number = $_POST["serial_number"];

    // Prepare the insert query
    $stmt = $conn->prepare("INSERT INTO inventory (nama_barang, jenis_barang, harga, kuantitas_stok, lokasi_gudang, serial_number) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nama_barang, $jenis_barang, $harga, $kuantitas_stok, $lokasi_gudang, $serial_number);
    $stmt->execute();

    // Close the database connection
    $conn->close();

    // Redirect to the inventory page
    header("Location: inventory.php");
    exit;
}
?>

<!-- Create a form to insert new data -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" id="nama_barang" name="nama_barang"><br><br>
    <label for="jenis_barang">Jenis Barang:</label>
    <input type="text" id="jenis_barang" name="jenis_barang"><br><br>
    <label for="harga">Harga Barang:</label>
    <input type="text" id="harga" name="harga"><br><br>
    <label for="kuantitas_stok">Kuantitas Stok:</label>
    <input type="number" id="kuantitas_stok" name="kuantitas_stok"><br><br>
    <label for="lokasi_gudang">Lokasi Gudang:</label>
    <input type="text" id="lokasi_gudang" name="lokasi_gudang"><br><br>
    <label for="serial_number">Serial Number:</label>
    <input type="text" id="serial_number" name="serial_number"><br><br>
    <input type="submit" value="submit">
</form>