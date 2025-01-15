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
        $nama_makanan = $_POST['nama_makanan'] ?? '';
        $daerah_makanan = $_POST['daerah_makanan'] ?? '';
        $keterangan = $_POST['keterangan'] ?? '';
        $foto_makanan = $_POST['foto_makanan'] ?? '';

        if ($nama_makanan && $daerah_makanan) {
            $sql = "INSERT INTO tbl_makanan (nama_makanan, daerah_makanan, keterangan, foto_makanan) VALUES ('$nama_makanan', '$daerah_makanan', '$keterangan', '$foto_makanan')";
            $conn->query($sql);
        } else {
            echo "<script>alert('Nama makanan dan daerah makanan harus diisi!');</script>";
        }
    } elseif (isset($_POST['update'])) {
        $nama_makanan = $_POST['nama_makanan'] ?? '';
        $daerah_makanan = $_POST['daerah_makanan'] ?? '';
        $keterangan = $_POST['keterangan'] ?? '';
        $foto_makanan = $_POST['foto_makanan'] ?? '';

        if ($nama_makanan && $daerah_makanan) {
            $sql = "UPDATE tbl_makanan SET daerah_makanan='$daerah_makanan', keterangan='$keterangan', foto_makanan='$foto_makanan' WHERE nama_makanan='$nama_makanan'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Data berhasil diperbarui!');</script>";
            } else {
                echo "<script>alert('Gagal memperbarui data!');</script>";
            }
        } else {
            echo "<script>alert('Nama makanan dan daerah makanan harus diisi!');</script>";
        }
    } elseif (isset($_POST['delete'])) {
        $nama_makanan = $_POST['nama_makanan'] ?? '';
        if ($nama_makanan) {
            $sql = "DELETE FROM tbl_makanan WHERE nama_makanan='$nama_makanan'";
            $conn->query($sql);
        } else {
            echo "<script>alert('Nama makanan tidak valid!');</script>";
        }
    }
}

// Retrieve data
$sql = "SELECT * FROM tbl_makanan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NopeeAntara</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
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
<body>

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

<div class="container table-container">
    <h1 class="text-center">Daftar Makanan</h1>
    <form method="POST" class="mb-3">
        <div class="mb-3">
            <label for="nama_makanan" class="form-label">Nama Makanan</label>
            <input type="text" class="form-control" id="nama_makanan" name="nama_makanan" required>
        </div>
        <div class="mb-3">
            <label for="daerah_makanan" class="form-label">Daerah Makanan</label>
            <input type="text" class="form-control" id="daerah_makanan" name="daerah_makanan" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
        </div>
        <div class="mb-3">
            <label for="foto_makanan" class="form-label">URL Foto Makanan</label>
            <input type="text" class="form-control" id="foto_makanan" name="foto_makanan">
        </div>
        <button type="submit" name="create" class="btn btn-primary">Tambah</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Makanan</th>
                <th>Daerah Makanan</th>
                <th>Keterangan</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr class="<?php echo isset($_POST['update']) && $_POST['nama_makanan'] == $row['nama_makanan'] ? 'update-animation' : ''; ?>">
                <td><?php echo $row['nama_makanan']; ?></td>
                <td><?php echo $row['daerah_makanan']; ?></td>
                <td><?php echo $row['keterangan']; ?></td>
                <td><img src="<?php echo $row['foto_makanan']; ?>" alt="Foto Makanan" style="width: 100px; height: auto;"></td>
                <td>
                    <form method="POST" style="display: inline-block;">
                        <input type="hidden" name="nama_makanan" value="<?php echo $row['nama_makanan']; ?>">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $row['nama_makanan']; ?>">Edit</button>
                        <div class="modal fade" id="updateModal<?php echo $row['nama_makanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="nama_makanan" value="<?php echo $row['nama_makanan']; ?>">
                                        <div class="mb-3">
                                            <label for="nama_makanan" class="form-label">Nama Makanan</label>
                                            <input type="text" class="form-control" name="nama_makanan" value="<?php echo $row['nama_makanan']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="daerah_makanan" class="form-label">Daerah Makanan</label>
                                            <input type="text" class="form-control" name="daerah_makanan" value="<?php echo $row['daerah_makanan']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea class="form-control" name="keterangan"><?php echo $row['keterangan']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="foto_makanan" class="form-label">URL Foto Makanan</label>
                                            <input type="text" class="form-control" name="foto_makanan" value="<?php echo $row['foto_makanan']; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="POST" style="display: inline-block;">
                        <input type="hidden" name="nama_makanan" value="<?php echo $row['nama_makanan']; ?>">
                        <button type="submit" name="delete" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<footer>
    <p>&copy; 2025 Novitasari</p>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
