<?php
include 'koneksi.php';

// Check if the id_storage parameter is present in the URL
if (isset($_GET['id_storage'])) {
    $id_storage = $_GET['id_storage'];

    // Query to delete the inventory data
    $sql = "DELETE FROM storage WHERE id_storage = '$id_storage'";
    $conn->query($sql);

    // Check if the deletion was successful
    if ($conn->affected_rows > 0) {
        echo "Data berhasil dihapus";
    } else {
        echo "Gagal menghapus data";
    }
} else {
    echo "ID storage tidak ditemukan";
}

// Close database connection
$conn->close();
?>