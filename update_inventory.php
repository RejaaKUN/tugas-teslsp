<?php
include 'koneksi.php';

// Get the id_inventory from the URL parameter
$id_inventory = $_GET['id_inventory'];

// Query to select the specific inventory data
$sql = "SELECT * FROM inventory WHERE id_inventory = '$id_inventory'";
$result = $conn->query($sql);

// Check if the data exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan";
    exit;
}

// Display the update form
?>
<form action="proses_update.php" method="post">
    <label for="id_inventory">ID:</label>
    <input type="text" id="id_inventory" name="id_inventory" value="<?php echo $row["id_inventory"]; ?>" required><br><br>
    
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $row["nama_barang"]; ?>" required><br><br>

    <label for="jenis_barang">Jenis Barang:</label>
    <input type="text" id="jenis_barang" name="jenis_barang" value="<?php echo $row["jenis_barang"]; ?>" required><br><br>

    <label for="harga">Harga Barang:</label>
    <input type="text" id="harga" name="harga" value="<?php echo $row["harga"]; ?>" required><br><br>

    <label for="kuantitas_stok">Kuantitas Stok:</label>
    <input type="text" id="kuantitas_stok" name="kuantitas_stok" value="<?php echo $row["kuantitas_stok"]; ?>" required><br><br>

    <label for="serial_number">Serial Number:</label>
    <input type="text" id="serial_number" name="serial_number" value="<?php echo $row["serial_number"]; ?>" required><br><br>

    <label for="lokasi_gudang">Lokasi:</label>
    <select name="lokasi_gudang" id="lokasi_gudang">
    <option value="<?php echo $row["lokasi_gudang"]; ?>"><?php echo $row["lokasi_gudang"]; ?></option>
    <option value="Gresik">Gresik</option>
    <option value="Sidoarjo">Sidoarjo</option>
    <option value="Malang">Malang</option><br><br>

    <input type="submit" name="submit" action="inventory.php">
</form>