<?php
include 'koneksi.php';

if (!$conn) {
    die('Database connection failed.');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch the existing data for the selected record
    $query = "SELECT * FROM inventory WHERE id_inventory = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die('Record not found.');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Update record
        $nama_barang = mysqli_real_escape_string($conn, $_POST['nama_barang']);
        $update_query = "UPDATE inventory SET nama_barang = '$nama_barang' WHERE id_inventory = '$id'";

        if (mysqli_query($conn, $update_query)) {
            header('Location: inventory.php'); // Redirect to the main dashboard
            exit();
        } else {
            echo '<p>Error updating record: ' . mysqli_error($conn) . '</p>';
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
    <title>Update Barang</title>
</head>
<body>
    <h1>Update Barang</h1>
    <form method="POST" action="">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" value="<?php echo htmlspecialchars($row['nama_barang']); ?>" required>
        <input type="submit" value="Update">
    </form>
</body>
</html>