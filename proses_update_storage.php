<?php
include 'koneksi.php';

// Get the updated data from the form
$id_storage = $_POST['id_storage'];
$nama_gudang = $_POST['nama_gudang'];
$lokasi_gudang = $_POST['lokasi_gudang'];
$jenis_barang = $_POST['jenis_barang'];

// Query to update the inventory data
$sql = "UPDATE storage SET nama_gudang = '$nama_gudang', lokasi_gudang = '$lokasi_gudang', jenis_barang = '$jenis_barang' WHERE id_storage = '$id_storage'";
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