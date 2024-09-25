<?php
// Include database connection file
require_once 'koneksi.php';

// Prepare query to select all data from the inventory table
$stmt = $conn->prepare("SELECT * FROM inventory");
$stmt->execute();
$inventory = $stmt->get_result();

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="dash.css"> <!-- Sesuaikan dengan file CSS Anda -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .low-stock {
            background-color: #ffc080; /* Yellow background for low stock */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Inventory</h2>
        <ul>
            <li><a href="inventory.php"><i class="fas fa-building"></i> Inventory</a></li>
            <li><a href="storage.php"><i class="fas fa-user-graduate"></i> Storage</a></li>
            <li><a href="vendor.php"><i class="fas fa-book"></i> Vendor</a></li>
            <li><a href="insert_inventory.php"><i class="fas fa-plus"></i> Tambahkan Data Baru</a></li>
            <li><a href="logout.php"><i class="fas fa-book"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h1>Inventory</h1>
        </header>
        <table>
            <thead>
                <tr>
                    <th>Id Inventory</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Harga Barang</th>
                    <th>Kuantitas Stok</th>
                    <th>Lokasi</th>
                    <th>Serial Number</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any data returned
                if ($inventory->num_rows > 0) {
                    // Display data in a table
                    while ($row = $inventory->fetch_assoc()) {
                        $kuantitas_stok = $row["kuantitas_stok"];
                        if ($kuantitas_stok < 3) {
                            $class = "low-stock";
                            $message = "Stok menipis!";
                        } else {
                            $class = "";
                            $message = "";
                        }
                        echo "<tr class='$class'>";
                        echo "<td>" . htmlspecialchars($row["id_inventory"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["nama_barang"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["jenis_barang"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["harga"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["kuantitas_stok"]) . " $message</td>";
                        echo "<td>" . htmlspecialchars($row["lokasi_gudang"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["serial_number"]) . "</td>";
                        echo "<td>
                            <a href='update_inventory.php?id_inventory=" . $row["id_inventory"] . "'>Update</a> |
                            <a href='delete_inventory.php?id_inventory=" . $row["id_inventory"] . "'>Delete</a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data storage ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>