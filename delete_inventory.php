<?php
include 'koneksi.php';

// Get the id_inventory from the URL parameter
$id_inventory = $_GET['id_inventory'];

// Query to delete the inventory data
$sql = "DELETE FROM inventory WHERE id_inventory = '$id_inventory'";
$conn->query($sql);

// Check if the deletion was successful
if ($conn->affected_rows > 0) {
    echo "Data berhasil dihapus";
} else {
    echo "Gagal menghapus data";
}

// Close database connection
$conn->close();
?>