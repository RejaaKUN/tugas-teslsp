<?php
include 'koneksi.php';

// Check if the id_storage parameter is present in the URL
if (isset($_GET['id_vendor'])) {
    $id_vendor = $_GET['id_vendor'];

    // Query to select the specific inventory data
    $sql = "SELECT * FROM vendor WHERE id_vendor = '$id_vendor'";
    $result = $conn->query($sql);

    // Check if the data exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan";
        exit;
    }
} else {
    echo "ID vendor tidak ditemukan";
    exit;
}

// Display the update form
?>
<div class="main-content">
    <header>
        <h1>Update Vendor</h1>
    </header>
    <section>
        <h2>Update Data Vendor</h2>
        <form action="proses_update_vendor.php" method="post">
            <label for="id_vendor">ID:</label>
            <input type="text" id="id_vendor" name="id_vendor" value="<?php echo $row["id_vendor"]; ?>" required><br><br>
            
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $row["nama"]; ?>" required><br><br>

            <label for="kontak">Kontak:</label>
            <input type="text" id="kontak" name="kontak" value="<?php echo $row["kontak"]; ?>" required><br><br>

            <label for="nama_barang">Nama Barang:</label>
            <input type="nama_barang" id="nama_barang" name="nama_barang" value="<?php echo $row["nama_barang"]; ?>" required><br><br>

            <input type="submit" name="submit" value="Update Data">
        </form>
    </section>
</div>