<?php

// Database connection
$host = 'localhost';
$username = 'root';
$password = ''; // Ganti dengan password database Anda
$dbname = 'db_kuliner';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        $nama_makanan = $_POST['nama_makanan'];
        $daerah_makanan = $_POST['daerah_makanan'];
        $keterangan = $_POST['keterangan'];

        $stmt = $conn->prepare("INSERT INTO tbl_makanan (nama_makanan, daerah_makanan, keterangan) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama_makanan, $daerah_makanan, $keterangan);

        if ($stmt->execute()) {
            echo "Data berhasil ditambahkan!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    if (isset($_POST['update'])) {
        $id_makanan = $_POST['id_makanan'];
        $nama_makanan = $_POST['nama_makanan'];
        $daerah_makanan = $_POST['daerah_makanan'];
        $keterangan = $_POST['keterangan'];

        $stmt = $conn->prepare("UPDATE tbl_makanan SET nama_makanan = ?, daerah_makanan = ?, keterangan = ? WHERE id_makanan = ?");
        $stmt->bind_param("sssi", $nama_makanan, $daerah_makanan, $keterangan, $id_makanan);

        if ($stmt->execute()) {
            echo "Data berhasil diperbarui!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    if (isset($_POST['delete'])) {
        $id_makanan = $_POST['id_makanan'];

        $stmt = $conn->prepare("DELETE FROM tbl_makanan WHERE id_makanan = ?");
        $stmt->bind_param("i", $id_makanan);

        if ($stmt->execute()) {
            echo "Data berhasil dihapus!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Fetch data for display
$result = $conn->query("SELECT * FROM tbl_makanan");
$makanan = $result->fetch_all(MYSQLI_ASSOC);
$result->free();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NopeeAntara - CRUD Dasar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        footer {
            text-align: center;
            padding: 10px;
            background: #f8f9fa;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -1px 5px rgba(0,0,0,0.1);
        }
        .navbar {
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .navbar.sticky-top {
            position: sticky;
            top: 0;
            z-index: 1030;
        }
        .update-animation {
            animation: highlight 2s ease-in-out;
        }
        @keyframes highlight {
            0% { background-color: #ffff99; }
            100% { background-color: transparent; }
        }
        .table-container {
            overflow-x: auto;
            padding-bottom: 60px; /* For footer spacing */
        }
    </style>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">NOVIPAGE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="crud.php">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontak.php">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</head>
<body>
    <h1>Data Makanan</h1>

    <form method="POST">
        <input type="hidden" name="id_makanan" value="">
        <input type="text" name="nama_makanan" placeholder="Nama Makanan" required>
        <input type="text" name="daerah_makanan" placeholder="Daerah Asal" required>
        <textarea name="keterangan" placeholder="Keterangan"></textarea>
        <button type="submit" name="create">Tambah</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Makanan</th>
                <th>Daerah Asal</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($makanan as $item): ?>
                <tr>
                    <td><?= $item['id_makanan'] ?></td>
                    <td><?= $item['nama_makanan'] ?></td>
                    <td><?= $item['daerah_makanan'] ?></td>
                    <td><?= $item['keterangan'] ?></td>
                    <td>
                        <form method="POST" style="display:inline-block;">
                            <input type="hidden" name="id_makanan" value="<?= $item['id_makanan'] ?>">
                            <button type="submit" name="delete">Hapus</button>
                        </form>
                        <form method="POST" style="display:inline-block;">
                            <input type="hidden" name="id_makanan" value="<?= $item['id_makanan'] ?>">
                            <input type="text" name="nama_makanan" value="<?= $item['nama_makanan'] ?>" required>
                            <input type="text" name="daerah_makanan" value="<?= $item['daerah_makanan'] ?>" required>
                            <textarea name="keterangan"><?= $item['keterangan'] ?></textarea>
                            <button type="submit" name="update">Perbarui</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
