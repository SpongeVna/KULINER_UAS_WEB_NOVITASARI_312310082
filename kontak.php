<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NopeeAntara- Kontak</title>
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

<body>
<div class="container my-5">
    <h1 class="text-center mb-4">Hubungi Kami</h1>
    <div class="row g-4">
        <!-- Lokasi Kami -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h3 class="card-title">Lokasi Kami</h3>
                    <p class="card-text">
                        Jl. Inspeksi Kalimalang No.9<br>
                        Cibatu, Cikarang Selatan.<br>
                        Kabupaten Bekasi, Jawa Barat 17530
                    </p>
                </div>
            </div>
        </div>
        <!-- Email -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h3 class="card-title">Email</h3>
                    <p class="card-text">
                        <a href="mailto:Nta50372@gmail.com">Nta50372@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- Telepon -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h3 class="card-title">Telepon</h3>
                    <p class="card-text">
                        <a href="tel:+6282258106340">+62 822-5810-6340</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <!-- Form Kirim Pesan -->
        <div class="col-md-12">
            <h3>Kirim Pesan</h3>
            <form>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
</div>


    <footer>
    <p>&copy; 2025 Novitasari</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
