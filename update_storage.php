<?php
include 'koneksi.php';

// Check if the id_storage parameter is present in the URL
if (isset($_GET['id_storage'])) {
    $id_storage = $_GET['id_storage'];

    // Query to select the specific inventory data
    $sql = "SELECT * FROM storage WHERE id_storage = '$id_storage'";
    $result = $conn->query($sql);

    // Check if the data exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan";
        exit;
    }
} else {
    echo "ID storage tidak ditemukan";
    exit;
}

// Display the update form
?>
<div class="main-content">
    <header>
        <h1>Update Storage</h1>
    </header>
    <section>
        <h2>Update Data Storage</h2>
        <form action="proses_update_storage.php" method="post">
            <label for="id_storage">ID:</label>
            <input type="text" id="id_storage" name="id_storage" value="<?php echo $row["id_storage"]; ?>" required><br><br>
            
            <label for="nama_gudang">Nama Gudang:</label>
            <input type="text" id="nama_gudang" name="nama_gudang" value="<?php echo $row["nama_gudang"]; ?>" required><br><br>

            <label for="jenis_barang">Jenis Barang:</label>
            <input type="text" id="jenis_barang" name="jenis_barang" value="<?php echo $row["jenis_barang"]; ?>" required><br><br>

            <label for="lokasi_gudang">Lokasi:</label>
            <select name="lokasi_gudang" id="lokasi_gudang">
            <option value="<?php echo $row["lokasi_gudang"]; ?>"><?php echo $row["lokasi_gudang"]; ?></option>
            <option value="Gresik">Gresik</option>
            <option value="Sidoarjo">Sidoarjo</option>
            <option value="Malang">Malang</option>
            <option value="Lamongan">lamongan</option>
            <option value="Mojokerto">mojokerto</option><br><br>

            <input type="submit" name="submit" value="Update Data">
        </form>
    </section>
</div>