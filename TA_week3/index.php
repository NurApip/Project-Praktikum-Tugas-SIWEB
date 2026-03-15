<?php session_start();
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
    $isLoggedIn = true;
} else {
    $username = '';
    $isLoggedIn = false;
}
?>
<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cibaduyut SHOES</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">CIBADUYUT SHOES</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <?php if (!$isLoggedIn): ?>
            <a href="login.php" class="btn btn-outline-primary btn-sm me-2">Login</a>
            <?php else: ?>
            <span class="navbar-text me-2">Halo, <?php echo htmlspecialchars($username); ?>!</span>
            <a href="controller/logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
            <?php endif; ?>
            <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#wishlistModal" onclick="tampilkanWishlist()">
                ⭐ Wishlist (<span id="wishlist-count">0</span>)
            </button>
            <button id="btn-theme" class="btn btn-outline-light btn-sm">Mode Gelap</button>
        </div>

</div>
</nav>

<section class="hero text-white">
    <div class="container text-center">
        <h2 class=>Sistem Manajemen Sepatu</h2>
        <p class="lead mb-4">Sepatu impian dari koleksi eksklusif</p>
    </div>
</section>

<!-- Content -->
<div class="container my-4">

    <!-- Statistik -->
    <div class="row text-center mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Total Produk</h6>
                    <h3>12</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Stok Tersedia</h6>
                    <h3>85</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Kategori</h6>
                    <h3>3</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Judul -->
    <h4 class="mb-3">Daftar Sepatu</h4>

    <!-- Card Produk -->
    <div class="row g-4">

        <!-- Produk 1 -->
        <div class="col-md-4">
            <div class="card h-100">
                <img src="images/NIKE_P_6000.jpg" class="card-img-top" alt="Sepatu">
                <div class="card-body">
                    <h6 class="card-title">Nike P-6000</h6>
                    <p class="mb-1">Harga: Rp 1.299.000</p>
                    <p class="text-muted stok-text">Stok: 10</p>
                    <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
                    <button class="btn btn-outline-danger btn-wishlist w-50">❤️ Wishlist</button>
                </div>
            </div>
        </div>

        <!-- Produk 2 -->
        <div class="col-md-4">
            <div class="card h-100">
                <img src="images/AIR_FORCE_1.jpg" class="card-img-top" alt="Sepatu">
                <div class="card-body">
                    <h6 class="card-title">Nike Air Force 1</h6>
                    <p class="mb-1">Harga: Rp 1.599.000</p>
                    <p class="text-muted stok-text">Stok: 7</p>
                    <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
                    <button class="btn btn-outline-danger btn-wishlist w-50">❤️ Wishlist</button>
                </div>
            </div>
        </div>

        <!-- Produk 3 -->
        <div class="col-md-4">
            <div class="card h-100">
                <img src="images/AIR_JORDAN_1_LOW.jpg" class="card-img-top" alt="Sepatu">
                <div class="card-body">
                    <h6 class="card-title">Nike Air Jordan 1 Low</h6>
                    <p class="mb-1">Harga: Rp 1.799.000</p>
                    <p class="text-muted stok-text">Stok: 19</p>
                    <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
                    <button class="btn btn-outline-danger btn-wishlist w-50">❤️ Wishlist</button>
                </div>
            </div>
        </div>

    </div>
</div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto border-top">
        <small>© 2026 Cibaduyut Shoes</small>
    </footer>

    <!-- Wishlist Modal -->
    <div class="modal fade" id="wishlistModal" tabindex="-1" aria-labelledby="wishlistModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="wishlistModalLabel">Daftar Wishlist Saya</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <ul id="wishlist-list" class="list-group"></ul>
            <div id="empty-wishlist" class="text-center mt-3 text-muted">Wishlist kosong.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button id="clear-wishlist" class="btn btn-danger text-white">Kosongkan</button>

          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

</body>
</html>
