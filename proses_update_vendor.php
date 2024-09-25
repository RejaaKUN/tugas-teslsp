<?php
include 'koneksi.php';

// Get the updated data from the form
$id_vendor = $_POST['id_vendor'];
$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$nama_barang = $_POST['nama_barang'];

// Query to update the inventory data
$sql = "UPDATE vendor SET nama = '$nama', kontak = '$kontak', nama_barang = '$nama_barang' WHERE id_vendor = '$id_vendor'";
$conn->query($sql);

// Check if the update was successful
if ($conn->affected_rows > 0) {
    echo "Data berhasil diupdate";
} else {
    echo "Gagal mengupdate data";
}

// Close database connection
$conn->close();
?>