<?php
include 'koneksi.php';

// Get the updated data from the form
$id_inventory = $_POST['id_inventory'];
$nama_barang = $_POST['nama_barang'];
$jenis_barang = $_POST['jenis_barang'];
$harga = $_POST['harga'];
$kuantitas_stok = $_POST['kuantitas_stok'];
$serial_number = $_POST['serial_number'];
$lokasi_gudang = $_POST['lokasi_gudang'];

// Query to update the inventory data
$sql = "UPDATE inventory SET nama_barang = '$nama_barang', jenis_barang = '$jenis_barang', harga = '$harga', kuantitas_stok = '$kuantitas_stok', serial_number = '$serial_number', lokasi_gudang = '$lokasi_gudang' WHERE id_inventory = '$id_inventory'";
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