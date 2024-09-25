<?php
include 'koneksi.php';

if (!$conn) {
    die('Database connection failed.');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing data for the selected record (optional, can be removed)
    $query = "SELECT * FROM storage WHERE id_storage = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die('Record not found.');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Delete record
        $delete_query = "DELETE FROM storage WHERE id_storage = '$id'";

        if (mysqli_query($conn, $delete_query)) {
            header('Location: storage.php'); // Redirect to the main dashboard
            exit();
        } else {
            echo '<p>Error deleting record: ' . mysqli_error($conn) . '</p>';
        }
    }
} else {
    die('No ID specified.');
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Barang</title>
</head>
<body>
    <h1>Delete Barang</h1>
    <form method="POST" action="">
        <p>Apakah Anda yakin ingin menghapus barang dengan nama "<strong><?php echo htmlspecialchars($row['nama_barang']); ?></strong>"?</p>
        <input type="submit" value="Delete">
    </form>
</body>
</html>