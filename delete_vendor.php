<?php
include 'koneksi.php';

// Check if the id_storage parameter is present in the URL
if (isset($_GET['id_vendor'])) {
    $id_vendor = $_GET['id_vendor'];

    // Query to delete the inventory data
    $sql = "DELETE FROM vendor WHERE id_vendor = '$id_vendor'";
    $conn->query($sql);

    // Check if the deletion was successful
    if ($conn->affected_rows > 0) {
        echo "Data berhasil dihapus";
    } else {
        echo "Gagal menghapus data";
    }
} else {
    echo "ID vendor tidak ditemukan";
}

// Close database connection
$conn->close();
?>